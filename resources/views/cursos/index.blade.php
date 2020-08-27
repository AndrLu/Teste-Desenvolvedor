@extends('layouts.app')

@section('content')
    <h1>Cursos</h1> 
    <table class="table table-responsive-sm">
        <a href="/cursos/create" class="btn btn-secondary" style="float: right; margin-right:20px; margin-bottom:20px">CRIAR</a>
        <thead>
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Nome</th>
                <th scope="col">EDITAR</th>
                <th scope="col">REMOVER</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cursos as $curso)
                <tr>
                    <th>{{ $curso->codigo }}</th>
                    <th>{{ $curso->nome }}</th>
                    <th>
                        <a href="/cursos/{{$curso->id}}/edit" class="btn btn-primary">EDITAR</a>
                    <th>
                        <a href="/cursos/{{$curso->id}}/delete" class="btn btn-danger">REMOVER</a>
                    </th>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                
            </tr>
        </tfoot>
    </table>
    </form>
@endsection
