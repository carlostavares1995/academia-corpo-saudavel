@extends('adminlte::page')

@section('title', 'Ponto')

@section('content_header')
    <h1 class="m-0 text-dark">Cadastro de Ponto</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form id="form_ponto" role="form" method="POST" action="{{route('ponto.store')}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{isset($id) ? $id : ""}}"/>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tipo</label>
                                    <select name="tipo" class="form-control select2" style="width: 100%;">
                                        <option selected="selected">Entrada</option>
                                        <option>Saída</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Data</label>
                                    <input name="data" type="text" class="mask-data form-control" placeholder="DD/MM/AAAA">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Horário</label>
                                    <input name="hora" type="text" class="mask-hora form-control" placeholder="HH:MM">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a type="button" class="btn btn-default" href="/ponto">
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

        $(function () {
            $('.select2').select2();
        });
    </script>
@stop
