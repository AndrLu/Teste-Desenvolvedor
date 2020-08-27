@extends('layouts.app')

@section('content')
<div class="alert alert-danger" style="display: none;" role="alert" id="alertErrorCep">
    Não foi possível consultar seu CEP. Por favor, tente novamente :)
</div>
<div class="flex-center position-ref full-height">
    <div class="content">
        <form action="{{ route('cursos.store') }}" method="POST">
            @csrf
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col"><input type="text" name="codigo" required></th>
                        <th scope="col"><input type="text" name="nome" required></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Codigo</td>
                        <td>Curso</td>
                    </tr>
                </tbody>
            </table>
            <button class="btn btn-success" type="submit" style="margin-right:20px">CADASTRAR</button>
        </form>
    </div>
</div>
@endsection