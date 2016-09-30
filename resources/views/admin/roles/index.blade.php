@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <h3>Gerenciamento de funções</h3>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{route('admin.roles.create')}}" class="btn btn-green btn-icon icon-left">Cadastrar<i class="entypo-plus"></i></a>
                </div>
            </div>
            <br/>
            <table class="table table-bordered responsive">
                <thead>
                <tr>
                    <th width="10%">ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th width="25%">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles  as $role)
                    <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name }}</td>
                        <td>{{$role->description }}</td>
                        <td>
                            @permission('role-edit')
                            <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-default btn-sm btn-icon icon-left">
                                <i class="entypo-pencil"></i>
                                Editar
                            </a>
                            @endpermission
                            @permission('role-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['admin.roles.destroy', $role->id],'class'=>'delete form-inline']) !!}
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
            {{$roles->render()}}
        </div>
    </div>
@endsection