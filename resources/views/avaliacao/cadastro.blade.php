@extends('adminlte::page')

@section('title', 'Avaliação')

@section('content_header')
    <h1 class="m-0 text-dark">{{ isset($data) ? 'Edição de Avaliação' : 'Cadastro de Avaliação' }}</h1>
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
                                    <label>Buscar Aluno Avaliação</label>
                                    <select name="aluno_id" class="form-control select2" style="width: 100%;">
                                        {{$aluno_id = $data->aluno_id ?? ''}}
                                        <option value=''>Selecione</option>
                                        @foreach($alunos as $aluno)
                                            <option {{$aluno->id == $aluno_id ? 'selected' : '' }}
                                                    value='{{$aluno->id}}'>Matrícula: {{$aluno->matricula}} -- Nome: {{$aluno->nome}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Altura</label>
                                    <input name="altura" type="number" class="form-control" placeholder="Digite a Altura"
                                           value="{{ $data->altura ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Peso</label>
                                    <input name="peso" type="number" class="form-control" placeholder="Digite o peso"
                                           value="{{ $data->peso ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>IMC</label>
                                    <input name="imc" type="number" class="form-control" placeholder="Digite o IMC"
                                           value="{{ $data->imc ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Braço Relaxado</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input name="braco_relaxado_esq" type="number" class="form-control" placeholder="CM Esquerdo"
                                                   value="{{ $data->braco_relaxado_esq ?? '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <input name="braco_relaxado_dir" type="number" class="form-control" placeholder="CM Direito"
                                                   value="{{ $data->braco_relaxado_dir ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Braço Contraído</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input name="braco_contraido_esq" type="number" class="form-control" placeholder="CM Esquerdo"
                                                   value="{{ $data->braco_contraido_esq ?? '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <input name="braco_contraido_dir" type="number" class="form-control" placeholder="CM Direito"
                                                   value="{{ $data->braco_contraido_dir ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Antebraço</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input name="antebraco_esq" type="number" class="form-control" placeholder="CM Esquerdo"
                                                   value="{{ $data->antebraco_esq ?? '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <input name="antebraco_dir" type="number" class="form-control" placeholder="CM Direito"
                                                   value="{{ $data->antebraco_dir ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Coxa</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input name="coxa_esq" type="number" class="form-control" placeholder="CM Esquerdo"
                                                   value="{{ $data->coxa_esq ?? '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <input name="coxa_dir" type="number" class="form-control" placeholder="CM Direito"
                                                   value="{{ $data->coxa_dir ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Panturrilha</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input name="panturrilha_esq" type="number" class="form-control" placeholder="CM Esquerdo"
                                                   value="{{ $data->panturrilha_esq ?? '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <input name="panturrilha_dir" type="number" class="form-control" placeholder="CM Direito"
                                                   value="{{ $data->panturrilha_dir ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Torax</label>
                                    <input name="torax" type="number" class="form-control" placeholder="Digite o Centímetro"
                                           value="{{ $data->torax ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Ombro</label>
                                    <input name="ombro" type="number" class="form-control" placeholder="Digite o Centímetro"
                                           value="{{ $data->ombro ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Cintura</label>
                                    <input name="cintura" type="number" class="form-control" placeholder="Digite o Centímetro"
                                           value="{{ $data->cintura ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Quadril</label>
                                    <input name="quadril" type="number" class="form-control" placeholder="Digite o Centímetro"
                                           value="{{ $data->quadril ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Gordura %</label>
                                    <input name="gordura" type="number" class="form-control" placeholder="Digite a Porcentagem"
                                           value="{{ $data->gordura ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Massa Magra %</label>
                                    <input name="massa_magra" type="number" class="form-control" placeholder="Digite a Porcentagem"
                                           value="{{ $data->massa_magra ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Data Avaliação</label>
                                    <input name="data_avaliacao" type="text" class="mask-data form-control" placeholder="DD/MM/AAAA"
                                           value="{{ $data->data_avaliacao ?? '' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a type="button" class="btn btn-default" href="/avaliacao">
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
        });

        $(function () {
            $('.select2').select2();
        });
    </script>
@stop

