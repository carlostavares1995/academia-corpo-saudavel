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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Tipo Relatório</label>
                                <select name="tipo_relatorio" class="form-control select2" style="width: 100%;">
                                    <option value=''>Selecione</option>
                                    <option value='Alunos Matriculados'>Alunos Matriculados</option>
                                    <option value='Personal Cadastrados'>Personal Cadastrados </option>
                                    <option value='Avaliações Cadastradas'>Avaliações Cadastradas </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Data Início</label>
                                <input name="data_inicio" type="text" class="mask-data form-control" placeholder="DD/MM/AAAA"
                                       value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Data Fim</label>
                                <input name="data_fim" type="text" class="mask-data form-control" placeholder="DD/MM/AAAA"
                                       value="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="button" class="gerar btn btn-primary">
                        <i class="fa fa-plus"></i> Gerar Relatório
                    </button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('.mask-data').inputmask("99/99/9999");
        });

        $(function () {
            $('.select2').select2();

            $(document).on('click', '.gerar', function() {
                Swal.fire("Relatório gerado com sucesso!", "", "success");
            });
        });
    </script>
@stop
