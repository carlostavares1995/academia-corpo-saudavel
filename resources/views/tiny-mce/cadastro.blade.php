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
                                    <textarea id="mytextarea" name="content">
                                        {{ $data->content ?? 'Hello, World!' }}
                                    </textarea>
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
    <script src="https://cdn.tiny.cloud/1/nudfsr4edvx6xlc4lxxco4d6ktl9u7sspog2bajhyey523y8/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea',
            toolbar: "image,paste",
            plugins: "image,paste",
            menubar: "insert,edit",
            paste_data_images: true,
        });
    </script>
@stop
