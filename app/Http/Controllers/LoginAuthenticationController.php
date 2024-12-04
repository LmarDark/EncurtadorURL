<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SessionController;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use LdapRecord\Connection;

class LoginAuthenticationController extends Controller
{
    public function userSanitize(Request $request)
    {
        /**
         * Sanitiza os valores do usuário.
         *
         * @param string $request->input('user') valor do input do usuário.
         * @param string $request->input('password') valor do input da senha.
         *
         * @return string
         */

        // Recebe os valores //
        $USER = $request->input('user');
        $PASSWD = $request->input('password');

        /**
         * Verifica se a variável está vazia.
         *
         * @param string !empty($USER) Verifica se não está vazia .
         * @param string empty($USER) Verifica se está vazia.
         *
         */
        if (!empty($USER)) {
            // Sanitiza o $USER //
            $USER = str_replace(".", "", $request->input('user'));
            $USER = str_replace("-", "", $request->input('user'));

            return $this->userValidate($USER, $PASSWD);
        }

        if (empty($USER)) {
            return Inertia::render('Login', [
                'message' => 'Usuário ou senha não preenchidos!',
            ]);
        }
    }

    public function userValidate($USER_Sanitized, $PASSWD_Sanitized)
    {
        /**
         * Faz a validação dos dados sanitizados
         *
         * @param string $USER_Sanitized usuário sanitizado.
         * @param string $PASSWD_Sanitized senha sanitizada.
         *
         * @return string
         */

        /** Verifica se tem 11 caracteres */
        if (strlen($USER_Sanitized) == 11) {

            return $this->connectionWithLDAP($USER_Sanitized, $PASSWD_Sanitized);
        }

        /** Verifica se o $USER_Sanitized ultrapassa ou é menor que 11 */
        if (strlen($USER_Sanitized) !== 11) {
            return Inertia::render('Login', [
                'message' => 'Usuário ou senha incorretos!',
            ]);
        }
    }

    public function connectionWithLDAP($USER, $PASSWD)
    {
        /**
         * Faz a conexão com o LDAP com a variável $domain_component
         *
         * @param string $USER usuário sanitizado e válidado.
         * @param string $PASSWD senha sanitizada e válidada.
         *
         * @return array
         * @return string
         */

        /** Verifica se as variáveis de ambiente estão vazias */
        if (
            env('LDAP_HOST') === '' ||
            env('LDAP_BASE_DN') === '' ||
            env('LDAP_USERNAME') === '' ||
            env('LDAP_PASSWORD') === ''
        ) {
            return Inertia::render('Login', [
                'message' => 'Não foi possível estabelecer conexão com LDAP!',
            ]);
        }

        /** Verifica se as variáveis de ambiente não estão vazias */
        if (
            env('LDAP_HOST') !== '' &&
            env('LDAP_BASE_DN') !== '' &&
            env('LDAP_USERNAME') !== '' &&
            env('LDAP_PASSWORD') !== ''
        ) {
            $ldap_host = env('LDAP_HOST');
            $ldap_base_dn = env('LDAP_BASE_DN');
            $ldap_username = env('LDAP_USERNAME');
            $ldap_password = env('LDAP_PASSWORD');

            /** Atributos para conexão do LDAP */
            $connection = new Connection([
                'hosts' => [$ldap_host],
                'base_dn' => $ldap_base_dn,
                'username' => $ldap_username,
                'password' => $ldap_password,
            ]);

            return $this->authUserLDAP($USER, $PASSWD, $connection);
        }
    }

    public function authUserLDAP($USER, $PASSWD, $CONN)
    {
        /**
         * Tenta realizar a autenticação do usuário
         *
         * @param string $USER usuário sanitizado e válidado.
         * @param string $PASSWD senha sanitizada e válidada.
         * @param array $CONN informações para a autenticação.
         *
         * @return string
         */

        if ($CONN->auth()->attempt("{$USER}@" . env('LDAP_DC') . "", $PASSWD)) {
            /** Inicia uma sessão para o usuário caso bem-sucedido a autenticação */
            $SessionController = new SessionController();

            /** Inicializa a sessão */
            $InitializeSession = $SessionController->InitializeSession($USER);

            /** Verifica se a sessão é válida */
            $SessionVerify = $SessionController->SessionVerify();

            /** Caso a função SessionVerify retorne false, redireciona para o Login */
            if ($SessionVerify == false) {
                return Inertia::render('Login', [
                    'message' => 'Sessão Expirada!',
                ]);
            }

            /** Caso a função SessionVerify retorne true, continua com a execução do código */
            if ($SessionVerify == true) {
                return $this->insertUserDB($USER, $CONN);
            }
        }

        if (!$CONN->auth()->attempt("{$USER}@" . env('LDAP_DC') . "", $PASSWD)) {
            /** Se não for bem-sucedido a autentiação, retorna "Usuário ou senha incorretos" */
            return Inertia::render('Login', [
                'message' => 'Usuário ou senha incorretos!',
            ]);
        }
    }

    public function insertUserDB($USER, $CONN)
    {
        /**
         * Insere no Banco de Dados o usuário
         * caso seja a primeira vez no sistema.
         *
         * @param string $USER
         * @param string $PASSWD
         */

        /** Antes de realizar a consulta verifica
         *  novamente se a sessão do usuário é válida.
         */
        $SessionController = new SessionController();
        $SessionVerify = $SessionController->SessionVerify();

        /** Verifica se o $USER consta no banco de dados */
        $user = new User;
        $selectUserCpf = $user->select('user_cpf')
            ->where('user_cpf', $USER)
            ->first();

        $user = new User;
        $verifyTableUser = $user->get();

        if ($selectUserCpf == null) {
            /** Faz uma query em todas as informações do usuário */
            $queryUserLDAP = $CONN->query()->where('sAMAccountName', '=', $USER)->get();
            //dd($queryUserLDAP);
            /** Verifica se o sAMAcountName é o mesmo utilizado no $USER */
            if ($queryUserLDAP[0]['samaccountname'][0] == $USER) {

                /** Nome do usuário de acordo com o LDAP */
                $nomeUser = $queryUserLDAP[0]["displayname"][0];

                /** sAMAcountName do usuário */
                $USER;

                /** Secretária do usuário */
                $unidadeUser = $queryUserLDAP[0]["distinguishedname"][0];
                $parts = explode(",", $unidadeUser);
                $unidadeUser = array_reverse($parts);
                $unidadeUser = explode("OU=", $unidadeUser[3])[1];

                if ($verifyTableUser->isEmpty()) {
                    /** Permissão ADMIN */
                    $user->user_name = $nomeUser;
                    $user->user_cpf = $USER;
                    $user->roles = 1;
                    $user->location = $unidadeUser;
                    $user->save();
                } else {
                    /** Permissão PADRÃO */
                    $user->user_name = $nomeUser;
                    $user->user_cpf = $USER;
                    $user->roles = 0;
                    $user->location = $unidadeUser;
                    $user->save();
                }
            }
        }

        /** Procura o id do usuário logado */
        $userModel = User::select('id', 'roles', 'location')
            ->where('user_cpf', $USER)
            ->first();

        /** ID do usuário sendo salvo na sessão */
        session()->put('user_id', $userModel->id);
        session()->put('user_location', $userModel->location);
        session()->put('user_roles', $userModel->roles);

        return redirect()->to('/encurtadordeurl');
    }
}
