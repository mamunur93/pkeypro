				
			<div class="col-xs-12"> 	

               

				<div class="form-group">
                    <?php echo Form::label('name', getPhrase('name'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php
                        $val=old('name');
                        if ($record)
                         $val = $record->name;     
                    ?>

                    <?php echo e(Form::text('name', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Name',

                    'ng-model' => 'name', 

                    'required' => 'true',

                    'ng-pattern' => getRegexPattern("name"),

					'ng-minlength' => '2',

					'ng-maxlength' => '100',

                    'ng-init'=>'name="'.$val.'"',

					'ng-class'=>'{"has-error": formValidate.name.$touched && formValidate.name.$invalid}',



                    ))); ?>



                    
                    <div class="validation-error" ng-messages="formValidate.name.$error" >

	    					<?php echo getValidationMessage(); ?>


	    					<?php echo getValidationMessage('minlength'); ?>


	    					<?php echo getValidationMessage('maxlength'); ?>


	    					<?php echo getValidationMessage('pattern'); ?>


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

                    <?php echo Form::label('username', getPhrase('username'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php echo e(Form::text('username', $val , $attributes = 

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



                    ))); ?>



                    
                    <div class="validation-error" ng-messages="formValidate.username.$error" >

                            <?php echo getValidationMessage(); ?>


                            <?php echo getValidationMessage('minlength'); ?>


                            <?php echo getValidationMessage('maxlength'); ?>


                            <?php echo getValidationMessage('pattern'); ?>


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

                    <?php echo Form::label('email', getPhrase('email'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php echo e(Form::email('email', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Email',

                    'ng-model' => 'email', 

                    'required' => 'true',

                    $readonly,

                    'ng-init'=>'email="'.$val.'"',
                    
                    'ng-class'=>'{"has-error": formValidate.email.$touched && formValidate.email.$invalid}',



                    ))); ?>



                    
                    <div class="validation-error" ng-messages="formValidate.email.$error" >

                            <?php echo getValidationMessage(); ?>


                            <?php echo getValidationMessage('email'); ?>


                            

                    </div>

                </div>




                <?php if(!$record): ?>

                <div class="form-group">


                    <?php echo Form::label('password', getPhrase('password'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php echo e(Form::password('password', $attributes = array('class'=>'form-control instruction-call',

                        'placeholder' => getPhrase("password"),

                        'ng-model'=>'password',

                        'required'=> 'true', 

                        'ng-class'=>'{"has-error": formValidate.password.$touched && formValidate.password.$invalid}',

                        'ng-minlength' => 5

                    ))); ?>



                    
                    <div class="validation-error" ng-messages="formValidate.password.$error">

                            <?php echo getValidationMessage(); ?>


                            <?php echo getValidationMessage('password'); ?>


                        </div>

                </div>



                <div class="form-group">


                    <?php echo Form::label('confirm_password', getPhrase('confirm_password'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php echo e(Form::password('password_confirmation', $attributes = array('class'=>'form-control instruction-call',

                        'placeholder' => getPhrase("confirm_password"),

                        'ng-model'=>'password_confirmation',

                        'required'=> 'true', 

                        'ng-class'=>'{"has-error": formValidate.password_confirmation.$touched && formValidate.password.$invalid}',

                        'ng-minlength' => 5

                    ))); ?>



                    
                    <div class="validation-error" ng-messages="formValidate.password_confirmation.$error">

                            <?php echo getValidationMessage(); ?>


                            <?php echo getValidationMessage('password'); ?>


                        </div>

                </div>


                <?php endif; ?>



                 <?php if(!checkRole(['individual'])): ?>


                 <div class="form-group">

                    <?php echo Form::label('role', getPhrase('role'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php
                        $val=old('role_id');
                        if ($record)
                         $val = $record->role_id;

                         
                    ?>

                    

                    <?php echo e(Form::select('role_id', $roles, $val, ['placeholder' => getPhrase('select_role'),'class'=>'form-control select2',

                            'ng-model'=>'role_id',

                            'required'=> 'true',

                            'ng-init'=>'role_id="'.$val.'"', 

                            'ng-class'=>'{"has-error": formValidate.role_id.$touched && formValidate.role_id.$invalid}'

                         ])); ?>



                    
                        <div class="validation-error" ng-messages="formValidate.role_id.$error" >

                            <?php echo getValidationMessage(); ?>


                        </div>

                </div>

                <?php endif; ?>


                <div class="form-group">

                    <?php echo Form::label('phone', getPhrase('phone'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php
                        $val=old('phone');
                        if ($record)
                         $val = $record->phone;     
                    ?>

                    <?php echo e(Form::text('phone', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Phone',

                    'ng-model' => 'phone', 

                    'required' => 'true',

                    'ng-pattern' => getRegexPattern("phone"),

                    'ng-maxlength' => '20',

                    'ng-init'=>'phone="'.$val.'"',

                    'ng-class'=>'{"has-error": formValidate.phone.$touched && formValidate.phone.$invalid}',



                    ))); ?>



                    
                    <div class="validation-error" ng-messages="formValidate.phone.$error" >

                            <?php echo getValidationMessage('phone'); ?>


                            <?php echo getValidationMessage('maxlength'); ?>


                    </div>

                </div>
                
                



               <div class="form-group pull-right">

					<button class="btn btn-success" ng-disabled='!formValidate.$valid'><?php echo e(getPhrase('save')); ?></button>

				</div>

			</div>



                