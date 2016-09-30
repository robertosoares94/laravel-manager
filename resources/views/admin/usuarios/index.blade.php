@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <h3>Usuarios</h3>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{route('admin.usuarios.create')}}" class="btn btn-green btn-icon icon-left">Cadastrar<i class="entypo-plus"></i></a>
                </div>
            </div>
            <br/>
            <table class="table table-bordered responsive">
                <thead>
                <tr>
                    <th width="10%">ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Permissões</th>
                    <th width="25%">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->id}}</td>
                        <td>{{$usuario->nome}}</td>
                        <td>{{$usuario->email}}</td>
                        <td>
                            @if(!empty($usuario->roles))
                                @foreach($usuario->roles as $v)
                                    <label class="label label-success">{{ $v->name }}</label>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            @permission('usuario-edit')
                            <a href="{{ route('admin.usuarios.edit', $usuario->id) }}" class="btn btn-default btn-sm btn-icon icon-left">
                                <i class="entypo-pencil"></i>
                                Editar
                            </a>
                            @endpermission
                            @permission('usuario-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['admin.usuarios.destroy', $usuario->id],'class'=>'delete form-inline']) !!}
                            <button type="submit" class="btn btn-danger btn-sm btn-icon icon-left">
                                <i class="entypo-cancel"></i>
                                Excluir
                            </button>
                            {!! Form::close() !!}
                            @endpermission
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$usuarios->render()}}
        </div>
    </div>
@endsection