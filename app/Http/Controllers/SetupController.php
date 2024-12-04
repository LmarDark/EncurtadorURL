<?php

namespace App\Http\Controllers;

use App\Models\Setup;
use App\Models\Configuration;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use LdapRecord\Connection;
use Inertia\Inertia;

class SetupController extends Controller
{
    /**
     * Atualiza as variáveis LDAP no arquivo .env.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateLdapEnv(Request $request)
    {#dd($request->all());
        // IMPORTANTE //
        $appInitialized = Setup::where('key', 'app_initialized')->first();

        if ($appInitialized && $appInitialized->value === 'true') {
            return redirect()->to('/login');
        }

        // Obter os valores das variáveis de ambiente do request
        $ldap_dc       = $request->input('LDAP_DC'); 
        $ldap_host     = $request->input('LDAP_HOST');
        $ldap_username = $request->input('LDAP_USERNAME');
        $ldap_password = $request->input('LDAP_PASSWORD');
        $ldap_base_dn  = $request->input('LDAP_BASE_DN');

        $USER = $request->input('usuario');
        $PASSWD = $request->input('senha');

        $connection = new Connection([
            'hosts' => [$ldap_host],
            'base_dn' => $ldap_base_dn,
            'username' => $ldap_username,
            'password' => $ldap_password,
        ]);

        if(!$request->input('options')) {
            $queryUserLDAP = $connection->query()->where('sAMAccountName', '=', $USER)->get(); 
            $gruposUser = $queryUserLDAP[0]["memberof"];

            if($queryUserLDAP[0]["memberof"][0]) {
                $array = $queryUserLDAP[0]["memberof"];
                
                unset($array['count']);
                
                return Inertia::render('Setup', [
                    'message' => 'Defina um grupo para logar na aplicação!',
                    'memberof' => $array,
                ]);
            }
        }

        /** CONEXÃO MAL-SUCEDIDA */
        if (!$connection->auth()->attempt("{$USER}@$ldap_dc", $PASSWD)) {
            return response()->json([
                'error' => true,
                'message' => 'Erro ao conectar com o servidor',
            ], 401);
        }

        if ($connection->auth()->attempt("{$USER}@$ldap_dc", $PASSWD)) {
            if($request->input('options')) {
                Setup::create([
                    'key' => 'app_initialized',
                    'value' => 'in_progress',
                ]);

                Configuration::insert([
                    [
                        'key' => 'logo_config',
                        'value' => '',
                        'description' => 'Imagem da aplicação',
                    ],
                    [
                        'key' => 'nome_config',
                        'value' => 'Example Name',
                        'description' => 'Título do site / Nome do site',
                    ],
                    [
                        'key' => 'redirect_config',
                        'value' => 'http://example.com/redirect',
                        'description' => 'Redirecionamento do "/"',
                    ],
                ]);

                // Verifique se todos os campos foram fornecidos
                /*if (empty($ldap_host) || empty($ldap_username) || empty($ldap_password) || empty($ldap_base_dn)) {
                    return response()->json([
                        'error' => 'Todos os campos LDAP são obrigatórios.',
                    ], 400);
                }*/

                // Atualizar as variáveis no arquivo .env
                $this->updateEnvFile('LDAP_DC', $ldap_dc, true);
                $this->updateEnvFile('LDAP_HOST', $ldap_host);
                $this->updateEnvFile('LDAP_USERNAME', $ldap_username, true); // Colocar aspas para LDAP_USERNAME
                $this->updateEnvFile('LDAP_PASSWORD', $ldap_password);
                $this->updateEnvFile('LDAP_BASE_DN', $ldap_base_dn, true); // Colocar aspas para LDAP_BASE_DN

                $setup = Setup::where('key', 'app_initialized')->first();
                $setup->value = 'true';
                $setup->save();

                // Limpa o cache de configuração após a atualização
                Artisan::call('config:clear');

                return Inertia::render('Login');
            }
        }
        //EXCEPTION//
    }

    /**
     * Atualiza o arquivo .env com a chave e valor fornecidos.
     *
     * @param  string  $key
     * @param  string  $value
     * @param  bool  $addQuotes
     * @return bool
     */
    private function updateEnvFile($key, $value, $addQuotes = false)
    {
        // Se a variável precisar de aspas, adicionar as aspas ao valor
        if ($addQuotes) {
            $value = '"' . $value . '"';
        }

        $envFile = base_path('.env');

        if (File::exists($envFile)) {
            $envContents = File::get($envFile);

            // Verifica se a chave já existe no arquivo .env
            $pattern = "/^{$key}=(.*)$/m";
            $replacement = "{$key}={$value}";

            if (preg_match($pattern, $envContents)) {
                // Se a chave existir, substitui o valor
                $envContents = preg_replace($pattern, $replacement, $envContents);
            } else {
                // Se não existir, adiciona a chave ao final do arquivo
                $envContents .= "\n{$key}={$value}";
            }

            // Grava o conteúdo atualizado no arquivo .env
            return File::put($envFile, $envContents);
        }

        return false;
    }
}
