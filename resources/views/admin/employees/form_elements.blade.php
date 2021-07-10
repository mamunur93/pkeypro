				
			<div class="col-xs-12"> 	

               

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




                @if(!$record)

                <div class="form-group">


                    {!! Form::label('password', getPhrase('password'), ['class' => 'control-label']) !!}

                    <span class="text-red">*</span>

                    {{ Form::password('password', $attributes = array('class'=>'form-control instruction-call',

                        'placeholder' => getPhrase("password"),

                        'ng-model'=>'password',

                        'required'=> 'true', 

                        'ng-class'=>'{"has-error": formValidate.password.$touched && formValidate.password.$invalid}',

                        'ng-minlength' => 5

                    )) }}


                    
                    <div class="validation-error" ng-messages="formValidate.password.$error">

                            {!! getValidationMessage()!!}

                            {!! getValidationMessage('password')!!}

                        </div>

                </div>



                <div class="form-group">


                    {!! Form::label('confirm_password', getPhrase('confirm_password'), ['class' => 'control-label']) !!}

                    <span class="text-red">*</span>

                    {{ Form::password('password_confirmation', $attributes = array('class'=>'form-control instruction-call',

                        'placeholder' => getPhrase("confirm_password"),

                        'ng-model'=>'password_confirmation',

                        'required'=> 'true', 

                        'ng-class'=>'{"has-error": formValidate.password_confirmation.$touched && formValidate.password.$invalid}',

                        'ng-minlength' => 5

                    )) }}


                    
                    <div class="validation-error" ng-messages="formValidate.password_confirmation.$error">

                            {!! getValidationMessage()!!}

                            {!! getValidationMessage('password')!!}

                        </div>

                </div>


                @endif



                 @if(!checkRole(['individual']))


                 <div class="form-group">

                    {!! Form::label('role', getPhrase('role'), ['class' => 'control-label']) !!}

                    <span class="text-red">*</span>

                    <?php
                        $val=old('role_id');
                        if ($record)
                         $val = $record->role_id;

                         
                    ?>

                    

                    {{Form::select('role_id', $roles, $val, ['placeholder' => getPhrase('select_role'),'class'=>'form-control select2',

                            'ng-model'=>'role_id',

                            'required'=> 'true',

                            'ng-init'=>'role_id="'.$val.'"', 

                            'ng-class'=>'{"has-error": formValidate.role_id.$touched && formValidate.role_id.$invalid}'

                         ])}}


                    
                        <div class="validation-error" ng-messages="formValidate.role_id.$error" >

                            {!! getValidationMessage()!!}

                        </div>

                </div>

                @endif


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
                
                



               <div class="form-group pull-right">

					<button class="btn btn-success" ng-disabled='!formValidate.$valid'>{{ getPhrase('save') }}</button>

				</div>

			</div>



                