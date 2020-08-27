@extends('layouts.app')

@section('content')
<div class="alert alert-danger" style="display: none;" role="alert" id="alertErrorCep">
    Não foi possível consultar seu CEP. Por favor, tente novamente :)
</div>
<form action="{{ route('cursos.update', $curso->id) }}" method="POST">
    @csrf
    <table class="table table-borderless">
        <thead>
            <tr>
                <th scope="col"><input type="text" value="{{ $curso->codigo }}" name="codigo" required></th>
                <th scope="col"><input type="text" value="{{ $curso->nome }}" name="nome" required></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Codigo</td>
                <td>Curso</td>
            </tr>
        </tbody>
    </table>
    <button class="btn btn-info" type="submit">ATUALIZAR</button>
</form>
@endsection