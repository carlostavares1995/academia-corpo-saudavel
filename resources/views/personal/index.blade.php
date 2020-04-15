@extends('adminlte::page')

@section('title', 'Personal')

@section('content_header')
    <h1 class="m-0 text-dark">Listagem de Personais</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">__Listagem__</p>
                </div>
                <div class="card-footer text-center">
                    <a type="button" class="btn btn-primary" href="/personal/create">
                        <i class="fa fa-plus"></i> Cadastrar Personal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
