				
			<div class="col-xs-6"> 	

               

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



                 <?php if(checkRole(['admin'])): ?>


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
                
                <div class="form-group">

                    <?php echo Form::label('business_telephone', getPhrase('business_telephone'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php
                        $val=old('business_telephone');
                        if ($record)
                         $val = $record->business_telephone;     
                    ?>

                    <?php echo e(Form::text('business_telephone', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'business telephone',

                    'ng-model' => 'business_telephone', 

                    'required' => 'true',
                    
                    'ng-init'=>'business_telephone="'.$val.'"',

                    'ng-class'=>'{"has-error": formValidate.business_telephone.$touched && formValidate.business_telephone.$invalid}',



                    ))); ?>



                    
                    <div class="validation-error" ng-messages="formValidate.business_telephone.$error" >

                            <?php echo getValidationMessage('business_telephone'); ?>


                    </div>

                </div>



                 <div class="form-group">

                    <?php echo Form::label('country', getPhrase('country'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php
                        $val=old('country_id');
                        if ($record)
                         $val = $record->country_id;
     
                    ?>

                    

                    <?php echo e(Form::select('country_id', $countries, $val, ['placeholder' => getPhrase('select_country'),'class'=>'form-control select2',

                            'ng-model'=>'country_id',

                            'required'=> 'true',

                            'ng-init'=>'country_id="'.$val.'"',

                            'ng-change'=>'getStates(country_id)', 

                            'ng-class'=>'{"has-error": formValidate.country_id.$touched && formValidate.country_id.$invalid}'

                         ])); ?>



                    
                        <div class="validation-error" ng-messages="formValidate.country_id.$error" >

                            <?php echo getValidationMessage(); ?>


                        </div>

                </div>


                 </div>



                <div class="col-xs-6">  



                 <div class="form-group">

                        <label for="name"> <?php echo e(getPhrase('state')); ?> <span class="text-red">*</span></label>


                        <?php 

                        
                        $val=old('state_id');
                        if ($record)
                          $val = $record->state_id;

                        ?>

                        <select ng-init="state_id={id:<?php echo e($val); ?> }" name="state_id" ng-model="state_id" class="form-control select2" ng-options="item.id as item.state for item in states track by item.id" ng-change="getCities(state_id)" required="true">

                          <option value="">Select</option>  

                        </select>

                         <div class="validation-error" ng-messages="formValidate.state_id.$error">

                                <?php echo getValidationMessage(); ?>

                        </div>
                 </div>
               
                  <div class="form-group">

                        <label for="name"> <?php echo e(getPhrase('city')); ?> <span class="text-red">*</span></label>


                        <?php 

                        
                        $val=old('city_id');
                        if ($record)
                          $val = $record->city_id;

                        ?>

                        <select ng-init="city_id={id:<?php echo e($val); ?> }" name="city_id" ng-model="city_id" class="form-control select2" ng-options="item.id as item.city for item in cities track by item.id" required="true">

                          <option value="">Select</option>  

                        </select>

                         <div class="validation-error" ng-messages="formValidate.city_id.$error">

                                <?php echo getValidationMessage(); ?>

                        </div>
                 </div>
                 
                 <div class="form-group">
                    <?php echo Form::label('post_office', getPhrase('post_office'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php
                        $val=old('post_office');
                        if ($record)
                         $val = $record->post_office;     
                    ?>

                    <?php echo e(Form::text('post_office', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Post Office/Police Box',

                    'ng-model' => 'post_office', 

                    'required' => 'true',

                    'ng-init'=>'post_office="'.$val.'"',

					'ng-class'=>'{"has-error": formValidate.post_office.$touched && formValidate.post_office.$invalid}',



                    ))); ?>



                    
                    <div class="validation-error" ng-messages="formValidate.post_office.$error" >

	    					<?php echo getValidationMessage(); ?>


					</div>

                </div>
                
                 <div class="form-group">
                    <?php echo Form::label('police_station', getPhrase('police_station'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php
                        $val=old('police_station');
                        if ($record)
                         $val = $record->police_station;     
                    ?>

                    <?php echo e(Form::text('police_station', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Post Station/Upazilla',

                    'ng-model' => 'police_station', 

                    'required' => 'true',

                    'ng-init'=>'police_station="'.$val.'"',

					'ng-class'=>'{"has-error": formValidate.police_station.$touched && formValidate.police_station.$invalid}',



                    ))); ?>



                    
                    <div class="validation-error" ng-messages="formValidate.police_station.$error" >

	    					<?php echo getValidationMessage(); ?>


					</div>

                </div>




                <div class="form-group">

                    <?php echo Form::label('address', getPhrase('address'), ['class' => 'control-label']); ?>


                   <?php
                        $val=old('address');
                        if ($record)
                         $val = $record->address;     
                    ?>

                    <?php echo e(Form::textarea('address', $val, $attributes = 

                    array('class' => 'form-control', 'rows'=>3, 

                    'placeholder' => 'Address',

                    'ng-model' => 'address', 

                    'ng-maxlength' => '100',

                    'ng-init'=>'address="'.$val.'"',

                    'ng-class'=>'{"has-error": formValidate.address.$touched && formValidate.address.$invalid}',



                    ))); ?>



                    
                    <div class="validation-error" ng-messages="formValidate.address.$error" >

                           
                            <?php echo getValidationMessage('maxlength'); ?>


                    </div>

                </div>
                
                
                 <div class="form-group">
                    <?php echo Form::label('industry_type', getPhrase('industry_type'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php
                        $val=old('industry_type');
                        if ($record)
                         $val = $record->industry_type;     
                    ?>

                    <?php echo e(Form::text('industry_type', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Industry Type',

                    'ng-model' => 'industry_type', 

                    'required' => 'true',

                    'ng-init'=>'industry_type="'.$val.'"',

					'ng-class'=>'{"has-error": formValidate.industry_type.$touched && formValidate.industry_type.$invalid}',



                    ))); ?>



                    
                    <div class="validation-error" ng-messages="formValidate.industry_type.$error" >

	    					<?php echo getValidationMessage(); ?>


					</div>

                </div>

                <div class="form-group">
                    <?php echo Form::label('product', getPhrase('product'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php
                        $val=old('product');
                        if ($record)
                         $val = $record->product;     
                    ?>

                    <?php echo e(Form::text('product', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Product / Service',

                    'ng-model' => 'product', 

                    'required' => 'true',

                    'ng-init'=>'product="'.$val.'"',

					'ng-class'=>'{"has-error": formValidate.product.$touched && formValidate.product.$invalid}',



                    ))); ?>



                    
                    <div class="validation-error" ng-messages="formValidate.product.$error" >

	    					<?php echo getValidationMessage(); ?>


					</div>

                </div>
                
                <div class="form-group">
                    <?php echo Form::label('nid_passport', getPhrase('nid_passport'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php
                        $val=old('nid_passport');
                        if ($record)
                         $val = $record->nid_passport;     
                    ?>

                    <?php echo e(Form::text('nid_passport', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'NID / Passport',

                    'ng-model' => 'nid_passport', 

                    'required' => 'true',

                    'ng-init'=>'nid_passport="'.$val.'"',

					'ng-class'=>'{"has-error": formValidate.nid_passport.$touched && formValidate.nid_passport.$invalid}',



                    ))); ?>



                    
                    <div class="validation-error" ng-messages="formValidate.nid_passport.$error" >

	    					<?php echo getValidationMessage(); ?>


					</div>

                </div>
                
                <div class="form-group">
                    <?php echo Form::label('trade_license', getPhrase('trade_license'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php
                        $val=old('trade_license');
                        if ($record)
                         $val = $record->trade_license;     
                    ?>

                    <?php echo e(Form::text('trade_license', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Trade License',

                    'ng-model' => 'trade_license', 

                    'required' => 'true',

                    'ng-init'=>'trade_license="'.$val.'"',

					'ng-class'=>'{"has-error": formValidate.trade_license.$touched && formValidate.trade_license.$invalid}',



                    ))); ?>



                    
                    <div class="validation-error" ng-messages="formValidate.trade_license.$error" >

	    					<?php echo getValidationMessage(); ?>


					</div>

                </div>
                
                 <div class="form-group">
                    <?php echo Form::label('tin', getPhrase('tin'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php
                        $val=old('tin');
                        if ($record)
                         $val = $record->tin;     
                    ?>

                    <?php echo e(Form::text('tin', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'TIN',

                    'ng-model' => 'tin', 

                    'required' => 'true',

                    'ng-init'=>'tin="'.$val.'"',

					'ng-class'=>'{"has-error": formValidate.tin.$touched && formValidate.tin.$invalid}',



                    ))); ?>



                    
                    <div class="validation-error" ng-messages="formValidate.tin.$error" >

	    					<?php echo getValidationMessage(); ?>


					</div>

                </div>
                
                
                 <div class="form-group">
                    <?php echo Form::label('website', getPhrase('website'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php
                        $val=old('website');
                        if ($record)
                         $val = $record->website;     
                    ?>

                    <?php echo e(Form::text('website', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Website',

                    'ng-model' => 'website', 

                    'required' => 'true',

                    'ng-init'=>'website="'.$val.'"',

					'ng-class'=>'{"has-error": formValidate.website.$touched && formValidate.website.$invalid}',



                    ))); ?>



                    
                    <div class="validation-error" ng-messages="formValidate.website.$error" >

	    					<?php echo getValidationMessage(); ?>


					</div>

                </div>


                


                <div class="form-group">

                    <?php echo Form::label('status', getPhrase('status'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php
                        $val=old('approved');
                        if ($record)
                         $val = $record->approved;
    
                    ?>

                    

                    <?php echo e(Form::select('approved', accountstatus(), $val, ['placeholder' => getPhrase('select_status'),'class'=>'form-control select2',

                            'ng-model'=>'approved',

                            'required'=> 'true',

                            'ng-init'=>'approved="'.$val.'"', 

                            'ng-class'=>'{"has-error": formValidate.approved.$touched && formValidate.approved.$invalid}'

                         ])); ?>



                    
                        <div class="validation-error" ng-messages="formValidate.approved.$error" >

                            <?php echo getValidationMessage(); ?>


                        </div>

                </div>



                 <div class="form-group">

                    <div class="row"> 

                       <div class="col-md-6">

                         <?php echo Form::label('profile_pic', getPhrase('profile_picture'), ['class' => 'control-label']); ?>    

                        <?php echo Form::file('image', array('id'=>'image_input', 'accept'=>'.png,.jpg,.jpeg')); ?>


                        </div>

                        <?php if(isset($record) && $record) { 

                              if($record->image!='') {

                            ?>

                        <div class="col-md-6">

                            <img src="<?php echo e(getProfilePath($record->image)); ?>" />



                        </div>

                        <?php } } ?>
                     </div>   

                </div>




                <div class="form-group" ng-show="role_id==2">

                    
                    <div class="row"> 

                       <div class="col-md-6">

                       
                         <?php echo Form::label('company_logo', getPhrase('company_logo'), ['class' => 'control-label']); ?>    

                        <?php echo Form::file('company_logo', array('id'=>'company_logo_input', 'accept'=>'.png,.jpg,.jpeg')); ?>


                        </div>

                        <?php if(isset($record) && $record) { 

                              if($record->company_logo!='') {

                            ?>

                        <div class="col-md-6">

                            <img src="<?php echo e(getCompanyLogo($record->company_logo)); ?>" />



                        </div>

                        <?php } } ?>
                     </div>   

                </div>




               <div class="form-group pull-right">

					<button class="btn btn-success" ng-disabled='!formValidate.$valid'><?php echo e(getPhrase('save')); ?></button>

				</div>

			</div>



                