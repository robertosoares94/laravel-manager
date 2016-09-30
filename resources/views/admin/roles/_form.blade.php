<div class="col-sm-6">
    <div class="form-group">
        {!! Form::label('name','Nome:') !!}
        {!! Form::text('name',null,['class'=>'form-control input-lg']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('display_name','Nome de exibição:') !!}
        {!! Form::text('display_name',null,['class'=>'form-control input-lg']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description','Descrição:') !!}
        {!! Form::textarea('description',null,['class'=>'form-control input-lg']) !!}
    </div>
</div>
<div class="col-sm-6">
    <div class="form-group">
        <strong>Permissões:</strong>
        @foreach($permission as $value)
            <div class="checkbox checkbox-replace">
                {{ Form::checkbox('permission[]', $value->id, (isset($rolePermissions) && in_array($value->id, $rolePermissions) ? true : false), array('id' => $value->id)) }}
                <label>{{ $value->display_name }}</label>
            </div>
        @endforeach
    </div>
</div>
