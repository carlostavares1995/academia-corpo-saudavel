@extends('adminlte::page')

@section('title', 'Tiny MCE')

@section('content_header')
    <h1 class="m-0 text-dark">{{ isset($data) ? 'Edição de Tiny MCE' : 'Cadastro de Tiny MCE' }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form id="form_primary" role="form" method="POST" action="{{$rota}}">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Data Ponto</label>
                                    <input name="data" type="text" class="mask-data form-control" placeholder="DD/MM/AAAA"
                                           value="{{ isset($data->data_hora) ? substr($data->data_hora, 0, -6) : '' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a type="button" class="btn btn-default" href="/tiny-mce">
                            <i class="fa fa-history"></i> Voltar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> Salvar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('.mask-data').inputmask("99/99/9999");
            $('.mask-hora').inputmask("99:99");
        });
    </script>
@stop
