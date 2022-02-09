@extends('layouts.main')
@section('content')
    <div class="container card">
        <div class="card-body">
            <div class="row d-flex justify-content-center">
                <div class="col-8 col-md-6">
                    <h3>Cadastrar nova Categoria:</h3>
                </div>
            </div>
            <br><br><br>
            <form action="{{route("cadastrar_categoria")}}" method="post">
                @csrf
                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-6">
                        <strong>Nome da Categoria:</strong>
                        <input type="text" name="nome" required minlength="10" class="form-control col-10">
                    </div>
                    <div class="col-12 col-md-6">
                        <strong>Descrição:</strong>
                        <textarea name="descricao" class="form-control col-12" cols="30" required rows="3"></textarea>
                    </div>
                </div>
                <hr>
                <div class="row d-flex justify-content-end">
                    <div class="col-6 col-md-1">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                    <div class="col-1">
                        <a href="">
                            <button type="button" onclick="window.history.go(-1); return false;" class="btn btn-secondary">Cancelar</button>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection