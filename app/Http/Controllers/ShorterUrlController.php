<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;
use App\Models\User;
use App\Models\UrlShorter;
use Inertia\Inertia;

use App\Models\Configuration;

use App\Http\Controllers\AuditoriaController;

class ShorterUrlController extends Controller
{
    public function sanitizeNome($nomeSanitize) {
        #$nomeSanitize = preg_replace('/[^a-zA-Z0-9]/', '', $nomeSanitize);

        return $nomeSanitize;
    }
    
    public function sanitizeUri($uriSanitize) {
        /** Sanitiza a uri removendo a '/' no inicio e caracteres especiais que geralmente são colocados */
        $uriSanitized = preg_replace('/[^a-zA-Z0-9]/', '', $uriSanitize);

        return $uriSanitized;
    }

    public function shorterUrlCreate(Request $request) {
        /** Antes de tudo verifica se o botão está definido */
        if($request->has('bttn_edit') || $request->has('bttn_delete')) {
            if($request->has('bttn_edit')) {
                
                return $this->edit($request->all());
            }

            if($request->has('bttn_delete')) {

                return $this->delete($request->all());
            }
        }

        $SessionController = new SessionController();
        $SessionVerify = $SessionController->SessionVerify();

        if($request->has('nome')) {
            /** Chama a função responsável por sanitizar os valores */
            $nome = $this->sanitizeNome($request->nome);

            /** Chama função responsável para validar o nome */
            #$nome = validateNome($request->nome);
        }

        if($request->has('urlobrigatorio')) {
            /** Chama a função responsável por sanitizar os valores */
            # $url = sanitizeUri($request->input('urlobrigatorio'));

            /** Chama função responsável para validar a url */
            $url = $request->urlobrigatorio;
            
        } else {
            /** Chama uma nova instância para registrar as url/uris no banco de dados */
            $urlModel = new UrlShorter;

            $urlSelect = $urlModel->get();

            return Inertia::render('ShorterUrl', [
                'urls' => $urlSelect, 
                'message' => 'O campo URL é obrigatório!'
            ]);
        }

        if($request->has('urlopcionalname')) {
            /** Chama a função para sanitizar a uri */
            $uri = $this->sanitizeUri($request->urlopcionalname);

            /** Chama função responsável para validar a uri */
            #$uri = validateUri($uriSanitized);

        }

        if(is_null($request->input('urlopcionalname'))) {
            $uri = preg_replace('/[^a-zA-Z0-9]/', '', base64_encode(random_bytes(9)));
            
        }

        /** Chama uma nova instância para registrar as url/uris no banco de dados */
        $urlModel = new UrlShorter;
        $urlSelect = $urlModel->get();
        
        if ($urlModel->where('uri', $uri)->exists()) {
            return Inertia::render('ShorterUrl', [
                'message' => 'O link personalizado inserido, já consta criado!',
                'urls'    => $urlSelect,
            ]);
        }

        $userLocation = User::select('location')->where('id', session()->get('user_id'))->first(); 

        $urlModel->nome = $nome;
        $urlModel->url = $url;
        $urlModel->uri = $uri;
        $urlModel->location = $userLocation->location;
        $urlModel->created_at = now();
        $urlModel->updated_at = now();
        $urlModel->save();

        /**
         * REGISTRA NOS LOGS
         */
        $ACTION = 'create';

        $AuditoriaController = new AuditoriaController;
        $AuditoriaController->shorterUrlLOG(session()->get('user_id'), $nome, $ACTION);

        $urlModel = new UrlShorter;
        $urlSelect = $urlModel->select('id', 'nome', 'url', 'uri', 'created_at', 'updated_at')->where('location', session()->get('user_location'))->get();

        $ConfigurationLOGOModel     = Configuration::select('value')->where('key', 'logo_config')->first();
        $ConfigurationNOMEModel     = Configuration::select('value')->where('key', 'nome_config')->first();
        $ConfigurationREDIRECTModel = Configuration::select('value')->where('key', 'redirect_config')->first();

        return Inertia::render('ShorterUrl', [
            'urls' => $urlSelect,
            'message_success' => 'Link criado com sucesso!',
            'ConfigLogo' => $ConfigurationLOGOModel->value,
            'ConfigNome' => $ConfigurationNOMEModel->value, 
            'ConfigRedirect' => $ConfigurationREDIRECTModel->value,
        ]);
    }

    public function edit($arrayDataEdit) {
        $SessionController = new SessionController;
        $SessionVerify = $SessionController->SessionVerify();

        $nome = $this->sanitizeNome($arrayDataEdit['titulo']);
        $url  = $arrayDataEdit['url'];
        $uri  = $this->sanitizeUri($arrayDataEdit['uri']);

        $idUser = UrlShorter::find(intval($arrayDataEdit['bttn_edit']));
        $idUser->nome = $nome;
        $idUser->url  = $url;
        $idUser->uri  = $uri;
        $idUser->save();

        /**
         * REGISTRA NOS LOGS
         */
        $ACTION = 'edited';

        $AuditoriaController = new AuditoriaController;
        $AuditoriaController->shorterUrlLOG(session()->get('user_id'), $idUser->nome, $ACTION);
        
        $ConfigurationLOGOModel     = Configuration::select('value')->where('key', 'logo_config')->first();
        $ConfigurationNOMEModel     = Configuration::select('value')->where('key', 'nome_config')->first();
        $ConfigurationREDIRECTModel = Configuration::select('value')->where('key', 'redirect_config')->first();

        $urlModel = new UrlShorter;
        $urlSelect = $urlModel->where('location', session()->get('user_location'))->get();
    
        return Inertia::render('ShorterUrl', [
            'urls' => $urlSelect,
            'message_success' => 'Link atualizado com sucesso!',
            'ConfigLogo' => $ConfigurationLOGOModel->value,
            'ConfigNome' => $ConfigurationNOMEModel->value, 
            'ConfigRedirect' => $ConfigurationREDIRECTModel->value,
        ]);
    }

    public function delete($arrayDataDelete) {
        /** Função responsável por deletar */
        $SessionController = new SessionController;
        $SessionVerify = $SessionController->SessionVerify();

        $urlDel = UrlShorter::where('id', $arrayDataDelete['bttn_delete'])->first();

        if($urlDel) {
            $urlDel->delete();
        }

        /**
         * REGISTRA NOS LOGS
         */
        $ACTION = 'deleted';

        $AuditoriaController = new AuditoriaController;
        $AuditoriaController->shorterUrlLOG(session()->get('user_id'), $urlDel->nome, $ACTION);

        $urlModel = new UrlShorter;
        $urlSelect = $urlModel->where('location', session()->get('user_location'))->get();

        $ConfigurationLOGOModel     = Configuration::select('value')->where('key', 'logo_config')->first();
        $ConfigurationNOMEModel     = Configuration::select('value')->where('key', 'nome_config')->first();
        $ConfigurationREDIRECTModel = Configuration::select('value')->where('key', 'redirect_config')->first();

        return Inertia::render('ShorterUrl', [
            'urls' => $urlSelect,
            'message_success' => 'Link apagado com sucesso!',
            'ConfigLogo' => $ConfigurationLOGOModel->value,
            'ConfigNome' => $ConfigurationNOMEModel->value, 
            'ConfigRedirect' => $ConfigurationREDIRECTModel->value,
        ]);
    }
}