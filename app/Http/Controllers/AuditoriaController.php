<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AuditoriaController extends Controller
{
    /**
     * Registra o log para criação de encurtador.
     */
    public function shorterUrlLOG($USER, $NAMEOFSHORTER, $ACTION) {
        // Caminho completo para o arquivo de log na pasta storage
        $filePath = storage_path('app/auditoria_log.txt');

        // Verifica se o arquivo já existe
        if (!File::exists($filePath)) {
            // Cria o arquivo com conteúdo vazio, se não existir
            file_put_contents($filePath, "");
        }
 
        if($ACTION == "create") {
            // Adiciona a entrada no log
            $content = now()->format('Y-m-d H:i:s') . ": O usuário $USER CRIOU o Encurtador: $NAMEOFSHORTER";
            file_put_contents($filePath, $content . PHP_EOL, FILE_APPEND);
        }

        if($ACTION == "edited") {
            // Adiciona a entrada no log
            $content = now()->format('Y-m-d H:i:s') . ": O usuário $USER EDITOU o Encurtador: $NAMEOFSHORTER";
            file_put_contents($filePath, $content . PHP_EOL, FILE_APPEND);
        }

        if($ACTION == "deleted") {
            // Adiciona a entrada no log
            $content = now()->format('Y-m-d H:i:s') . ": O usuário $USER DELETOU o Encurtador: $NAMEOFSHORTER";
            file_put_contents($filePath, $content . PHP_EOL, FILE_APPEND);
        }
    }

    /**
     * Registra o log para criação de acesso rápido.
     */
    public function QuickAccessLOG($USER, $NAMEOFQUICKACCESS, $ACTION) {
        // Caminho completo para o arquivo de log na pasta storage
        $filePath = storage_path('app/auditoria_log.txt');

        // Verifica se o arquivo já existe
        if (!File::exists($filePath)) {
            // Cria o arquivo com conteúdo vazio, se não existir
            file_put_contents($filePath, "");
        }
 
        if($ACTION == "create") {
            // Adiciona a entrada no log
            $content = now()->format('Y-m-d H:i:s') . ": O usuário $USER CRIOU o Acesso: $NAMEOFQUICKACCESS";
            file_put_contents($filePath, $content . PHP_EOL, FILE_APPEND);
        }

        if($ACTION == "edited") {
            // Adiciona a entrada no log
            $content = now()->format('Y-m-d H:i:s') . ": O usuário $USER EDITOU o Acesso: $NAMEOFQUICKACCESS";
            file_put_contents($filePath, $content . PHP_EOL, FILE_APPEND);
        }

        if($ACTION == "deleted") {
            // Adiciona a entrada no log
            $content = now()->format('Y-m-d H:i:s') . ": O usuário $USER DELETOU o Acesso: $NAMEOFQUICKACCESS";
            file_put_contents($filePath, $content . PHP_EOL, FILE_APPEND);
        }
    }
}
