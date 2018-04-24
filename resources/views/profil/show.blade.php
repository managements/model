@extends('layout.layout')
@section('content')
    <div class="m-10">

        <!-- user -->
        <div class="panel">
            <div class="panel-header">
                <h6>account</h6>
                    <a href="{{route('user.edit',$output->id)}}">edit</a>
            </div>
            <div class="panel-body">
                <div class="col-md-6">
                    <span>name : {{ $output->name }}</span>
                    <span>email : {{ $output->email }}</span>
                    <span>created_at : {{ $output->created_at }}</span>
                </div>
            </div>
        </div>
        <!-- info -->
        <div class="panel">
            <div class="panel-header">
                <h6>Info</h6>
                @if(!empty($output->info->created_at))
                    <a href="{{route('info.edit',['id'=>$output->id])}}">edit</a>
                    @else
                    <a href="{{route('info.create')}}">create</a>
                @endif
            </div>
            <div class="panel-body">
                @if(!empty($output->info->created_at))
                <span>full_name : {{ $output->info->last_name . ' ' . $output->info->first_name }}</span>
                <span>dtn : {{ $output->info->dtn }}</span>
                <span>sex : {{ $output->info->sex }}</span>
                <span>address : {{ $output->info->address }}</span>
                <span>house_nbr : {{ $output->info->house_nbr }}</span>
                <span>city : {{ $output->info->city }}</span>
                <span>tel : {{ $output->info->tel }}</span>
                @endif
            </div>
        </div>
        <!-- profil - cover -->
        <div class="panel">
            <div class="panel-header">
                <h6>media</h6>
            </div>
            <div class="panel-body">
                <span>profil : </span>
                <img src="{{asset((!empty($output->profil)) ? 'uploads/'.$output->profil : 'uploads/images/profil/profil.png')}}" alt="profil" class="img-lg">
                <span>cover : </span>
                <img src="{{asset((!empty($output->cover)) ? 'uploads/' . $output->cover : 'uploads/images/profil/profil.png')}}" alt="cover" class="img-lg">
            </div>
        </div>
        <!-- edit profil Media -->
        <div class="panel">
            <div class="panel-header">
                <h6>edit profil</h6>
            </div>
            <div class="panel-body">
                {{ Form::open(['method'=>'put','route'=> ['media.update',$output->id],'class'=>'form-horizontal','enctype'=>"multipart/form-data"]) }}
                {{ Form::label('profil','profil') }}
                {{ Form::file('profil') }}
                {{ Form::submit('update') }}
                {{ Form::close()}}
            </div>
        </div>
    </div>
        <!-- edit profil cover -->
        <div class="panel">
            <div class="panel-header">
                <h6>edit cover</h6>
            </div>
            <div class="panel-body">
                {{ Form::open(['method'=>'put','route'=> ['cover.update',$output->id],'class'=>'form-horizontal','enctype'=>"multipart/form-data"]) }}
                {{ Form::label('cover','cover:') }}
                {{ Form::file('cover') }}
                {{ Form::submit('update') }}
                {{ Form::close()}}
            </div>
        </div>
    </div>

@stop