@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        Editar Perfil
                    </div>
                </div>
                <div class="panel-body">
                    {{ Form::open(['route' => 'admin.profile.update','method' => 'post','class' =>'form-horizontal form-groups-bordered', 'files' => true])}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
                                    <img src="http://placehold.it/200x150" >
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                <div>
                                <span class="btn btn-white btn-file">
                                <span class="fileinput-new">Selecionar imagem</span>
                                 <span class="fileinput-exists">Alterar</span>
                                 <input type="file" name="foto" accept="image/*">
                                </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remover</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" >
                            {!! Form::label('nome','Nome:') !!}
                            {!! Form::text('nome',Auth::user()->nome,['class'=>'form-control input-lg']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email','E-mail:') !!}
                            {!! Form::text('email',Auth::user()->email,['class'=>'form-control input-lg']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password','Senha:') !!}
                            {!! Form::password('password',['class'=>'form-control input-lg']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password_confirmation','Confirmar senha:') !!}
                            {!! Form::password('password_confirmation',['class'=>'form-control input-lg']) !!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-lg">Alterar</button>
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@endsection