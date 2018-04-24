@extends('layout.layout')
@section('content')
    <div class="m-10 panel">
        <div class="pane-header">
            <h6>create</h6>
        </div>
        <div class="panel-body">
            {{ Form::open(['method'=>'POST','route' => ['info.store']]) }}
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group m-5 has-feedback">
                        {{ Form::label('last_name',ucfirst(trans('validation.attributes.last_name')),['class'=>'text-slate']) }}
                        {{ Form::text('last_name',old('last_name'),['id'=>'last_name','class'=>($errors->has('last_name')) ? 'form-control text-slate border-danger' : 'form-control text-slate border-slate','placeholder'=>ucfirst(trans('validation.attributes.last_name'))]) }}
                        @if($errors->has('last_name'))
                            <div class="form-control-feedback">
                                <i class="icon-cancel-circle2 text-danger"></i>
                            </div>
                            <span class="label label-block label-danger">{{ $errors->first('last_name') }}</span>
                        @else
                            <div class="form-control-feedback">
                                <i class="fas fa-user text-slate"></i>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group m-5 has-feedback">
                        {{ Form::label('first_name',ucfirst(trans('validation.attributes.first_name')),['class'=>'text-slate']) }}
                        {{ Form::text('first_name',old('first_name'),['id'=>'first_name','class'=>($errors->has('first_name')) ? 'form-control text-slate border-danger' : 'form-control text-slate border-slate','placeholder'=>ucfirst(trans('validation.attributes.first_name'))]) }}
                        @if($errors->has('last_name'))
                            <div class="form-control-feedback">
                                <i class="icon-cancel-circle2 text-danger"></i>
                            </div>
                            <span class="label label-block label-danger">{{ $errors->first('first_name') }}</span>
                        @else
                            <div class="form-control-feedback">
                                <i class="fas fa-user text-slate"></i>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="sex">{{ trans('validation.attributes.sex') }} :</label>

                    <div class="input-group">
                        <div class="input-group-addon {{ ($errors->has('sex')) ? 'border-danger' : 'border-slate' }}">
                            <i class="icon-people"></i>
                        </div>

                        <select class="bootstrap-select {{ ($errors->has('sex')) ? 'border-danger' : 'border-slate' }}"
                                id="sex"
                                name="sex"
                                data-width="100%">
                            <option value="">-----</option>
                            <option value="homme" {{ (old('sex') == 'homme') ? 'selected' : '' }}>Homme</option>
                            <option value="femme" {{ (old('sex') == 'femme') ? 'selected' : '' }}>Femme</option>
                        </select>
                        @if($errors->has('sex'))
                            <span class="label label-block label-danger">{{ $errors->first('sex') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group m-5 has-feedback">
                        {{ Form::label('dtn',ucfirst(trans('validation.attributes.dtn')) . ' * : ',['class'=>'text-slate']) }}
                        {{ Form::date('dtn',null,['id'=>'dtn','class'=>($errors->has('dtn')) ? 'form-control text-slate border-danger' : 'form-control text-slate border-slate','placeholder'=>ucfirst(trans('validation.attributes.dtn'))]) }}
                        @if($errors->has('dtn'))
                            <div class="form-control-feedback">
                                <i class="icon-cancel-circle2 text-danger"></i>
                            </div>
                            <span class="label label-block label-danger">{{ $errors->first('dtn') }}</span>
                        @else
                            <div class="form-control-feedback">
                                <i class=" icon-calendar text-slate"></i>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-xs-12">
                    <div class="form-group m-5 has-feedback">
                        {{ Form::label('tel',ucfirst(trans('validation.attributes.phone')) . ' : ',['class'=>'text-slate']) }}
                        {{ Form::tel('tel',null,['id'=>'tel','class'=>($errors->has('tel')) ? 'form-control text-slate border-danger' : 'form-control text-slate border-slate','placeholder'=>ucfirst(trans('validation.attributes.phone'))]) }}
                        @if($errors->has('tel'))
                            <div class="form-control-feedback">
                                <i class="icon-cancel-circle2 text-danger"></i>
                            </div>
                            <span class="label label-block label-danger">{{ $errors->first('tel') }}</span>
                        @else
                            <div class="form-control-feedback">
                                <i class="icon-phone-wave text-slate"></i>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group m-5 has-feedback">
                        {{ Form::label('address',ucfirst(trans('validation.attributes.address')) . ' : ',['class'=>'text-slate']) }}
                        {{ Form::text('address',null,['id'=>'address','class'=>($errors->has('address')) ? 'form-control text-slate border-danger' : 'form-control text-slate border-slate','placeholder'=>ucfirst(trans('validation.attributes.address'))]) }}
                        @if($errors->has('address'))
                            <div class="form-control-feedback">
                                <i class="icon-cancel-circle2 text-danger"></i>
                            </div>
                            <span class="label label-block label-danger">{{ $errors->first('address') }}</span>
                        @else
                            <div class="form-control-feedback">
                                <i class="icon-home5 text-slate"></i>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group m-5 has-feedback">
                        {{ Form::label('house_nbr',ucfirst(trans('validation.attributes.build')) . ' : ',['class'=>'text-slate']) }}
                        {{ Form::text('house_nbr',null,['id'=>'address','class'=>($errors->has('house_nbr')) ? 'form-control text-slate border-danger' : 'form-control text-slate border-slate','placeholder'=>ucfirst(trans('validation.attributes.build'))]) }}
                        @if($errors->has('house_nbr'))
                            <div class="form-control-feedback">
                                <i class="icon-cancel-circle2 text-danger"></i>
                            </div>
                            <span class="label label-block label-danger">{{ $errors->first('house_nbr') }}</span>
                        @else
                            <div class="form-control-feedback">
                                <i class="icon-office text-slate"></i>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group m-5 has-feedback">
                        {{ Form::label('city',ucfirst(trans('validation.attributes.city')) . ' : ',['class'=>'text-slate']) }}
                        {{ Form::text('city',null,['id'=>'city','class'=>($errors->has('city')) ? 'form-control text-slate border-danger' : 'form-control text-slate border-slate','placeholder'=>ucfirst(trans('validation.attributes.city'))]) }}
                        @if($errors->has('house_nbr'))
                            <div class="form-control-feedback">
                                <i class="icon-cancel-circle2 text-danger"></i>
                            </div>
                            <span class="label label-block label-danger">{{ $errors->first('city') }}</span>
                        @else
                            <div class="form-control-feedback">
                                <i class="icon-city text-slate"></i>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
            <div class="text-right mt-5">
                <button type="submit" class="btn btn-primary">
                    {{ucfirst(trans('pages.register.register'))}}<i class="icon-arrow-right14 position-right"></i>
                </button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@stop