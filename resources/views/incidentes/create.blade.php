
@extends('layout')

@section('conteudo')
	
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

	<form method="post" class="mt-2">
		@csrf
		<?php if (!empty(@$incidente)){ ?>
		@method('PUT')
		<?php }?>
		
		<div class="mb-3">
			<label for="titulo" class="form-label">Título</label> 
			<input type="text" class="form-control" id="titulo" name="titulo" placeholder="">
		</div>
		<div class="mb-3">
			<label for="descricao" class="form-label">Descrição</label> 
			<textarea class="form-control" rows="4" cols="" id="descricao" name="descricao"></textarea>
		</div>
		<div class="mb-3">
			<label for="critericidade" class="form-label">Criticidade</label>
			<select class="form-control" id="criticidade" name="criticidade">
				<option value=""></option>
				<option>Alta</option>
				<option>Média</option>
				<option>Baixa</option>
			</select>
		</div>
		<div class="mb-3">
			<label for="tipo" class="form-label">Tipo</label>
			<select class="form-control" id="tipo" name="tipo">
				<option value=""></option>
				<option>Alarme</option>
				<option>Incidente</option>
				<option>Outros</option>
			</select>
		</div>
		
		<div class="mb-3">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="status_ativo" value="1" checked="checked">
                <label class="form-check-label" for="status_ativo">Ativo</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="status_inativo" value="0">
                <label class="form-check-label" for="status_inativo">Inativo</label>
            </div>
		</div>
		
		<div class="mb-3">
			<button type="submit" class="btn btn-primary">Salvar</button>
			<a class="btn btn-link float-end" href="/incidentes">Cancelar</a>
		</div>
	</form>
@endsection

@section('scripts')
<script>
<?php if (!empty(@$incidente)){ ?>
	
$("#titulo").val("{{$incidente->titulo}}");	

var descricao = <?php echo json_encode($incidente->descricao); ?>;
$("#descricao").val(descricao);	


$("#criticidade").val("{{$incidente->criticidade}}");	
$("#tipo").val("{{$incidente->tipo}}");	

<?php if ($incidente->status == 1){ ?>
$("#status_ativo").prop("checked", true);
<?php }else{?>
$("#status_inativo").prop("checked", true);
<?php } ?>

<?php }?>
</script>
@endsection