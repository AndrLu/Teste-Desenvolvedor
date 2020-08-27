@extends('layouts.app')

@section('content')
<div class="alert alert-danger" style="display: none;" role="alert" id="alertErrorCep">
    Não foi possível consultar seu CEP. Por favor, tente novamente :)
</div>
<form action="{{ route('students.update', $student->id) }}" method="POST">
    @csrf
    <label for="">Nome
        <input type="text" value="{{ $student->name }}" name="name">
    </label>
    <label for="">E-mail
        <input type="text" value="{{ $student->email }}" name="email">
    </label>
    <label for="">Status
        <select type="text" name="status" required>
            <option value="{{ $student->status }}">{{ $student->status }}</option>
            <option value="ativo">ativo</option>
            <option value="inativo">inativo</option>
        </select>
    </label>
    <label for="">CEP
        <input type="text" value="{{ $student->endereco }}" onblur="consultarCep(this.value)" name="endereco">
    </label>
    <label for="">Curso
        <input type="text" value="{{ $student->curso }}" name="curso">
    </label>
    <label for="">Turma
        <input type="text" value="{{ $student->turma }}" name="turma">
    </label>
    <label for="">Foto
        <input type="file" value="{{ $student->foto }}" name="foto">
    </label>
    <label for="">Rua
        <input type="text" value="{{ $user_endereco->rua }}" id="rua" name="rua" required>
    </label>
    <label for="">Complemento
        <input type="text" value="{{ $user_endereco->complemento }}" id="complemento" name="complemento" required>
    </label>
    <label for="">Bairro
        <input type="text" value="{{ $user_endereco->bairro }}" id="bairro" name="bairro" required>
    </label>
    <label for="">Estado
        <input type="text" value="{{ $user_endereco->estado }}" id="estado" name="estado" required>
    </label>
    <label for="">Cidade
        <input type="text" value="{{ $user_endereco->cidade }}" id="cidade" name="cidade" required>
    </label>
    <button class="btn btn-info" type="submit">ATUALIZAR</button>
</form>
@endsection