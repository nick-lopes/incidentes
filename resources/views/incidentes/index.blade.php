@extends('layout')
        
@section('conteudo')

	<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="alerta_mensagem_popup" class="toast align-items-center text-white <?= @$mensagem['tipo'];?> border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                	{{ @$mensagem['mensagem'] }}
                </div>
            	<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <a href="/incidentes/novo" class="btn btn-sm btn-primary mt-2 mb-3 align-self-end">Novo Incidente</a>
    
    <div class="row">
    	<div class="col col-12">
    		<div class="card">
    			<table class="table table-hover">
    				<thead>
    					<tr>
    						<th>Título</th>
    						<th >Descrição</th>
    						<th>Critic.</th>
    						<th>Tipo</th>
    						<th>Status</th>
    						<td></td>
    					</tr>
    				</thead>
    				<tbody>
    				    <?php         
                            foreach($incidentes as $inc){
                        ?>  
                        	<tr>
                        		<th>{{$inc->titulo}}</th>
                        		<td >
									<span class="d-inline-block text-truncate" style="max-width: 200px;">
										{{$inc->descricao}}
									</span>
                        		</td>
                        		<td>{{$inc->criticidade}}</td>
                        		<td>{{$inc->tipo}}</td>
                        		<td>
                            		<?php 
                            		if($inc->status == '1')
                            		    echo "Ativo";
                            		else 
                            		    echo "Inativo";
                        		    ?>
                    		    </td>
                        		
                        		<td>
                        			<form method="post" action="/incidentes/{{$inc->id}}" class="float-end ms-2" 
                        			onsubmit="return confirm('Deseja excluir o incidente?');">
                        				@csrf	
                        				@method('DELETE')
                        				<button type="submit" class="btn btn-danger btn-sm "><i class="fas fa-trash"></i></button>
                        			</form>
                        			
                        			<a href="/incidentes/{{$inc->id}}" class="btn btn-primary btn-sm float-end "><i class="fas fa-edit"></i></a>
                        		</td>
                        	</tr>
						<?php      
                            }
                        ?>
    				</tbody>
    			</table>
			</div>
    	</div>
    </div>
    
@endsection

@section('scripts')
<script>
<?php if(@$mensagem['show']){?>
var mensagem_popup = document.getElementById('alerta_mensagem_popup');
var toast = new bootstrap.Toast(mensagem_popup)
toast.show();
<?php }?>
</script>
@endsection