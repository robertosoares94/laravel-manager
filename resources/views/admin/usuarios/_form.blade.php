<div class="col-md-6">
    <div class="form-group">
        <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-new thumbnail" style="height: 150px;" data-trigger="fileinput">
                <img src="{{ ($usuario->foto?'/media/usuarios/'.$usuario->foto:'http://placehold.it/200x150') }}" >
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
        {!! Form::text('nome',null,['class'=>'form-control input-lg']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email','E-mail:') !!}
        {!! Form::text('email',null,['class'=>'form-control input-lg']) !!}
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
<div class="col-md-6">
    <div class="form-group">
        <strong>Permissões:</strong>
        @foreach($roles as $role)
            <div class="checkbox checkbox-replace">
                {{ Form::checkbox('roles[]', $role->id, (isset($userRole) && in_array($role->id, $userRole) ? true : false), array('id' => $role->id)) }}
                <label>{{ $role->name }}</label>
            </div>
        @endforeach
    </div>
</div>