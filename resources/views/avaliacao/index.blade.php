@extends('adminlte::page')

@section('title', 'Avaliação')

@section('content_header')
    <h1 class="m-0 text-dark">Listagem de Avaliações</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">__Listagem__</p>
                </div>
                <div class="card-footer text-center">
                    <a type="button" class="btn btn-primary" href="/avaliacao/create">
                        <i class="fa fa-plus"></i> Cadastrar Avaliação
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
