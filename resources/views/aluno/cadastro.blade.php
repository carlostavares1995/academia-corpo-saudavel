@extends('adminlte::page')

@section('title', 'Aluno')

@section('content_header')
    <h1 class="m-0 text-dark">{{ isset($data) ? 'Edição de Aluno' : 'Cadastro de Aluno' }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form id="form_primary" role="form" method="POST" action="{{$rota}}">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CPF</label>
                                    <input name="cpf" type="text" class="mask-cpf form-control" placeholder="Digite o CPF"
                                           value="{{ $data->fisica->cpf ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>RG</label>
                                    <input name="rg" type="text" class="form-control" placeholder="Digite o RG"
                                           value="{{ $data->fisica->rg ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input name="nome" type="text" class="form-control" placeholder="Digite o Nome"
                                           value="{{ $data->fisica->nome ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input name="email" type="text" class="form-control" placeholder="Digite o E-mail"
                                           value="{{ $data->fisica->email ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Data Nascimento</label>
                                    <input name="data_nascimento" type="text" class="mask-data form-control" placeholder="DD/MM/AAAA"
                                           value="{{ $data->fisica->data_nascimento ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Sexo</label>
                                    <select name="sexo" class="form-control select2" style="width: 100%;">
                                        {{$sexoAtual = $data->fisica->sexo ?? ''}}
                                        <option {{$sexoAtual == 'Masculino' ? 'selected' : '' }} value='Masculino'>Masculino</option>
                                        <option {{$sexoAtual == 'Feminino' ? 'selected' : '' }} value='Feminino'>Feminino </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CEP</label>
                                    <input name="cep" type="text" class="mask-cep form-control" placeholder="Digite o Cep"
                                           value="{{ $data->fisica->endereco->cep ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Estado</label>
                                    <select name="estado" class="form-control select2" style="width: 100%;">
                                        @include('estados', ['estado' => $data->fisica->endereco->estado ?? ''])
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Cidade</label>
                                    <input name="cidade" type="text" class="form-control" placeholder="Digite a Cidade"
                                           value="{{ $data->fisica->endereco->cidade ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Bairro</label>
                                    <input name="bairro" type="text" class="form-control" placeholder="Digite o Bairro"
                                           value="{{ $data->fisica->endereco->bairro ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Logradouro</label>
                                    <input name="logradouro" type="text" class="form-control" placeholder="Digite o Logradouro"
                                           value="{{ $data->fisica->endereco->logradouro ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Número</label>
                                    <input name="numero" type="text" class="form-control" placeholder="Digite o Número"
                                           value="{{ $data->fisica->endereco->numero ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tipo Plano</label>
                                    <select name="plano" class="form-control select2" style="width: 100%;">
                                        {{$plano = $data->plano ?? ''}}
                                        <option {{$plano == 'Anual' ? 'selected' : '' }} value='Anual'>Anual</option>
                                        <option {{$plano == 'Mensal' ? 'selected' : '' }} value='Mensal'>Mensal </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Forma Pagamento</label>
                                    <select name="pagamento" class="form-control select2" style="width: 100%;">
                                        {{$pagamento = $data->pagamento ?? ''}}
                                        <option {{$pagamento == 'A vista' ? 'selected' : '' }} value='A vista'>A vista</option>
                                        <option {{$pagamento == 'Parcelado' ? 'selected' : '' }} value='Parcelado'>Parcelado </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Valor</label>
                                    <input name="valor" type="text" class="form-control" placeholder="Digite o Valor"
                                           value="{{ $data->valor ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Início Contrato</label>
                                    <input name="inicio_contrato" type="text" class="mask-data form-control" placeholder="DD/MM/AAAA"
                                           value="{{ $data->inicio_contrato ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Termino Contrato</label>
                                    <input name="termino_contrato" type="text" class="mask-data form-control" placeholder="DD/MM/AAAA"
                                           value="{{ $data->termino_contrato ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Matrícula</label>
                                    <input name="matricula" type="text" class="form-control" placeholder="Digite a Matrícula"
                                           value="{{ $data->matricula ?? '' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a type="button" class="btn btn-default" href="/aluno">
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
