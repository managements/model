@extends('layout.layout')
@section('content')
        <div class="panel m-10">
            <div class="panel-header">
                <h6 class="text-center">info</h6>
            </div>
            {{ Form::model($user, [
                    'route'     => ['user.update', $user],
                    'method'    => 'PUT',
                    'class'     => 'form-horizontal'
                    ]) }}
            <div class="panel-body">
                    <div class="form-group">
                        {{ Form::label('name','name : ') }}
                        {{ Form::text('name',null,['class'=>'form-control']) }}
                        @if($errors->has('name')) {{ $errors->first('name') }}@endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('email','email : ') }}
                        {{ Form::email('email',null,['class'=>'form-control']) }}
                        @if($errors->has('email')) {{ $errors->first('email') }}@endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('old_password','old_password : ') }}
                        {{ Form::password('old_password',['class'=>'form-control']) }}
                        @if($errors->has('old_password')) {{ $errors->first('old_password') }}@endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('password','password : ') }}
                        {{ Form::password('password',['class'=>'form-control']) }}
                        @if($errors->has('password')) {{ $errors->first('password') }}@endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('password_confirmation','password_confirmation : ') }}
                        {{ Form::password('password_confirmation',['class'=>'form-control']) }}
                        @if($errors->has('password_confirmation')) {{ $errors->first('password_confirmation') }}@endif
                    </div>
                    <div class="form-group">
                        <select name="question" id="question-select" class="form-control {{$errors->has('question') ? 'border-danger':''}}" >
                            <option value="">{{trans('pages.recover_sq.auto-choix')}}</option>
                            @foreach($questions as $question)
                                <option value="{{$question->id}}" {!!  old('question') == $question->id ? 'selected' : ($user->recover->question_secrete_id == $question->id) ? 'selected' : '' !!} >{{$question->question}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('question'))
                            <div class="form-control-feedback">
                                <i class="icon-cancel-circle2 text-danger-300"></i>
                            </div>
                            <span class="label label-block mt-5 label-danger">
                                {{$errors->first('question')}}
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="text" name="response"
                               id="response" class="form-control {{ $errors->has('response') ? 'border-danger':'' }}"
                               value="{!! old('response') ? old('response') : $user->recover->response!!}"
                               placeholder="{{trans('pages.recover_sq.placeholder')}}"
                        >
                        @if($errors->has('response'))
                            <div class="form-control-feedback">
                                <i class="icon-cancel-circle2 text-danger-300"></i>
                            </div>
                            <span class="label label-block mt-5 label-danger">
                                {{$errors->first('response')}}
                            </span>
                        @endif
                    </div>
            </div>
            <div class="panel-footer">
                <div class="form-group ">
                    {{ Form::submit('submit',['class'=>'btn bnt-primary']) }}
                </div>
            </div>

            {{ Form::close() }}
        </div>
@stop