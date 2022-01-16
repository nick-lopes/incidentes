<?php
namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Http\Requests\IncidenteFormRequest;
use App\Services\CriadorIncidente;
use App\Incidente;
use App\Services\ExcluirIncidente;


class ControllerIncidentes extends Controller
{
    
    public function index(Request $request) {
        
        $incidentes = Incidente::query()->get();
        
        $mensagem = $request->session()->get("mensagem");
        $request->session()->remove('mensagem');
        
        return view("incidentes.index", array(
            'incidentes' => $incidentes,
            'mensagem' => $mensagem
        ));
        
    }
    
    public function create() {
        return view("incidentes.create");
    }
    
    public function store(IncidenteFormRequest $request, CriadorIncidente $criarNovoIncidente ) {

        $incidente = $criarNovoIncidente->criarIncidente(
            $request->get('titulo'),
            $request->get('descricao'),
            $request->get('criticidade'),
            $request->get('tipo'),
            $request->get('status')
        );
        
        $request->session()->flash("mensagem", array("mensagem" => 'Incidente adicionado com sucesso!', "tipo" => 'bg-success', 'show' => true));
        
        return redirect('/incidentes');
    }
    
    public function info(int $incidenteId, Request $request) {
        
        $incidente = Incidente::find($incidenteId);

        if(empty($incidente)){
            return redirect('/incidentes/novo');
        }
        
        $mensagem = $request->session()->get("mensagem");
        $request->session()->remove('mensagem');
        
        return view("incidentes.create", array(
            'incidente' => $incidente,
            'mensagem' => $mensagem
        ));
        
    }  
    
    public function update(int $id, IncidenteFormRequest $request )
    {
        $incidente = Incidente::find($id);

        $incidente->titulo = $request->titulo;
        $incidente->descricao = $request->descricao;
        $incidente->criticidade = $request->criticidade;
        $incidente->tipo = $request->tipo;
        $incidente->status = $request->status;
        
        $incidente->save();

        $request->session()->flash("mensagem", array("mensagem" => 'Incidente atualizado com sucesso!', "tipo" => 'bg-success', 'show' => true));
        
        return redirect('/incidentes');
    }
    
    
    public function destroy(Request $request, ExcluirIncidente $incidenteToDelete){
        
        $tituloIncidente = $incidenteToDelete->excluirIncidente($request->id);
        
        $request->session()->flash("mensagem", array("mensagem" => "Incidente '{$tituloIncidente}' foi deletado!", "tipo" => 'bg-success', 'show' => true));
        
        return redirect('/incidentes');
    }
    
}
