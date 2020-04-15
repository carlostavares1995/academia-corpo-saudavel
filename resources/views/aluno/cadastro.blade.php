@extends('adminlte::page')

@section('title', 'Aluno')

@section('content_header')
    <h1 class="m-0 text-dark">Cadastro de Aluno</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">__Cadastro__</p>
                </div>
                <div class="card-footer text-center">
                    <a type="button" class="btn btn-default" href="/aluno">
                        <i class="fa fa-history"></i> Voltar
                    </a>
                    <a type="button" class="btn btn-primary" href="/aluno/store">
                        <i class="fa fa-save"></i> Salvar
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
