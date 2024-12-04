<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\SetupController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\LoginAuthenticationController;
use App\Http\Controllers\ShorterUrlController;
use App\Http\Controllers\QuickAccessController;
use App\Http\Controllers\AdminController;
//use App\Http\Controllers\TemasFestivosController;

use App\Models\User;
use App\Models\UrlShorter;
use App\Models\QuickAccess;
use App\Models\Configuration;
use App\Models\Setup;

Route::post('/setup', [SetupController::class, 'updateLdapEnv']);
Route::post('/login', [LoginAuthenticationController::class, 'userSanitize']);
Route::post('/encurtadordeurl', [ShorterUrlController::class, 'shorterUrlCreate']);
Route::post('/acessorapido', [QuickAccessController::class, 'quickAccessCreate']);
Route::post('/usuarios', [AdminController::class, 'userFunction']);
Route::post('/configuracoes', [AdminController::class, 'configFunction']);
//Route::post('/auditoria', [AdminController::class, 'auditFunction']);

Route::get('/setup', function () {
    // IMPORTANTE //
    $appInitialized = Setup::where('key', 'app_initialized')->first();

    if ($appInitialized == null || $appInitialized->value !== 'true') {
        // A aplicação está sendo iniciada pela primeira vez
        return Inertia::render('Setup');
    } else {
        return redirect()->to('/login');
    }
});

Route::get('/', function() {
    // IMPORTANTE //
    $appInitialized = Setup::where('key', 'app_initialized')->first();

    if (!$appInitialized || $appInitialized->key === false || $appInitialized->key === null || Setup::where('value', 'in_progress')->first()) {
        // A aplicação está sendo iniciada pela primeira vez   
        return redirect()->to('/setup');
    }
        // Ações adicionais, como configurar dados padrões
        // Ações adicionais, como configurar dados padrões
        // Ações adicionais, como configurar dados padrões
        // return response()->json(['message' => 'Aplicação inicializada!']);

        // Caso contrário, a aplicação já foi inicializada
        //return response()->json(['message' => 'Aplicação já foi inicializada.']);

    // IMPORTANTE //

    if(!session()->has('session_id')) {
        return redirect()->to('/login');
    }

    if(session()->has('session_id')) {
        $SessionController = new SessionController;
        $SessionVerify = $SessionController->SessionVerify();

        if($SessionVerify == false) {
            return Inertia::render('Login', [
                'message' => 'Sessão Expirada!'
            ]);
        }

        return redirect()->to('/encurtadordeurl');
    }

    return redirect()->to('/login');
});

Route::get('/login', function() {
    // IMPORTANTE //
    $appInitialized = Setup::where('key', 'app_initialized')->first();
    
    if (!$appInitialized || $appInitialized->key === false || $appInitialized->key === null || Setup::where('value', 'in_progress')->first()) {
        // A aplicação está sendo iniciada pela primeira vez
        return redirect()->to('/setup');
    }

    if(!session()->has('session_id')) {
        /** SELECT CONFIGDATA */
        $ConfigurationLOGOModel     = Configuration::select('value')->where('key', 'logo_config')->first();
        $ConfigurationNOMEModel     = Configuration::select('value')->where('key', 'nome_config')->first();
        $ConfigurationREDIRECTModel = Configuration::select('value')->where('key', 'redirect_config')->first();

        return Inertia::render('Login', [
            'ConfigLogo' => $ConfigurationLOGOModel->value,
            'ConfigRedirect' => $ConfigurationREDIRECTModel->value
        ]);
    }

    if(session()->has('session_id')) {
        $SessionController = new SessionController;
        $SessionVerify = $SessionController->SessionVerify();

        if($SessionVerify == false) {
            return Inertia::render('Login', [
                'message' => 'Sessão Expirada!'
            ]);
        }

        $ConfigurationLOGOModel     = Configuration::select('value')->where('key', 'logo_config')->first();
        $ConfigurationNOMEModel     = Configuration::select('value')->where('key', 'nome_config')->first();
        $ConfigurationREDIRECTModel = Configuration::select('value')->where('key', 'redirect_config')->first();

        return Inertia::render('ShorterUrl', [
            'ConfigLogo' => $ConfigurationLOGOModel->value,
            'ConfigNome' => $ConfigurationNOMEModel->value,
            'ConfigRedirect' => $ConfigurationREDIRECTModel->value,
        ]);
    }
})->name('login');

/*Route::get('/home', function() {
    if(!session()->has('session_id')) {
        return redirect()->to('/login');
    }

    if(session()->has('session_id')) {
        $SessionController = new SessionController;
        $SessionVerify = $SessionController->SessionVerify();

        if($SessionVerify == false) {
            return Inertia::render('Login', [
                'message' => 'Sessão Expirada!'
            ]);
        }

        return Inertia::render('Home', [
            'userID' => session()->get('id_user'),
        ]);
    }
});*/

Route::get('/usuarios', function() {
    $SessionController = new SessionController;
    $SessionVerify = $SessionController->SessionVerify();

    if(session()->get('user_roles') == 0) {
        return abort(404);
    }

    if($SessionVerify == false) {
        return Inertia::render('Login', [
            'message' => 'Sessão Expirada!'
        ]);
    }

    /** SELECT CONFIGDATA */
    $ConfigurationLOGOModel     = Configuration::select('value')->where('key', 'logo_config')->first();
    $ConfigurationNOMEModel     = Configuration::select('value')->where('key', 'nome_config')->first();
    $ConfigurationREDIRECTModel = Configuration::select('value')->where('key', 'redirect_config')->first();

    return Inertia::render('AdminUser', [
        'UserData' => $UserData = User::all(),
        'ConfigLogo' => $ConfigurationLOGOModel->value,
        'ConfigNome' => $ConfigurationNOMEModel->value,
        'ConfigRedirect' => $ConfigurationREDIRECTModel->value
    ]);
});

Route::get('/configuracoes', function() {
    $SessionController = new SessionController;
    $SessionVerify = $SessionController->SessionVerify();

    if(session()->get('user_roles') == 0) {
        return abort(404);
    }

    if($SessionVerify == false) {
        return Inertia::render('Login', [
            'message' => 'Sessão Expirada!'
        ]);
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

    return Inertia::render('AdminConfiguration');
});

Route::get('/auditoria', function() {
    // Instancia o SessionController
    $SessionController = new SessionController;
    $SessionVerify = $SessionController->SessionVerify();

    // Verifica se o usuário tem permissão (exemplo: role 0 é restrito)
    if(session()->get('user_roles') == 0) {
        return abort(404); // Se o usuário não tiver permissão, retorna 404
    }

    // Verifica se a sessão está expirada
    if($SessionVerify == false) {
        return Inertia::render('Login', [
            'message' => 'Sessão Expirada!' // Se a sessão estiver expirada, renderiza a página de login
        ]);
    }

    // Caminho completo para o arquivo de log na pasta storage
    $filePath = storage_path('app/auditoria_log.txt');

    // Verifica se o arquivo existe
    if (File::exists($filePath)) {
        // Lê o conteúdo do arquivo
        $content = File::get($filePath);
        
        // Se necessário, garantir que as quebras de linha sejam aplicadas corretamente
        // Em alguns casos, você pode querer substituir outras formas de quebra de linha por "\n"
        $content = str_replace(["\r\n", "\r"], "\n", $content);

        // Retorna o conteúdo dentro de uma tag <pre> para preservação de formato
        return response("<pre>$content</pre>", 200, [
            'Content-Type' => 'text/html',
        ]);
    }

    // Se o arquivo não for encontrado, retorna um JSON com a mensagem de erro
    return response()->json(['message' => 'Arquivo não encontrado.'], 404);
});

Route::get('/encurtadordeurl', function() {
    if(!session()->has('session_id')) {
        return redirect()->to('/login');
    }

    if(session()->has('session_id')) {
        $SessionController = new SessionController;
        $SessionVerify = $SessionController->SessionVerify();
        
        if($SessionVerify == false) {
            return Inertia::render('Login', [
                'message' => 'Sessão Expirada!'
            ]);
        }

        $urlShorterModel = new UrlShorter;
        $urlSelect = $urlShorterModel->select('id', 'nome', 'url', 'uri', 'created_at', 'updated_at')->where('location', session()->get('user_location'))->get();

        $ConfigurationLOGOModel     = Configuration::select('value')->where('key', 'logo_config')->first();
        $ConfigurationNOMEModel     = Configuration::select('value')->where('key', 'nome_config')->first();
        $ConfigurationREDIRECTModel = Configuration::select('value')->where('key', 'redirect_config')->first();

        return Inertia::render('ShorterUrl', [
            'userData' => session()->get('user_roles'),
            'urls' => $urlSelect,
            'ConfigLogo' => $ConfigurationLOGOModel->value,
            'ConfigNome' => $ConfigurationNOMEModel->value, 
            'ConfigRedirect' => $ConfigurationREDIRECTModel->value,
        ]);
    }
});

Route::get('/acessorapido', function() {
    if(!session()->has('session_id')) {
        return redirect()->to('/login');
    }

    if(session()->has('session_id')) {
        $SessionController = new SessionController;
        $SessionVerify = $SessionController->SessionVerify();
        
        if($SessionVerify == false) {
            return Inertia::render('Login', [
                'message' => 'Sessão Expirada!'
            ]);
        }

        $QuickAccessModel = new QuickAccess;
        $selectQuickAccess = $QuickAccessModel->get();

        $ConfigurationLOGOModel     = Configuration::select('value')->where('key', 'logo_config')->first();
        $ConfigurationNOMEModel     = Configuration::select('value')->where('key', 'nome_config')->first();
        $ConfigurationREDIRECTModel = Configuration::select('value')->where('key', 'redirect_config')->first();

        return Inertia::render('QuickAccess', [
            'userData' => session()->get('user_roles'),
            'data' => $selectQuickAccess,
            'ConfigLogo' => $ConfigurationLOGOModel->value,
            'ConfigNome' => $ConfigurationNOMEModel->value,
            'ConfigRedirect' => $ConfigurationREDIRECTModel->value,
        ]);
    }
});

Route::get('/logout', function() {
    session()->invalidate();
    session()->regenerateToken();
    
    return redirect()->to('login');
    /*return Inertia::render('Login', [
        'message_success' => 'Logout realizado com sucesso!'
    ]);*/
});

Route::get('/page/{linktree}', function ($linktree) {

    $x = QuickAccess::where('uri' ,$linktree)->first();

    if($x == null) {
        return redirect()->route('erro')->with('message', 'Página não encontrada!');
    }

    $array = explode(" ", $x->redes);

    foreach($array as $item) {
        // Website //
        if(explode("$", $item)[0] == "website") {
            $website = explode("$", $item)[1];
        }
        if(!isset($website)) {
            $website = null;
        }

        // Instagram //
        if(explode("$", $item)[0] == "instagram") {
            $instagram = explode("$", $item)[1];
        }
        if(!isset($instagram)) {
            $instagram = null;
        }

        // Whatsapp //
        if(explode("$", $item)[0] == "whatsapp") {
            $whatsapp = explode("$", $item)[1];
        }
        if(!isset($whatsapp)) {
            $whatsapp = null;
        }

        // Facebook //
        if(explode("$", $item)[0] == "facebook") {
            $facebook = explode("$", $item)[1];
        } 
        if(!isset($facebook)) {
            $facebook = null;
        }

        // Email //
        if(explode("$", $item)[0] == "email") {
            $email = explode("$", $item)[1];
        } 
        if(!isset($email)) {
            $email = null;
        }

        // Linkedin //
        if(explode("$", $item)[0] == "linkedin") {
            $linkedin = explode("$", $item)[1];
        } 
        if(!isset($linkedin)) {
            $linkedin = null;
        }

        // Twitter //
        if(explode("$", $item)[0] == "twitter") {
            $twitter = explode("$", $item)[1];
        } 
        if(!isset($twitter)) {
            $twitter = null;
        }

        // Tiktok //
        if(explode("$", $item)[0] == "tiktok") {
            $tiktok = explode("$", $item)[1];
        } 
        if(!isset($tiktok)) {
            $tiktok = null;
        }

        // Youtube //
        if(explode("$", $item)[0] == "youtube") {
            $youtube = explode("$", $item)[1];
        } 
        if(!isset($youtube)) {
            $youtube = null;
        }
    }

    if($x->labels) {
        $contador_impar = 0;
        $personalizados_nome = [];
        $personalizados_url = [];
        $elementos_impares = [];

        #dd($x->personalizados);
        #dd(explode('$', $x->personalizados));
        
        foreach (explode('—', $x->labels) as $item) {
            $partes = explode('$', $item);
        
            if (count($partes) === 2) {
                // Extraia o nome e a URL
                $nome = trim($partes[0]); // Nome do personalizado, ex: "Stack§Overflow" ou "w3"
                $url = trim($partes[1]);  // URL do personalizado, ex: "https://pt.stackoverflow.com/"
        
                if (strpos($nome, '§') !== false) {
                    $nome = str_replace('§', ' ', $nome);
                }

                // Valida a URL
                if (filter_var($url, FILTER_VALIDATE_URL)) {        
                    // Adiciona ao array usando array_push
                    array_push($personalizados_nome, $nome);       // Adiciona o nome ao array de nomes
                    array_push($personalizados_url, $url); // Adiciona a URL formatada ao array de URLs
                }
            }
        }
        $personalizados = array_combine($personalizados_nome, $personalizados_url);
    }

    if($x !== null && isset($personalizados)) {
        return view('TemplateForQuickAccess.QuickTemplate', [
            'foto'           => $x->img,
            'background'     => $x->background,
            'nome'           => $x->nome,
            'descricao'      => $x->descricao,
            'website'        => $website,
            'linkedin'       => $linkedin,
            'email'          => $email,
            'twitter'        => $twitter,
            'instagram'      => $instagram,
            'facebook'       => $facebook,
            'whatsapp'       => $whatsapp,
            'youtube'        => $youtube,
            'tiktok'         => $tiktok,
            'personalizados' => $personalizados,
        ]);
    }

    if($x !== null && !isset($personalizados)) {
        return view('TemplateForQuickAccess.QuickTemplate', [
            'foto'           => $x->img,
            'background'     => $x->background,
            'nome'           => $x->nome,
            'descricao'      => $x->descricao,
            'website'        => $website,
            'linkedin'       => $linkedin,
            'email'          => $email,
            'twitter'        => $twitter,
            'instagram'      => $instagram,
            'facebook'       => $facebook,
            'whatsapp'       => $whatsapp,
            'youtube'        => $youtube,
            'tiktok'         => $tiktok,
        ]);
    }
});

Route::get('/erro', function () {

    return Inertia::render('ErrorPage');
})->name('erro');

Route::get('/{uri}', function ($uri) {
    $selectUrlShorter = UrlShorter::select('url')->where('uri', $uri)->first();

    if(empty($selectUrlShorter)) {
        return redirect()->route('erro');
    }

    return redirect()->to($selectUrlShorter->url);
});


