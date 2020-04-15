@extends('adminlte::page')

@section('title', 'Ponto')

@section('content_header')
    <h1 class="m-0 text-dark">Cadastro de Ponto</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form role="form">
                    <div class="card-body">

                        <div class="form-group">
                            <label>Tipo</label>
                            <select class="form-control select2" style="width: 100%;">
                                <option selected="selected">Entrada</option>
                                <option>Saída</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Data</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="data">Data</label>
                            <input type="text" class="form-control" id="data" placeholder="DD/MM/AAAA">
                        </div>
                        <div class="form-group">
                            <label for="horario">Horário</label>
                            <input type="text" class="form-control" id="horario" placeholder="HH:MM">
                        </div>

                    </div>
                    <div class="card-footer text-center">
                        <a type="button" class="btn btn-default" href="/ponto">
                            <i class="fa fa-history"></i> Voltar
                        </a>
                        <a type="button" class="btn btn-primary" href="/ponto/store">
                            <i class="fa fa-save"></i> Salvar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery 3 -->
    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="../../plugins/input-mask/jquery.inputmask.js"></script>
    <script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
            //Money Euro
            $('[data-mask]').inputmask()
        })
    </script>
@stop
