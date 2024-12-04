<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SessionController;
use App\Models\QuickAccess;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Configuration;

use App\Http\Controllers\AuditoriaController;

class QuickAccessController extends Controller
{
    /*private function sanitizeNome($nome) {
        $nomeSanitized = $nome;

        return $nomeSanitized;
    }*/

    /*private function sanitizeDescricao($descricao) {
        $descricaoSanitized = $descricaoSanitize;

        return $descricaoSanitized;
    }*/

    private function sanitizeUri($uri) {
        $uriSanitized = preg_replace('/[^a-zA-Z0-9]/', '', $uri);

        return $uriSanitized;
    }

    /**
     * Função responsável por validar as imagens 
     */
    private function validateImg($img) {
        if ($img) {
            if (
                $img->getClientOriginalExtension() == 'jpeg' ||
                $img->getClientOriginalExtension() == 'png' ||
                $img->getClientOriginalExtension() == 'jpg' ||
                $img->getClientOriginalExtension() == 'gif'
            ) {
                if ($img->getClientOriginalExtension() == 'jpeg') {
                    $image = "data:image/jpeg;base64," . base64_encode(file_get_contents($img->getRealPath()));

                }

                if ($img->getClientOriginalExtension() == 'png') {
                    $image = "data:image/png;base64," . base64_encode(file_get_contents($img->getRealPath()));

                }

                if ($img->getClientOriginalExtension() == 'jpg') {
                    $image = "data:image/jpg;base64," . base64_encode(file_get_contents($img->getRealPath()));

                }

                if ($img->getClientOriginalExtension() == 'gif') {
                    $image = "data:image/gif;base64," . base64_encode(file_get_contents($img->getRealPath()));
                }
            }
        }

        if (empty($image)) {
            return false;
        }

        return $image;
    }

    /**  
     * Função responsável por validar URLs
     */
    private function validateUrl($url) {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            $ConfigurationLOGOModel     = Configuration::select('value')->where('key', 'logo_config')->first();
            $ConfigurationNOMEModel     = Configuration::select('value')->where('key', 'nome_config')->first();
            $ConfigurationREDIRECTModel = Configuration::select('value')->where('key', 'redirect_config')->first();

            return Inertia::render('QuickAcess', [
                'message' => "O link $url, não é uma url válida!",
                'ConfigLogo' => $ConfigurationLOGOModel->value,
                'ConfigNome' => $ConfigurationNOMEModel->value, 
                'ConfigRedirect' => $ConfigurationREDIRECTModel->value,
            ]);
        }

        return $url;
    }

    public function quickAccessCreate(Request $request) { #dd($request->all());
        /**
         * Verifica se a sessão é válida
         */
        $SessionController = new SessionController;
        $SessionVerify = $SessionController->SessionVerify();

        /** 
         * Antes de tudo verifica se o botão está definido 
         */
        if ($request->has('bttn_edit') || $request->has('bttn_delete')) {
            if ($request->has('bttn_edit')) {
                return $this->edit($request->all());
            }

            if ($request->has('bttn_delete')) {
                return $this->delete($request->all());
            }
        }

        if ($SessionVerify == false) {
            $ConfigurationLOGOModel     = Configuration::select('value')->where('key', 'logo_config')->first();
            $ConfigurationNOMEModel     = Configuration::select('value')->where('key', 'nome_config')->first();
            $ConfigurationREDIRECTModel = Configuration::select('value')->where('key', 'redirect_config')->first();

            return Inertia::render('Login', [
                'message' => 'Sessão Expirada!',
                'ConfigLogo' => $ConfigurationLOGOModel->value,
                'ConfigNome' => $ConfigurationNOMEModel->value, 
                'ConfigRedirect' => $ConfigurationREDIRECTModel->value,
            ]);
        }

        /** Verifica se o input foi enviado */
        if ($request->has('nome')) {
            $nome = $request->input('nome');

            /** Sanitiza o nome */
            /*$nome = $this->sanitizeNome($request->nome);*/

        } else {
            $ConfigurationLOGOModel     = Configuration::select('value')->where('key', 'logo_config')->first();
            $ConfigurationNOMEModel     = Configuration::select('value')->where('key', 'nome_config')->first();
            $ConfigurationREDIRECTModel = Configuration::select('value')->where('key', 'redirect_config')->first();

            /** Para a execução do código pois não foi preenchido o campo nome */
            return Inertia::render('QuickAccess', [
                'message' => 'O campo nome é obrigatório!',
                'ConfigLogo' => $ConfigurationLOGOModel->value,
                'ConfigNome' => $ConfigurationNOMEModel->value, 
                'ConfigRedirect' => $ConfigurationREDIRECTModel->value,
            ]);
        }

        /** Verifica se o input foi enviado */
        if ($request->has('descricao')) {
            $descricao = $request->input('descricao');

            /** Sanitiza a descrição */
            /* $descricao = $this->sanitizeDescricao($request->descricao);*/

        } else {
            /** Para a execução do código pois não foi preenchido o campo descrição */
            $ConfigurationLOGOModel     = Configuration::select('value')->where('key', 'logo_config')->first();
            $ConfigurationNOMEModel     = Configuration::select('value')->where('key', 'nome_config')->first();
            $ConfigurationREDIRECTModel = Configuration::select('value')->where('key', 'redirect_config')->first();

            return Inertia::render('QuickAccess', [
                'message' => 'O campo descrição é obrigatório!',
                'ConfigLogo' => $ConfigurationLOGOModel->value,
                'ConfigNome' => $ConfigurationNOMEModel->value, 
                'ConfigRedirect' => $ConfigurationREDIRECTModel->value,
            ]);
        }

        /** Verifica se o input foi enviado */
        if ($request->has('uri')) {
            /** Sanitiza a uri */
            $uri = $this->sanitizeUri($request->uri);

        } else {
            $ConfigurationLOGOModel     = Configuration::select('value')->where('key', 'logo_config')->first();
            $ConfigurationNOMEModel     = Configuration::select('value')->where('key', 'nome_config')->first();
            $ConfigurationREDIRECTModel = Configuration::select('value')->where('key', 'redirect_config')->first();

            /** Para a execução do código pois não foi preenchido o campo uri */
            return Inertia::render('QuickAccess', [
                'message' => 'O campo url personalizado é obrigatório!',
                'ConfigLogo' => $ConfigurationLOGOModel->value,
                'ConfigNome' => $ConfigurationNOMEModel->value, 
                'ConfigRedirect' => $ConfigurationREDIRECTModel->value,
            ]);
        }

        /** Valida se a imagem tem o formato desejado */
        if($request->hasfile('background')) {
            $background = $this->validateImg($request->file('background'));
        }
        
        /** Valida se a imagem tem o formato desejado */
        if($request->hasfile('foto')) {
            $image = $this->validateImg($request->file('foto'));
        }

        /** Valida se a url está em um formato desejado */
        $redes = [];
        if (
            $request->has('website') ||
            $request->has('whatsapp') ||
            $request->has('instagram') ||
            $request->has('facebook') ||
            $request->has('linkedin') ||
            $request->has('twitter') ||
            $request->has('youtube') ||
            $request->has('email')
        ) {
            // Website
            if ($request->has('website') && !blank($request->input('website'))) {
                // Remove espaços em branco antes e depois
                $url_website = trim($request->input('website'));
        
                // Verifica se a URL já começa com 'http://' ou 'https://'
                if (!preg_match('/^http(s)?:\/\//', $url_website)) {
                    // Se não começar, adiciona 'http://' automaticamente
                    $url_website = 'http://' . $url_website;
                }

                if (!filter_var($request->input('website'), FILTER_VALIDATE_URL)) {
                    
                    $ConfigurationLOGOModel     = Configuration::select('value')->where('key', 'logo_config')->first();
                    $ConfigurationNOMEModel     = Configuration::select('value')->where('key', 'nome_config')->first();
                    $ConfigurationREDIRECTModel = Configuration::select('value')->where('key', 'redirect_config')->first();

                    return Inertia::render('QuickAccess', [
                        'message' => 'Website: O site não está no formato desejado',
                        'ConfigLogo' => $ConfigurationLOGOModel->value,
                        'ConfigNome' => $ConfigurationNOMEModel->value, 
                        'ConfigRedirect' => $ConfigurationREDIRECTModel->value,
                    ]);
                }
                array_push($redes, "website$" . $url_website);
            }

            // Instagram
            if ($request->has('instagram') && !blank($request->input('instagram'))) {
                $url_istagram = trim($request->input('instagram'));
        
                // Verifica se a URL já começa com 'http://' ou 'https://'
                if (!preg_match('/^http(s)?:\/\//', $url_istagram)) {
                    // Se não começar, adiciona 'http://' automaticamente
                    $url_istagram = 'http://' . $url_istagram;
                }

                if (!filter_var($request->input('instagram'), FILTER_VALIDATE_URL)) {

                    $ConfigurationLOGOModel     = Configuration::select('value')->where('key', 'logo_config')->first();
                    $ConfigurationNOMEModel     = Configuration::select('value')->where('key', 'nome_config')->first();
                    $ConfigurationREDIRECTModel = Configuration::select('value')->where('key', 'redirect_config')->first();

                    return Inertia::render('QuickAccess', [
                        'message' => 'Instagram: O site não está no formato desejado',
                        'ConfigLogo' => $ConfigurationLOGOModel->value,
                        'ConfigNome' => $ConfigurationNOMEModel->value, 
                        'ConfigRedirect' => $ConfigurationREDIRECTModel->value,
                    ]);
                }
                array_push($redes, "instagram$" . $url_istagram);
            }

            // Whatsapp
            if ($request->has('whatsapp') && !blank($request->input('whatsapp'))) {
                $url_whatsapp = trim($request->input('whatsapp'));
        
                // Verifica se a URL já começa com 'http://' ou 'https://'
                if (!preg_match('/^http(s)?:\/\//', $url_whatsapp)) {
                    // Se não começar, adiciona 'http://' automaticamente
                    $url_whatsapp = 'http://' . $url_whatsapp;
                }

                if (!filter_var($request->input('whatsapp'), FILTER_VALIDATE_URL)) {

                    $ConfigurationLOGOModel     = Configuration::select('value')->where('key', 'logo_config')->first();
                    $ConfigurationNOMEModel     = Configuration::select('value')->where('key', 'nome_config')->first();
                    $ConfigurationREDIRECTModel = Configuration::select('value')->where('key', 'redirect_config')->first();

                    return Inertia::render('QuickAccess', [
                        'message' => 'Whatsapp: O site não está no formato desejado',
                        'ConfigLogo' => $ConfigurationLOGOModel->value,
                        'ConfigNome' => $ConfigurationNOMEModel->value, 
                        'ConfigRedirect' => $ConfigurationREDIRECTModel->value,
                    ]);
                }
                array_push($redes, "whatsapp$" . $url_whatsapp);
            }

            // Facebook
            if ($request->has('facebook') && !blank($request->input('facebook'))) {
                $url_facebook = trim($request->input('facebook'));
        
                // Verifica se a URL já começa com 'http://' ou 'https://'
                if (!preg_match('/^http(s)?:\/\//', $url_facebook)) {
                    // Se não começar, adiciona 'http://' automaticamente
                    $url_facebook = 'http://' . $url_facebook;
                }
                if (!filter_var($request->input('facebook'), FILTER_VALIDATE_URL)) {

                    $ConfigurationLOGOModel     = Configuration::select('value')->where('key', 'logo_config')->first();
                    $ConfigurationNOMEModel     = Configuration::select('value')->where('key', 'nome_config')->first();
                    $ConfigurationREDIRECTModel = Configuration::select('value')->where('key', 'redirect_config')->first();

                    return Inertia::render('QuickAccess', [
                        'message'        => 'Facebook: O site não está no formato desejado',
                        'ConfigLogo'     => $ConfigurationLOGOModel->value,
                        'ConfigNome'     => $ConfigurationNOMEModel->value, 
                        'ConfigRedirect' => $ConfigurationREDIRECTModel->value,
                    ]);
                }
                array_push($redes, "facebook$" . $url_facebook);
            }

            // Linkedin //
            if ($request->has('linkedin') && !blank($request->input('linkedin'))) {
                // Remove espaços em branco antes e depois
                $url_linkedin = trim($request->input('linkedin'));

                if (!preg_match('/^http(s)?:\/\//', $url_linkedin)) {
                    // Se não começar, adiciona 'http://' automaticamente
                    $url_linkedin = 'http://' . $url_linkedin;
                }

                if (!filter_var($url_linkedin, FILTER_VALIDATE_URL)) {

                    $ConfigurationLOGOModel     = Configuration::select('value')->where('key', 'logo_config')->first();
                    $ConfigurationNOMEModel     = Configuration::select('value')->where('key', 'nome_config')->first();
                    $ConfigurationREDIRECTModel = Configuration::select('value')->where('key', 'redirect_config')->first();

                    return Inertia::render('QuickAccess', [
                        'message'        => 'Linkedin: O site não está no formato desejado',
                        'ConfigLogo'     => $ConfigurationLOGOModel->value,
                        'ConfigNome'     => $ConfigurationNOMEModel->value, 
                        'ConfigRedirect' => $ConfigurationREDIRECTModel->value,
                    ]);
                }
                array_push($redes, "linkedin$" . $url_linkedin);
            }

            // Twitter
            if ($request->has('twitter') && !blank($request->input('twitter'))) {
                if (!filter_var($request->input('twitter'), FILTER_VALIDATE_URL)) {

                    return Inertia::render('QuickAccess', [
                        'message' => 'Twitter: O site não está no formato desejado',
                        'ConfigLogo' => $ConfigurationLOGOModel->value,
                        'ConfigNome' => $ConfigurationNOMEModel->value, 
                        'ConfigRedirect' => $ConfigurationREDIRECTModel->value,
                    ]);
                }
                array_push($redes, "twitter$" . $request->input('twitter'));
            }

            // Youtube
            if ($request->has('youtube') && !blank($request->input('youtube'))) {
                if (!filter_var($request->input('youtube'), FILTER_VALIDATE_URL)) {

                    $ConfigurationLOGOModel     = Configuration::select('value')->where('key', 'logo_config')->first();
                    $ConfigurationNOMEModel     = Configuration::select('value')->where('key', 'nome_config')->first();
                    $ConfigurationREDIRECTModel = Configuration::select('value')->where('key', 'redirect_config')->first();

                    return Inertia::render('QuickAccess', [
                        'message' => 'Youtube: O site não está no formato desejado',
                        'ConfigLogo' => $ConfigurationLOGOModel->value,
                        'ConfigNome' => $ConfigurationNOMEModel->value, 
                        'ConfigRedirect' => $ConfigurationREDIRECTModel->value,
                    ]);
                }
                array_push($redes, "youtube$" . $request->input('youtube'));
            }

            if ($request->has('email') && !blank($request->input('email'))) {
                array_push($redes, "email$" . $request->input('email'));
            }

            if (!empty($redes)) {
                $x = "";
                foreach ($redes as $url) {
                    $x .= $url . " ";
                }
            }

            if (empty($redes)) {
                $x = "";
            }
        }

        if (
            $request->has('linklabel') && !blank($request->input('linklabel')) &&
            $request->has('nomelabel') && !blank($request->input('nomelabel'))
        ) {
            // $combined valores array com valores combinados //
            $combined = array_combine($request->input('nomelabel'), $request->input('linklabel'));
            $z = "";
            $zx = "";
            $personalizados = [];
            
            foreach ($combined as $key => $value) {
                // Se $key ou $value estiverem vazios //
                if (empty($key) || empty($value)) {

                    $ConfigurationLOGOModel     = Configuration::select('value')->where('key', 'logo_config')->first();
                    $ConfigurationNOMEModel     = Configuration::select('value')->where('key', 'nome_config')->first();
                    $ConfigurationREDIRECTModel = Configuration::select('value')->where('key', 'redirect_config')->first();


                    return Inertia::render('QuickAccess', [
                        'message' => 'URL Personalizada: O campo nome ou site estão vazios',
                        'ConfigLogo' => $ConfigurationLOGOModel->value,
                        'ConfigNome' => $ConfigurationNOMEModel->value, 
                        'ConfigRedirect' => $ConfigurationREDIRECTModel->value,
                    ]);
                }

                // Se $key ou $value não estiverem vazios //
                if (!empty($key) && !empty($value)) {
                    // Se não for uma URL //
                    if (!filter_var($value, FILTER_VALIDATE_URL)) {

                        $ConfigurationLOGOModel     = Configuration::select('value')->where('key', 'logo_config')->first();
                        $ConfigurationNOMEModel     = Configuration::select('value')->where('key', 'nome_config')->first();
                        $ConfigurationREDIRECTModel = Configuration::select('value')->where('key', 'redirect_config')->first();

                        return Inertia::render('QuickAccess', [
                            'message' => 'URL Personalizada: O site não está no formato desejado',
                            'ConfigLogo' => $ConfigurationLOGOModel->value,
                            'ConfigNome' => $ConfigurationNOMEModel->value, 
                            'ConfigRedirect' => $ConfigurationREDIRECTModel->value,
                        ]);
                    }

                    // Se for uma URL //
                    if (filter_var($value, FILTER_VALIDATE_URL)) {
                        if (strpos($key, ' ') !== false) {
                            $key = str_replace(' ', '§', $key);
                        }

                        $zx .= $key . '$' . $value . '—';
                    }
                }
            }
        }

        /**
         * INFORMAÇÕES NÃO ENVIADAS!
         */
        if (empty($nome) && empty($descricao) && empty($uri)) {
            $ConfigurationLOGOModel     = Configuration::select('value')->where('key', 'logo_config')->first();
            $ConfigurationNOMEModel     = Configuration::select('value')->where('key', 'nome_config')->first();
            $ConfigurationREDIRECTModel = Configuration::select('value')->where('key', 'redirect_config')->first();


            return Inertia::render('QuickAccess', [
                'data' => $selectQuickAccess,
                'message' => 'Campos obrigatórios não preenchidos!',
                'ConfigLogo' => $ConfigurationLOGOModel->value,
                'ConfigNome' => $ConfigurationNOMEModel->value, 
                'ConfigRedirect' => $ConfigurationREDIRECTModel->value,
            ]);
        }

        /**
         * URI JÁ EM USO!
         */
        $quickAccessModel = new QuickAccess;
        $selectQuickAccess = $quickAccessModel->get();

        if ($quickAccessModel->where('uri', $uri)->exists()) {
            $ConfigurationLOGOModel     = Configuration::select('value')->where('key', 'logo_config')->first();
            $ConfigurationNOMEModel     = Configuration::select('value')->where('key', 'nome_config')->first();
            $ConfigurationREDIRECTModel = Configuration::select('value')->where('key', 'redirect_config')->first();

            return Inertia::render('QuickAccess', [
                'message' => 'O link personalizado inserido, já consta criado!',
                'userData' => session()->get('user_roles'),
                'data' => $selectQuickAccess,
                'ConfigLogo' => $ConfigurationLOGOModel->value,
                'ConfigNome' => $ConfigurationNOMEModel->value, 
                'ConfigRedirect' => $ConfigurationREDIRECTModel->value,
            ]);
        }

        if ($request->file('foto') || !empty($image)) {
            $quickAccessModel->img = $image;
        }
        if ($request->file('background') || !empty($background)) {
            $quickAccessModel->background = $background;
        }

        if (!empty($nome) && !empty($descricao) && !empty($uri)) {
            /** Campos obrigatórios sendo inseridos no banco */
            $quickAccessModel->nome = $nome;
            $quickAccessModel->descricao = $descricao;
            $quickAccessModel->uri = $uri;
            if(isset($x) || !empty($x)) {
                $quickAccessModel->redes = $x; // REDES //
            }
            if(isset($zx) || !empty($zx)) {
                $quickAccessModel->labels = $zx; // LINKS PERSONALIZADOS //
            }
            $quickAccessModel->save();

            /**
             * REGISTRA NOS LOGS
             */
            $ACTION = "create";

            $AuditoriaController = new AuditoriaController;
            $AuditoriaController->QuickAccessLOG(session()->get('user_id'), $nome, $ACTION);

            $quickAccessModel = new QuickAccess;
            $selectQuickAccess = $quickAccessModel->get();

            $ConfigurationLOGOModel     = Configuration::select('value')->where('key', 'logo_config')->first();
            $ConfigurationNOMEModel     = Configuration::select('value')->where('key', 'nome_config')->first();
            $ConfigurationREDIRECTModel = Configuration::select('value')->where('key', 'redirect_config')->first();

            return Inertia::render('QuickAccess', [
                'userData' => session()->get('user_roles'),
                'data' => $selectQuickAccess,
                'message_success' => 'Acesso rápido criado!',
                'ConfigLogo' => $ConfigurationLOGOModel->value,
                'ConfigNome' => $ConfigurationNOMEModel->value, 
                'ConfigRedirect' => $ConfigurationREDIRECTModel->value,
            ]);
        }
    }

    /*private function edit($arrayDataEdit) {
        /**
         * REGISTRA NOS LOGS
         */
        /*$ACTION = "create";

        $AuditoriaController = new AuditoriaController;
        $AuditoriaController->QuickAccessLOG(session()->get('user_id'), $nome, $ACTION);

        $ConfigurationLOGOModel     = Configuration::select('value')->where('key', 'logo_config')->first();
        $ConfigurationNOMEModel     = Configuration::select('value')->where('key', 'nome_config')->first();
        $ConfigurationREDIRECTModel = Configuration::select('value')->where('key', 'redirect_config')->first();
    }*/

    private function delete($arrayDataDelete) {
         /** Função responsável por deletar */
        $SessionController = new SessionController;
        $SessionVerify = $SessionController->SessionVerify();
        
        $urlDel = QuickAccess::where('id', $arrayDataDelete['bttn_delete'])->first();

        if($urlDel) {
            $urlDel->delete();
        }

        /**
         * REGISTRA NOS LOGS
         */
        $ACTION = "deleted";

        $AuditoriaController = new AuditoriaController;
        $AuditoriaController->QuickAccessLOG(session()->get('user_id'), $urlDel->nome, $ACTION);
   
        $quickAccessModel = new QuickAccess;
        $selectQuickAccess = $quickAccessModel->get();

        $ConfigurationLOGOModel     = Configuration::select('value')->where('key', 'logo_config')->first();
        $ConfigurationNOMEModel     = Configuration::select('value')->where('key', 'nome_config')->first();
        $ConfigurationREDIRECTModel = Configuration::select('value')->where('key', 'redirect_config')->first();

        return Inertia::render('QuickAccess', [
            'data' => $selectQuickAccess,
            'userData' => session()->get('user_roles'),
            'message_success' => 'Acesso rápido deletado!',
            'ConfigLogo' => $ConfigurationLOGOModel->value,
            'ConfigNome' => $ConfigurationNOMEModel->value, 
            'ConfigRedirect' => $ConfigurationREDIRECTModel->value,
        ]);
    }
}

