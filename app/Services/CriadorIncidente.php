<?php
namespace App\Services;

use App\Incidente;

class CriadorIncidente
{
    
    public function criarIncidente(string $titulo, string $descricao, string $criticidade, string $tipo, int $status) {

        $incidente = new Incidente();
        $incidente->titulo = $titulo;
        $incidente->descricao = $descricao;
        $incidente->criticidade = $criticidade;
        $incidente->tipo = $tipo;
        $incidente->status = $status;        
        
        $incidente->save();
        
        return $incidente;
        
    }
    
}

