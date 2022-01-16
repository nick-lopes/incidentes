<?php
namespace App\Services;

use App\Incidente;
use Illuminate\Support\Facades\DB;

class ExcluirIncidente
{
    
    public function excluirIncidente(int $idIncidente): string {
        
        $tituloIncidente = '';
        
        DB::transaction(function () use ($idIncidente, &$tituloIncidente){
        
            $incidente = Incidente::find($idIncidente);
            
            $tituloIncidente = $incidente->titulo;
            
            $incidente->delete();
            
        });
        
        return $tituloIncidente;
        
    }
    
}

