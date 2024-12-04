<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SessionController;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\File;
use LdapRecord\Connection;

use App\Models\User;
use App\Models\Configuration;

class AdminController extends Controller
{
    public function __construct(private SessionController $sessionController) {}

    public function userFunction(Request $request) {
        if (!$this->sessionController->SessionVerify()) {
            return Inertia::render('Login', ['message' => 'Sessão Expirada!']);
        }

        if ($request->has('id') && $request->has('perm_name')) {
            $user = User::find($request->id);
            $user->roles = $request->perm_name;
            $user->save();
            return Inertia::render('AdminUser', ['UserData' => User::all()]);
        }

        if ($request->has('delete_button') && $request->has('id')) {
            User::destroy($request->id);
            return Inertia::render('AdminUser', ['UserData' => User::all()]);
        }
    }

    public function configFunction(Request $request) {
        if (!$this->sessionController->SessionVerify()) {
            return Inertia::render('Login', ['message' => 'Sessão Expirada!']);
        }

        if ($request->has(['LDAP_USERNAME', 'LDAP_PASSWORD', 'LDAP_BASE_DN', 'usuario', 'senha'])) {
            return $this->ldapConfiguration($request);
        }

        if ($request->has(['enviar_button'])) {
            return $this->customConfiguration($request);
        }
    }

    private function updateEnvFile($key, $value, $addQuotes = false) {
        $envFile = base_path('.env');
        if (!File::exists($envFile)) return false;

        $value = $addQuotes ? "\"{$value}\"" : $value;
        $envContents = File::get($envFile);

        $pattern = "/^{$key}=(.*)$/m";
        $replacement = "{$key}={$value}";
        $envContents = preg_match($pattern, $envContents) 
            ? preg_replace($pattern, $replacement, $envContents) 
            : $envContents . "\n{$key}={$value}";

        return File::put($envFile, $envContents);
    }

    public function ldapConfiguration(Request $request) {
        $connection = new Connection([
            'hosts' => [$request->input('LDAP_HOST')],
            'base_dn' => $request->input('LDAP_BASE_DN'),
            'username' => $request->input('LDAP_USERNAME'),
            'password' => $request->input('LDAP_PASSWORD'),
        ]);

        if (!$connection->auth()->attempt("{$request->input('usuario')}@rondonia.local", $request->input('senha'))) {
            return response()->json(['error' => true, 'message' => 'Erro ao conectar com o servidor'], 401);
        }

        $this->updateEnvFile('LDAP_HOST', $request->input('LDAP_HOST'));
        $this->updateEnvFile('LDAP_USERNAME', $request->input('LDAP_USERNAME'), true);
        $this->updateEnvFile('LDAP_PASSWORD', $request->input('LDAP_PASSWORD'));
        $this->updateEnvFile('LDAP_BASE_DN', $request->input('LDAP_BASE_DN'), true);

        \Artisan::call('config:clear');
        return redirect()->to('/configuracoes');
    }

    public function customConfiguration(Request $request) {
        if($request->file('file')) {
            // Obtém o conteúdo do arquivo
            $fileContent = file_get_contents($request->file('file')->getRealPath());

            // Converte o conteúdo para Base64
            $fileBase64 = base64_encode($fileContent);

            Configuration::updateOrCreate(
                ['key' => 'logo_config'], // Critério de busca
                [
                    'value' => 'data:image/gif;base64,'.$fileBase64, // Valores a serem atualizados ou criados
                    'description' => 'Imagem da aplicação'
                ]
            );
        }
        
        if ($request->nome) {
            Configuration::updateOrCreate(
                ['key' => 'nome_config'], // Critério de busca
                [
                    'value' => $request->nome,
                    'description' => 'Título do site / Nome do site'
                ]
            );
        }
        
        if($request->url) {
            if (!empty($request->url)) {
                // Remove espaços em branco antes e depois
                $url = trim($request->url);
        
                // Verifica se a URL já começa com 'http://' ou 'https://'
                if (!preg_match('/^http(s)?:\/\//', $url)) {
                    // Se não começar, adiciona 'http://' automaticamente
                    $url = 'http://' . $url;
                }
            }

            Configuration::updateOrCreate(
                ['key' => 'redirect_config'], // Critério de busca
                [
                    'value' => $url,
                    'description' => 'Redirecionamento do "/"'
                ]
            );
        }

        /** SELECT CONFIGDATA */
        $ConfigurationLOGOModel     = Configuration::select('value')->where('key', 'logo_config')->first();
        $ConfigurationNOMEModel     = Configuration::select('value')->where('key', 'nome_config')->first();
        $ConfigurationREDIRECTModel = Configuration::select('value')->where('key', 'redirect_config')->first();
    
        return Inertia::render('AdminConfiguration', [
            'ConfigLogo' => $ConfigurationLOGOModel->value,
            'ConfigNome' => $ConfigurationNOMEModel->value, 
            'ConfigRedirect' => $ConfigurationREDIRECTModel->value,
        ]);
    }
}