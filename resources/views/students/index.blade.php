@extends('layouts.app')

@section('content')
    <h1>Alunos</h1> 
    <table class="table table-responsive-sm">
        <a href="/students/create" class="btn btn-secondary" style="float: right; margin-right:20px; margin-bottom:20px">CRIAR</a>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Status</th>
                <th scope="col">Endereço</th>
                <th scope="col">Curso</th>
                <th scope="col">Turma</th>
                <th scope="col">Data Matricula</th>
                <th scope="col">Foto</th>
                <th scope="col">EDITAR</th>
                <th scope="col">REMOVER</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <th>{{ $student->id }}</th>
                    <th>{{ $student->name }}</th>
                    <th>{{ $student->email }}</th>
                    <th>{{ $student->status }}</th>
                    <th>{{ $student->endereco }}</th>
                    <th>{{ $student->curso }}</th>
                    <th>{{ $student->turma }}</th>
                    <th>{{ $student->data_matricula }}</th>
                    <th>{{ $student->foto }}</th>
                    <th>
                        <a href="/students/{{$student->id}}/edit" class="btn btn-primary">EDITAR</a>
                    <th>
                        <a href="/students/{{$student->id}}/delete" class="btn btn-danger">REMOVER</a>
                    </th>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="2">
                </td>
            </tr>
        </tfoot>
    </table>
    </form>
@endsection
