<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sessions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SessionController extends Controller
{
    public function InitializeSession($USER) {
        /** Insere uma sessão de acordo com o ID na tabela */
        $sessionInitial = session()->put('session_id', session()->getId());

        return true;
    }

    public function SessionVerify() {
        /** Função responsável por verificar se a sessão é válida */
        if (!session()->has('session_id')) {
            /** Se não existe sessão, retorna o usuário para o Login */
            return Inertia::render('Login', [
                'message' => 'Sessão expirada!'
            ]);
        }

        /** Sessão que está gravada no banco */
        $currentSessionId = session()->getId();

        /** Sessão gravada na sessão atual */
        $storedSessionId = session()->get('session_id');
        
        /** Faz o comparativo se as sessões possuem os valores idênticos */
        if ($storedSessionId !== $currentSessionId) {
            /** Se a sessão não tiver os valores idênticos a sessão morre e retorna o usuário para o Login */
            session()->regenerate();
            session(['session_id' => session()->getId()]);
    
            return Inertia::render('Login', [
                'message' => 'Sessão expirada!'
            ]);
        }

        session()->put('session_id', session()->getId());

        /** Se tudo ocorrer bem no caso:
         *  1. A sessão existir;
         *  2. A sessão gravada no banco for idêntica ao valor da sessão gravada na atual.
         * 
         *  A função retornará true. 
         */
        return true; 
    }
}
