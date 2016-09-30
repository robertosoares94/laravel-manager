@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        Editar usuario
                    </div>
                </div>
                <div class="panel-body">
                    {{Form::model($usuario,['route'=>['admin.usuarios.update',$usuario->id],'method' => 'put','class' =>'form-horizontal form-groups-bordered', 'files' => true])}}
                    @include('admin.usuarios._form')
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