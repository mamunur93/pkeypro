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
				array('url' => URL_USERS_EDIT.'/'.$record->slug, 
				'method'=>'PATCH', 'name'=>'formValidate', 'files'=>'true' , 'novalidate'=>'')) }}

                <div class="row">
                    <div class="col-lg-12">
                        <?php
                        $val=old('id');
                        if ($record)
                         echo "<h3>Client ID: &nbsp;". $val = $record->id."<h3>";     
                    ?>
                    </div>
                	<div class="col-lg-6">

                	<div class="form-group">
                    {!! Form::label('name', getPhrase('name'), ['class' => 'control-label']) !!}

                    <span class="text-red">*</span>

                    <?php
                        $val=old('name');
                        if ($record)
                         $val = $record->name;     
                    ?>

                    {{ Form::text('name', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Name',

                    'ng-model' => 'name', 

                    'required' => 'true',

                    'ng-pattern' => getRegexPattern("name"),

					'ng-minlength' => '2',

					'ng-maxlength' => '100',

                    'ng-init'=>'name="'.$val.'"',

					'ng-class'=>'{"has-error": formValidate.name.$touched && formValidate.name.$invalid}',

                    )) }}


                    <div class="validation-error" ng-messages="formValidate.name.$error" >

	    					{!! getValidationMessage()!!}

	    					{!! getValidationMessage('minlength')!!}

	    					{!! getValidationMessage('maxlength')!!}

	    					{!! getValidationMessage('pattern')!!}

					</div>
                </div>

                <div class="form-group">

                    {!! Form::label('business_telephone', getPhrase('business_telephone'), ['class' => 'control-label']) !!}

                    <span class="text-red">*</span>

                    <?php
                        $val=old('business_telephone');
                        if ($record)
                         $val = $record->business_telephone;     
                    ?>

                    {{ Form::text('business_telephone', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'business telephone',

                    'ng-model' => 'business_telephone', 
                    
                    'ng-init'=>'business_telephone="'.$val.'"',

                    'ng-class'=>'{"has-error": formValidate.business_telephone.$touched && formValidate.business_telephone.$invalid}',



                    )) }}


                    
                    <div class="validation-error" ng-messages="formValidate.business_telephone.$error" >

                            {!! getValidationMessage('business_telephone')!!}

                    </div>

                </div> 



                 <div class="form-group">

                    <?php 

                    $readonly = '';
                    $val=old('email');
                    if ($record) {
                        $readonly = 'readonly="true"';
                        $val = $record->email;
                    }



                    ?>

                    {!! Form::label('email', getPhrase('email'), ['class' => 'control-label']) !!}

                    <span class="text-red">*</span>

                    {{ Form::email('email', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Email',

                    'ng-model' => 'email', 

                    'required' => 'true',

                    $readonly,

                    'ng-init'=>'email="'.$val.'"',
                    
                    'ng-class'=>'{"has-error": formValidate.email.$touched && formValidate.email.$invalid}',

                    )) }}

                    <div class="validation-error" ng-messages="formValidate.email.$error" >

                            {!! getValidationMessage()!!}

                            {!! getValidationMessage('email')!!}

                    </div>

                </div>


                <div class="form-group">

                    {!! Form::label('country', getPhrase('country'), ['class' => 'control-label']) !!}

                    <?php
                        $val=old('country_id');
                        if ($record)
                         $val = $record->country_id;
     
                    ?>

                    {{Form::select('country_id', $countries, $val, ['placeholder' => getPhrase('select_country'),'class'=>'form-control select2',

                            'ng-model'=>'country_id',

                            'ng-init'=>'country_id="'.$val.'"',

                            'ng-change'=>'getStates(country_id)', 

                            'ng-class'=>'{"has-error": formValidate.country_id.$touched && formValidate.country_id.$invalid}'

                         ])}}


                    
                        <div class="validation-error" ng-messages="formValidate.country_id.$error" >

                            {!! getValidationMessage()!!}

                        </div>

                </div>

                <div class="form-group">

<label for="name"> {{ getPhrase('state') }} <span class="text-red">*</span></label>


<?php 


$val=old('state_id');
if ($record)
  $val = $record->state_id;

?>

<select ng-init="state_id={id:{{$val}} }" name="state_id" ng-model="state_id" class="form-control select2" ng-options="item.id as item.state for item in states track by item.id" ng-change="getCities(state_id)" required="true">

  <option value="">Select</option>  

</select>

 <div class="validation-error" ng-messages="formValidate.state_id.$error">

        {!! getValidationMessage()!!}
</div>
</div>



                 <div class="form-group">

                       <label for="name"> {{ getPhrase('city') }}</label>

                        <?php 

                        $val=old('city_id');
                        if ($record)
                          $val = $record->city_id;

                        ?>

                        <select ng-init="city_id={id:{{$val}} }" name="city_id" ng-model="city_id" class="form-control select2" ng-options="item.id as item.city for item in cities track by item.id">

                          <option value="">Select</option>  

                        </select>

                         <div class="validation-error" ng-messages="formValidate.city_id.$error">

                                {!! getValidationMessage()!!}
                        </div>
                 </div>
                
                  





                <div class="form-group">

                    <div class="row"> 

                       <div class="col-md-6">

                         {!! Form::label('profile_pic', getPhrase('profile_picture'), ['class' => 'control-label']) !!}    

                        {!! Form::file('image', array('id'=>'image_input', 'accept'=>'.png,.jpg,.jpeg')) !!}

                        </div>

                        <?php if(isset($record) && $record) { 

                              if($record->image!='') {

                            ?>

                        <div class="col-md-6">
                            <img src="{{ getProfilePath($record->image) }}" />
                        </div>

                        <?php } } ?>
                     </div>   

                </div>



                

                </div>


                <div class="col-lg-6">

                	<!-- <div class="form-group">

                    <?php 
                    $readonly = '';
                    $val=old('username');
                    if ($record) {
                        $readonly = 'readonly="true"';
                        $val = $record->username;
                    }

                    ?>

                    {!! Form::label('username', getPhrase('username'), ['class' => 'control-label']) !!}

                    <span class="text-red">*</span>

                    {{ Form::text('username', $val , $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Username',

                    'ng-model' => 'username', 

                    'required' => 'true',

                    $readonly,

                    'ng-pattern' => getRegexPattern("name"),

                    'ng-minlength' => '2',

                    'ng-maxlength' => '100',

                    'ng-init'=>'username="'.$val.'"',

                    'ng-class'=>'{"has-error": formValidate.username.$touched && formValidate.username.$invalid}',

                    )) }}

                    <div class="validation-error" ng-messages="formValidate.username.$error" >

                            {!! getValidationMessage()!!}

                            {!! getValidationMessage('minlength')!!}

                            {!! getValidationMessage('maxlength')!!}

                            {!! getValidationMessage('pattern')!!}

                    </div>

                </div> -->



                <div class="form-group">

                    {!! Form::label('phone', getPhrase('phone'), ['class' => 'control-label']) !!}

                    <span class="text-red">*</span>

                    <?php
                        $val=old('phone');
                        if ($record)
                         $val = $record->phone;     
                    ?>

                    {{ Form::text('phone', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Phone',

                    'ng-model' => 'phone', 

                    'required' => 'true',

                    'ng-pattern' => getRegexPattern("phone"),

                    'ng-maxlength' => '20',

                    'ng-init'=>'phone="'.$val.'"',

                    'ng-class'=>'{"has-error": formValidate.phone.$touched && formValidate.phone.$invalid}',



                    )) }}

                    <div class="validation-error" ng-messages="formValidate.phone.$error" >

                            {!! getValidationMessage('phone')!!}

                            {!! getValidationMessage('maxlength')!!}

                    </div>

                </div>

                
 <div class="form-group">
                    {!! Form::label('post_office', getPhrase('post_office'), ['class' => 'control-label']) !!}

                    <span class="text-red">*</span>

                    <?php
                        $val=old('post_office');
                        if ($record)
                         $val = $record->post_office;     
                    ?>

                    {{ Form::text('post_office', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Post Office/Police Box',

                    'ng-model' => 'post_office', 

                    'ng-init'=>'post_office="'.$val.'"',

					'ng-class'=>'{"has-error": formValidate.post_office.$touched && formValidate.post_office.$invalid}',



                    )) }}


                    
                    <div class="validation-error" ng-messages="formValidate.post_office.$error" >

	    					{!! getValidationMessage()!!}

					</div>

                </div>
                
                 <div class="form-group">
                    {!! Form::label('police_station', getPhrase('police_station'), ['class' => 'control-label']) !!}

                    <span class="text-red">*</span>

                    <?php
                        $val=old('police_station');
                        if ($record)
                         $val = $record->police_station;     
                    ?>

                    {{ Form::text('police_station', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Post Station/Upazilla',

                    'ng-model' => 'police_station', 

                    'ng-init'=>'police_station="'.$val.'"',

					'ng-class'=>'{"has-error": formValidate.police_station.$touched && formValidate.police_station.$invalid}',



                    )) }}


                    
                    <div class="validation-error" ng-messages="formValidate.police_station.$error" >

	    					{!! getValidationMessage()!!}

					</div>

                </div>

                  <div class="form-group">

                    {!! Form::label('address', getPhrase('Address Line 1'), ['class' => 'control-label']) !!}

                   <?php
                        $val=old('address');
                        if ($record)
                         $val = $record->address;     
                    ?>

                    {{ Form::textarea('address', $val, $attributes = 

                    array('class' => 'form-control', 'rows'=>3, 

                    'placeholder' => 'Address Line 1',

                    'ng-model' => 'address', 

                    'ng-maxlength' => '100',

                    'ng-init'=>'address="'.$val.'"',

                    'ng-class'=>'{"has-error": formValidate.address.$touched && formValidate.address.$invalid}',



                    )) }}


                    
                    <div class="validation-error" ng-messages="formValidate.address.$error" >

                           
                            {!! getValidationMessage('maxlength')!!}

                    </div>

                </div>

                <div class="form-group">

                    {!! Form::label('address2', getPhrase('Address Line 2'), ['class' => 'control-label']) !!}

                   <?php
                        $val=old('address2');
                        if ($record)
                         $val = $record->address2;     
                    ?>

                    {{ Form::textarea('address2', $val, $attributes = 

                    array('class' => 'form-control', 'rows'=>3, 

                    'placeholder' => 'Address Line 2',

                    'ng-model' => 'address2', 

                    'ng-maxlength' => '100',

                    'ng-init'=>'address2="'.$val.'"',

                    'ng-class'=>'{"has-error": formValidate.address2.$touched && formValidate.address2.$invalid}',



                    )) }}


                    
                    <div class="validation-error" ng-messages="formValidate.address2.$error" >

                           
                            {!! getValidationMessage('maxlength')!!}

                    </div>

                </div>
                <!--
                 <div class="form-group">
                    {!! Form::label('industry_type', getPhrase('industry_type'), ['class' => 'control-label']) !!}

                    <span class="text-red">*</span>

                    <?php
                        $val=old('industry_type');
                        if ($record)
                         $val = $record->industry_type;     
                    ?>

                    {{ Form::text('industry_type', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Industry Type',

                    'ng-model' => 'industry_type', 

                    'required' => 'true',

                    'ng-init'=>'industry_type="'.$val.'"',

					'ng-class'=>'{"has-error": formValidate.industry_type.$touched && formValidate.industry_type.$invalid}',



                    )) }}


                    
                    <div class="validation-error" ng-messages="formValidate.industry_type.$error" >

	    					{!! getValidationMessage()!!}

					</div>

                </div> -->
                <!--
                <div class="form-group">
                    {!! Form::label('product', getPhrase('product'), ['class' => 'control-label']) !!}

                    <span class="text-red">*</span>

                    <?php
                        $val=old('product');
                        if ($record)
                         $val = $record->product;     
                    ?>

                    {{ Form::text('product', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Product / Service',

                    'ng-model' => 'product', 

                    'required' => 'true',

                    'ng-init'=>'product="'.$val.'"',

					'ng-class'=>'{"has-error": formValidate.product.$touched && formValidate.product.$invalid}',



                    )) }}


                    
                    <div class="validation-error" ng-messages="formValidate.product.$error" >

	    					{!! getValidationMessage()!!}

					</div>

                </div> -->
               <!-- 
                <div class="form-group">
                    {!! Form::label('nid_passport', getPhrase('nid_passport'), ['class' => 'control-label']) !!}

                    <span class="text-red">*</span>

                    <?php
                        $val=old('nid_passport');
                        if ($record)
                         $val = $record->nid_passport;     
                    ?>

                    {{ Form::text('nid_passport', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'NID / Passport',

                    'ng-model' => 'nid_passport', 

                    'required' => 'true',

                    'ng-init'=>'nid_passport="'.$val.'"',

					'ng-class'=>'{"has-error": formValidate.nid_passport.$touched && formValidate.nid_passport.$invalid}',



                    )) }}


                    
                    <div class="validation-error" ng-messages="formValidate.nid_passport.$error" >

	    					{!! getValidationMessage()!!}

					</div>

                </div>-->
                
                @if(checkRole(['partnership']))
                 <div class="form-group">
                    {!! Form::label('nid_passport2', getPhrase('NID/Passport 2'), ['class' => 'control-label']) !!}

                    <span class="text-red">*</span>

                    <?php
                        $val=old('nid_passport2');
                        if ($record)
                         $val = $record->nid_passport2;     
                    ?>

                    {{ Form::text('nid_passport2', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'NID / Passport - 2',

                    'ng-model' => 'nid_passport2', 

                    'required' => 'true',

                    'ng-init'=>'nid_passport2="'.$val.'"',

					'ng-class'=>'{"has-error": formValidate.nid_passport2.$touched && formValidate.nid_passport2.$invalid}',



                    )) }}


                    
                    <div class="validation-error" ng-messages="formValidate.nid_passport2.$error" >

	    					{!! getValidationMessage()!!}

					</div>

                </div>
                
                @endif
                
                <!-- <div class="form-group">
                    {!! Form::label('trade_license', getPhrase('trade_license'), ['class' => 'control-label']) !!}

                    <span class="text-red">*</span>

                    <?php
                        $val=old('trade_license');
                        if ($record)
                         $val = $record->trade_license;     
                    ?>

                    {{ Form::text('trade_license', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Trade License',

                    'ng-model' => 'trade_license', 

                    'required' => 'true',

                    'ng-init'=>'trade_license="'.$val.'"',

					'ng-class'=>'{"has-error": formValidate.trade_license.$touched && formValidate.trade_license.$invalid}',



                    )) }}


                    
                    <div class="validation-error" ng-messages="formValidate.trade_license.$error" >

	    					{!! getValidationMessage()!!}

					</div>

                </div> -->
                <!--
                 <div class="form-group">
                    {!! Form::label('tin', getPhrase('tin'), ['class' => 'control-label']) !!}

                    <span class="text-red">*</span>

                    <?php
                        $val=old('tin');
                        if ($record)
                         $val = $record->tin;     
                    ?>

                    {{ Form::text('tin', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'TIN',

                    'ng-model' => 'tin', 

                    'required' => 'true',

                    'ng-init'=>'tin="'.$val.'"',

					'ng-class'=>'{"has-error": formValidate.tin.$touched && formValidate.tin.$invalid}',



                    )) }}


                    
                    <div class="validation-error" ng-messages="formValidate.tin.$error" >

	    					{!! getValidationMessage()!!}

					</div>

                </div> -->
                
                @if(checkRole(['partnership']) || checkRole(['company']) || checkRole(['single_owner_business']) )
                 <div class="form-group">
                    {!! Form::label('bin', getPhrase('bin'), ['class' => 'control-label']) !!}

                    <span class="text-red">*</span>

                    <?php
                        $val=old('bin');
                        if ($record)
                         $val = $record->bin;     
                    ?>

                    {{ Form::text('bin', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'BIN',

                    'ng-model' => 'bin', 

                    'required' => 'true',

                    'ng-init'=>'bin="'.$val.'"',

					'ng-class'=>'{"has-error": formValidate.bin.$touched && formValidate.bin.$invalid}',



                    )) }}


                    
                    <div class="validation-error" ng-messages="formValidate.bin.$error" >

	    					{!! getValidationMessage()!!}

					</div>

                </div>
               
                 <div class="form-group">
                    {!! Form::label('contact_person', getPhrase('Contact Person'), ['class' => 'control-label']) !!}

                    <span class="text-red">*</span>

                    <?php
                        $val=old('contact_person');
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


                    
                    <div class="validation-error" ng-messages="formValidate.contact_person.$error" >

	    					{!! getValidationMessage()!!}

					</div>

                </div> 
                @endif
                
                <!--
                 <div class="form-group">
                    {!! Form::label('website', getPhrase('website'), ['class' => 'control-label']) !!}

                    <span class="text-red">*</span>

                    <?php
                        $val=old('website');
                        if ($record)
                         $val = $record->website;     
                    ?>

                    {{ Form::text('website', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Website',

                    'ng-model' => 'website', 

                    'required' => 'true',

                    'ng-init'=>'website="'.$val.'"',

					'ng-class'=>'{"has-error": formValidate.website.$touched && formValidate.website.$invalid}',



                    )) }}


                    
                    <div class="validation-error" ng-messages="formValidate.website.$error" >

	    					{!! getValidationMessage()!!}

					</div>

                </div>

                -->

                	  

                 <div class="form-group">

					<button class="btn btn-primary login-bttn"  ng-disabled='!formValidate.$valid'>{{ getPhrase('save') }}</button>

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

file.onchange = function(e){
    var ext = this.value.match(/\.([^\.]+)$/)[1];
    switch(ext)
    {
        case 'jpg':
        case 'jpeg':
        case 'png':

            break;
        default:
               alertify.error("{{getPhrase('file_type_not_allowed')}}");
            this.value='';
    }
};
</script>

@stop