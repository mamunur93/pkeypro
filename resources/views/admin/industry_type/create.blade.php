@extends('layouts.app')

@section('content')
    <h3 class="page-title"> {{$title}} </h3>

    {!! Form::open(array('url' => URL_INDUSTRY_TYPE_ADD, 'method' => 'POST','name'=>'formValidate', 'novalidate'=>'')) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            {{getPhrase('create')}}
        </div>
        

        <div class="panel-body form-auth-style">
         
        <div class="row">

            <div class="col-xs-6">  

           
                <div class="form-group">

                    {!! Form::label('title', getPhrase('title'), ['class' => 'control-label']) !!}

                     <span class="text-red">*</span>

                     {{ Form::text('title', old('title'), $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Title',

                    'ng-model' => 'title', 

                    'required' => 'true',

                    'ng-minlength' => '2',

                    'ng-class'=>'{"has-error": formValidate.title.$touched && formValidate.title.$invalid}',

                    )) }}

                    <div class="validation-error" ng-messages="formValidate.title.$error" >

                            {!! getValidationMessage()!!}

                            {!! getValidationMessage('minlength')!!}

                    </div>
                   
                </div>

                 <div class="form-group pull-right">

                    <button class="btn btn-success" ng-disabled='!formValidate.$valid'>{{ getPhrase('save') }}</button>

                </div>

            </div>

            </div>
            
        </div>

    </div>

   
    {!! Form::close() !!}

@stop



@section('footer_scripts')
@include('common.validations')
@include('common.alertify')


<script src="{{PREFIX1}}ckeditor/ckeditor.js"></script>
<script src="{{PREFIX1}}ckeditor/adapters/jquery.js"></script>


 <script>
        CKEDITOR.replace( 'message' );
        $("form").submit( function(e) {
            var messageLength = CKEDITOR.instances['message'].getData().replace(/<[^>]*>/gi, '').length;
            if( !messageLength ) {
                // alert( 'Please enter message' );
                alertify.error('Please enter message');
                e.preventDefault();
            }
        });
    </script>
@stop