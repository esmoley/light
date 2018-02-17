{!! Form::open(['action' => '_con\MainController@store', 'method' => 'post']) !!}
<div class="form-group">
    {{Form::label('username_connect','*username_connect')}}
    {{Form::text('username_connect','',['class'=>'form-control','placeholder' => 'username_connect'])}}
</div>
<div class="form-group">
    {{Form::label('password_connect','*password_connect')}}
    {{Form::text('password_connect','',['class'=>'form-control','placeholder' => 'password_connect'])}}
</div>
<div class="form-group">
    {{Form::label('pc_name','*pc_name')}}
    {{Form::text('pc_name','',['class'=>'form-control','placeholder' => 'pc_name'])}}
</div>
<div class="form-group">
    {{Form::label('mac','*mac')}}
    {{Form::text('mac','',['class'=>'form-control','placeholder' => 'mac'])}}
</div>
<div class="form-group">
    {{Form::label('status','*status')}}
    {{Form::text('status','',['class'=>'form-control','placeholder' => 'status'])}}
</div>

{{Form::submit('Submit',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}