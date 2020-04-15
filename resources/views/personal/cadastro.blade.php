@extends('adminlte::page')

@section('title', 'Personal')

@section('content_header')
    <h1 class="m-0 text-dark">Cadastro de Personal</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form id="form_ponto" role="form" method="POST" action="{{route('personal.store')}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{isset($id) ? $id : ""}}"/>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CPF</label>
                                    <input name="cpf" type="text" class="mask-cpf form-control" placeholder="Digite o CPF">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>RG</label>
                                    <input name="rg" type="text" class="form-control" placeholder="Digite o RG">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input name="nome" type="text" class="form-control" placeholder="Digite o Nome">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input name="email" type="text" class="form-control" placeholder="Digite o E-mail">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Data Nascimento</label>
                                    <input name="data_nascimento" type="text" class="mask-data form-control" placeholder="DD/MM/AAAA">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Sexo</label>
                                    <select name="sexo" class="form-control select2" style="width: 100%;">
                                        <option selected="selected">Masculino</option>
                                        <option>Feminino</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CEP</label>
                                    <input name="cep" type="text" class="mask-cep form-control" placeholder="Digite o Cep">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Estado</label>
                                    <select name="estado" class="form-control select2" style="width: 100%;">
                                        @if(isset($endereco))
                                            @include('estados', ['estado' => $endereco->estado])
                                        @endif
                                        @include('estados', ['estado' => ''])
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Cidade</label>
                                    <input name="cidade" type="text" class="form-control" placeholder="Digite a Cidade">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Bairro</label>
                                    <input name="bairro" type="text" class="form-control" placeholder="Digite o Bairro">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Logradouro</label>
                                    <input name="logradouro" type="text" class="form-control" placeholder="Digite o Logradouro">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Número</label>
                                    <input name="numero" type="text" class="form-control" placeholder="Digite o Número">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Data Admissão</label>
                                    <input name="data_admissao" type="text" class="mask-data form-control" placeholder="DD/MM/AAAA">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Salário</label>
                                    <input name="salario" type="text" class="form-control" placeholder="Digite o Salário">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a type="button" class="btn btn-default" href="/personal">
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
            $('.mask-cpf').inputmask("999.999.999-99");
            $('.mask-data').inputmask("99/99/9999");
            $('.mask-cep').inputmask("99999-999");
        });

        $(function () {
            $('.select2').select2();
        });
    </script>
@stop
