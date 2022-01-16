<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">	
        <title>Incidentes</title>
		
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
		<link href="/assets/fontawesome/css/all.css" >
		<script src="/js/jquery.min.js"></script>
		<style>
		  body{
		      background-color: #e1e1e1;
		  }
		</style>
		
    </head>
    <body>
    
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-gradient m-0">
            <div class="container-fluid">
                <a class="navbar-brand">Incidentes</a>
            </div>
        </nav>
		
		<div class="container-fluid">            
        @yield("conteudo")
        </div>
    </body>
    
    <footer>
    	
    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    	<script src="/assets/fontawesome/js/all.js"></script>
    	@yield("scripts")
    </footer>    
</html>
        