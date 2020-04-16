@extends('adminlte::page')

@section('title', 'Ponto')

@section('content_header')
    <h1 class="m-0 text-dark">{{ isset($data) ? 'Edição de Ponto' : 'Cadastro de Ponto' }}</h1>
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
                                    <label>Buscar Usuário Ponto</label>
                                    <select name="fisica_id" class="form-control select2" style="width: 100%;">
                                        {{$fisica_id = $data->fisica_id ?? ''}}
                                        <option value=''>Selecione</option>
                                        @foreach($fisicas as $fisica)
                                            <option {{$fisica->id == $fisica_id ? 'selected' : '' }}
                                                    value='{{$fisica->id}}'>Nome: {{$fisica->nome}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tipo Ponto</label>
                                    <select name="tipo" class="form-control select2" style="width: 100%;">
                                        {{$tipo = $data->tipo ?? ''}}
                                        <option {{$tipo == 'Entrada' ? 'selected' : '' }} value='Entrada'>Entrada</option>
                                        <option {{$tipo == 'Saida' ? 'selected' : '' }} value='Saida'>Saída </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Data Ponto</label>
                                    <input name="data" type="text" class="mask-data form-control" placeholder="DD/MM/AAAA"
                                           value="{{ isset($data->data_hora) ? substr($data->data_hora, 0, -6) : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Horário Ponto</label>
                                    <input name="hora" type="text" class="mask-hora form-control" placeholder="HH:MM"
                                           value="{{ isset($data->data_hora) ? substr($data->data_hora, -5) : '' }}">
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
