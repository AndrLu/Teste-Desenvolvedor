@extends('layouts.app')

@section('content')
<div class="content">
    <div class="title m-b-md">
        Laravel
        <div class="alert alert-success" role="alert" id="alertErrorCep">
            <h5>Caso deseje acessar a pesquisa de usuário pelo id informe o link como: link/students/{id de busca}/edit</h5>
            <h5>Caso deseje acessar a pesquisa de cursos pelo id informe o link como: link/cursos/{id de busca}/edit</h5>
        </div>        
    </div>
    
    <div class="links">
        <a href="{{url('students')}}">CRUD Aluno</a>
        <a href="{{url('cursos')}}">CRUD Curso</a>
        <a href="{{url('importarXml')}}">Importar XML</a>
        <a href="https://github.com/AndrLu">Github</a>
    </div>
</div>
@endsection