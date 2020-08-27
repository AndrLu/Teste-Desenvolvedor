@extends('layouts.app')

@section('content')
<div class="content">
    <form action="/importarXml" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="">
            Selecione o arquivo para importação
            <input type="file" name="xml">
        </label>
        <button class="btn btn-success">Enviar</button>
    </form>
    
</div>
@endsection