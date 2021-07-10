@extends($layout)


@section('custom_div')

@if (isset($record) && count($record))
<div ng-controller="auctionsController" ng-init="initFunctions()">
    @else
    <div ng-controller="auctionsController">
        @endif

        @stop


        @section('content')

        @include('bidder.leftmenu')

        <!--Dashboard section -->


        <div class="col-lg-9 col-md-8 col-sm-12 au-onboard">
            <a href="{{URL_HOME}}" class="au-middles justify-content-start"> {{getPhrase('home')}} &nbsp;<span> / {{getPhrase('profile')}} </span></a>

            <div class="au-left-side form-auth-style">


                {{ Form::model($record, 
				array('url' => 'users/business/edit/'.$record->slug, 
				'method'=>'PATCH', 'name'=>'formValidate', 'files'=>'true' , 'novalidate'=>'')) }}

                <div class="row">
                    <div class="col-lg-12">
                        <?php
                        $val = old('id');
                        if ($record)
                            echo "<h3>Client ID: &nbsp;" . $val = $record->id . "<h3>";
                        ?>
                    </div>
                    <div class="col-lg-12">


                        <div class="form-group">

                            {!! Form::label('industry_type', getPhrase('Industry Type'), ['class' => 'control-label']) !!}

                            <span class="text-red">*</span>

                            <?php
                            $val = old('industry_type_id');
                            if ($record)
                                $val = $record->industry_type_id;

                            ?>

                            {{Form::select('industry_type_id', $industries, $val, ['placeholder' => getPhrase('select_industry'),'class'=>'form-control select2',

                                'ng-model'=>'industry_type_id',

                                'required'=> 'true',

                                'ng-init'=>'industry_type_id="'.$val.'"',

                                'ng-change'=>'getStates(industry_type_id)', 

                                'ng-class'=>'{"has-error": formValidate.industry_type_id.$touched && formValidate.industry_type_id.$invalid}'

                            ])}}



                            <div class="validation-error" ng-messages="formValidate.industry_type_id.$error">

                                {!! getValidationMessage()!!}

                            </div>

                        </div>

                        <div class="form-group">
                            {!! Form::label('product', getPhrase('product'), ['class' => 'control-label']) !!}

                            <span class="text-red"></span>

                            <?php
                            $val = old('product');
                            if ($record)
                                $val = $record->product;
                            ?>

                            {{ Form::text('product', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Product / Service',

                    'ng-model' => 'product', 

                    'ng-init'=>'product="'.$val.'"',

					'ng-class'=>'{"has-error": formValidate.product.$touched && formValidate.product.$invalid}',



                    )) }}



                            <div class="validation-error" ng-messages="formValidate.product.$error">

                                {!! getValidationMessage()!!}

                            </div>

                        </div>

                        <div class="form-group">

                            <div class="row">

                                <div class="col-md-6">

                                    {!! Form::label('nid_or_passport', getPhrase('nid_or_passport'), ['class' => 'control-label']) !!}

                                    {!! Form::file('nid_passport', array('id'=>'image_input', 'accept'=>'.png,.jpg,.jpeg')) !!}

                                </div>

                               

                                        <div class="col-md-6">
                                        <?php if (isset($record) && $record) {

                                            if ($record->nid_passport != '') {

                                                ?>
                                        <img width="300" src="/public/uploads/users/{{$record->nid_passport}}" style="border: 5px solid #ddd;padding: 7px;"/>
                                        
                                        <?php }
                                            } ?>
                                        </div>

                               
                            </div>

                        </div>

                        

                        <div class="form-group">

                            <div class="row">

                                <div class="col-md-6">

                                    {!! Form::label('trade', getPhrase('trade licence &nbsp; &nbsp; &nbsp; &nbsp;'), ['class' => 'control-label']) !!}

                                    {!! Form::file('trade_license', array('id'=>'image_input', 'accept'=>'.png,.jpg,.jpeg')) !!}

                                </div>


                            
                          

                                    <div class="col-md-6">
                                    <?php if (isset($record) && $record) {

                                            if ($record->trade_license != '') {

                                            ?>
                                   
                                        <img width="300" src="/public/uploads/users/{{$record->trade_license}}" style="border: 5px solid #ddd;padding: 7px;"/>
                                        <?php }
                                        } ?>
                                    </div>

                                    </div>       
                        </div>

                        <div class="form-group">

                            <div class="row">

                                <div class="col-md-6">

                                    {!! Form::label('tin', getPhrase(' tin certificate &nbsp; &nbsp; &nbsp;'), ['class' => 'control-label']) !!}

                                    {!! Form::file('tin', array('id'=>'image_input', 'accept'=>'.png,.jpg,.jpeg')) !!}

                                </div>

                                

                                        <div class="col-md-6">
                                        <?php if (isset($record) && $record) {

                                        if ($record->tin != '') {

                                        ?>
                                            <img width="300" src="/public/uploads/users/{{$record->tin}}" style="border: 5px solid #ddd;padding: 7px;" />
                                            <?php }
                                          } ?>
                                        </div>

                               
                            </div>

                        </div>

                        @if(checkRole(['partnership']))
                        <div class="form-group">
                            {!! Form::label('nid_passport2', getPhrase('NID/Passport 2'), ['class' => 'control-label']) !!}

                            <span class="text-red">*</span>

                            <?php
                            $val = old('nid_passport2');
                            if ($record)
                                $val = $record->nid_passport2;
                            ?>

                            {{ Form::text('nid_passport2', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'NID / Passport - 2',

                    'ng-model' => 'nid_passport2', 

                    'ng-init'=>'nid_passport2="'.$val.'"',

					'ng-class'=>'{"has-error": formValidate.nid_passport2.$touched && formValidate.nid_passport2.$invalid}',



                    )) }}



                            <div class="validation-error" ng-messages="formValidate.nid_passport2.$error">

                                {!! getValidationMessage()!!}

                            </div>

                        </div>

                        @endif



                        @if(checkRole(['partnership']) || checkRole(['company']) || checkRole(['single_owner_business']) )
                        <div class="form-group">
                            {!! Form::label('bin', getPhrase('bin'), ['class' => 'control-label']) !!}

                            <span class="text-red">*</span>

                            <?php
                            $val = old('bin');
                            if ($record)
                                $val = $record->bin;
                            ?>

                            {{ Form::text('bin', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'BIN',

                    'ng-model' => 'bin', 

                    'ng-init'=>'bin="'.$val.'"',

					'ng-class'=>'{"has-error": formValidate.bin.$touched && formValidate.bin.$invalid}',



                    )) }}



                            <div class="validation-error" ng-messages="formValidate.bin.$error">

                                {!! getValidationMessage()!!}

                            </div>

                        </div>

                        <div class="form-group">
                            {!! Form::label('contact_person', getPhrase('Contact Person'), ['class' => 'control-label']) !!}

                            <span class="text-red">*</span>

                            <?php
                            $val = old('contact_person');
                            if ($record)
                                $val = $record->contact_person;
                            ?>

                            {{ Form::text('contact_person', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Contact Person',

                    'ng-model' => 'contact_person', 

                    'required' => 'true',

                    'ng-init'=>'contact_person="'.$val.'"',

					'ng-class'=>'{"has-error": formValidate.contact_person.$touched && formValidate.contact_person.$invalid}',



                    )) }}



                            <div class="validation-error" ng-messages="formValidate.contact_person.$error">

                                {!! getValidationMessage()!!}

                            </div>

                        </div>
                        @endif




                        <div class="form-group">

                            <button class="btn btn-primary login-bttn" ng-disabled='!formValidate.$valid'>{{ getPhrase('save') }}</button>

                        </div>



                    </div>



                </div>

                {!! Form::close() !!}

            </div>
        </div>




    </div>
</div>
</section>
<!--Dashboard section-->

@endsection



@section('footer_scripts')
@include('common.validations')
@include('common.alertify')

@include('home.pages.auctions.auctions-js-script')

<script>
    var file = document.getElementById('image_input');

    file.onchange = function(e) {
        var ext = this.value.match(/\.([^\.]+)$/)[1];
        switch (ext) {
            case 'jpg':
            case 'jpeg':
            case 'png':

                break;
            default:
                alertify.error("{{getPhrase('file_type_not_allowed')}}");
                this.value = '';
        }
    };
</script>

@stop