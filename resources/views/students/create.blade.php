@extends('layouts.app')

@section('content')
<div class="alert alert-danger" style="display: none;" role="alert" id="alertErrorCep">
    Não foi possível consultar seu CEP. Por favor, tente novamente :)
</div>
<div class="flex-center position-ref full-height">
    <div class="content">
        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <label for="">Nome
                <input type="text" name="name" required>
            </label>
            <label for="">E-mail
                <input type="text" name="email" required>
            </label>
            <label for="">Status
                <select type="text" name="status" required>
                    <option value="ativo">ativo</option>
                    <option value="inativo">inativo</option>
                </select>
            </label>
            <label for="">CEP
                <input type="text" id="endereco" name="endereco" onblur="consultarCep(this.value)" required>
            </label>
            <label for="">Curso
                <input type="text" name="curso" required>
            </label>
            <label for="">Turma
                <input type="text" name="turma" required>
            </label>
            <label for="">Foto
                <input type="file" name="foto">
            </label>
            <div class="col-12">
                <div class="input-group">
                    <label for="">Rua
                        <input type="text" id="rua" name="rua" required>
                    </label>
                    <label for="">Bairro
                        <input type="text" id="bairro" name="bairro" required>
                    </label>
                    <label for="">Estado
                        <input type="text" id="estado" name="estado" required>
                    </label>
                    <label for="">Cidade
                        <input type="text" id="cidade" name="cidade" required>
                    </label>
                </div>
            </div>
            <button class="btn btn-success" type="submit">CADASTRAR</button>
        </form>
    </div>
</div>
@endsection