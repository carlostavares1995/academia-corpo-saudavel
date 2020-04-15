@extends('adminlte::page')

@section('title', 'Relatório')

@section('content_header')
    <h1 class="m-0 text-dark">Relatórios</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">__Form_Relatório__</p>
                </div>
                <div class="card-footer text-center">
                    <a type="button" class="btn btn-primary" href="/relatorio/gerar">
                        <i class="fa fa-plus"></i> Gerar Relatório
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
