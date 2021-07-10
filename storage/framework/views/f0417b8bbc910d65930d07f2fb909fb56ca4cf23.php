				
			<div class="col-xs-6"> 	

				

                <div class="form-group">

                    <?php echo Form::label('country', getPhrase('country'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>



                    <?php
                        $val=old('country_id');
                        if ($record)
                         $val = $record->country_id;


                        $selected = null;
                        if($record)
                        $selected = $record->country_id;
                                 
                        ?>

                    

                    <?php echo e(Form::select('country_id', $countries, $selected, ['placeholder' => getPhrase('select_country'),'class'=>'form-control select2',

                            'ng-model'=>'country_id',

                            'required'=> 'true',

                            'ng-init'=>'country_id="'.$val.'"',

                            'ng-change'=> 'getStates(country_id)', 

                            'ng-class'=>'{"has-error": formValidate.country_id.$touched && formValidate.country_id.$invalid}'

                         ])); ?>



                    
                    <div class="validation-error" ng-messages="formValidate.country_id.$error" >

                            <?php echo getValidationMessage(); ?>



                        </div>

                </div>




                     
                <div class="form-group">

                        <label for="name"> <?php echo e(getPhrase('state')); ?> <span class="text-red">*</span></label>


                        <?php 

                        
                        $val=old('state_id');
                        if ($record)
                          $val = $record->state_id;

                        ?>

                        <select ng-init="state_id={id:<?php echo e($val); ?> }" name="state_id" ng-model="state_id" class="form-control select2" ng-options="item.id as item.state for item in states track by item.id" required="true">

                          <option value="">Select</option>  

                        </select>




                          <div class="validation-error" ng-messages="formValidate.state_id.$error">

                                <?php echo getValidationMessage(); ?>



                            </div>

                 </div>


                 <div class="form-group">

                    <?php echo Form::label('city', getPhrase('city'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php 
   
                     $val=old('city');
                     if ($record)
                      $val = $record->city;

                    ?>


                    <?php echo e(Form::text('city', old('city'), $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'City',

                    'ng-model' => 'city', 

                    'required' => 'true',

                    'ng-pattern' => getRegexPattern("name"),

                    'ng-init'=>'city="'.$val.'"',

                    'ng-minlength' => '2',

                    'ng-maxlength' => '100',

                    'ng-class'=>'{"has-error": formValidate.city.$touched && formValidate.city.$invalid}',



                    ))); ?>



                    
                    <div class="validation-error" ng-messages="formValidate.city.$error" >

                            <?php echo getValidationMessage(); ?>


                            <?php echo getValidationMessage('minlength'); ?>


                            <?php echo getValidationMessage('maxlength'); ?>


                            <?php echo getValidationMessage('pattern'); ?>


                    </div>

                </div>
                
                <!--post office-->
                <div class="form-group">

                    <?php echo Form::label('post_office', getPhrase('post office'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php 
   
                     $val=old('post-office');
                     if ($record)
                      $val = $record->post_office;

                    ?>


                    <?php echo e(Form::text('post_office', old('post_office'), $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'post office Name',

                    'ng-model' => 'post_office', 

                    'required' => 'true',

                    'ng-pattern' => getRegexPattern("name"),

                    'ng-init'=>'post_office="'.$val.'"',

                    'ng-minlength' => '2',

                    'ng-maxlength' => '100',

                    'ng-class'=>'{"has-error": formValidate.post_office.$touched && formValidate.post_office.$invalid}',



                    ))); ?>



                    
                    <div class="validation-error" ng-messages="formValidate.post_office.$error" >

                            <?php echo getValidationMessage(); ?>


                            <?php echo getValidationMessage('minlength'); ?>


                            <?php echo getValidationMessage('maxlength'); ?>


                            <?php echo getValidationMessage('pattern'); ?>


                    </div>

                </div>
                
                <!--Zip Code-->
                <div class="form-group">

                    <?php echo Form::label('post_code', getPhrase('post Code'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php 
   
                     $val=old('post-office');
                     if ($record)
                      $val = $record->post_code;

                    ?>


                    <?php echo e(Form::text('post_code', old('post_code'), $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'post code',

                    'ng-model' => 'post_code', 

                    'required' => 'true',

                    'ng-pattern' => getRegexPattern("name"),

                    'ng-init'=>'post_code="'.$val.'"',

                    'ng-minlength' => '2',

                    'ng-maxlength' => '100',

                    'ng-class'=>'{"has-error": formValidate.post_code.$touched && formValidate.post_code.$invalid}',



                    ))); ?>



                    
                    <div class="validation-error" ng-messages="formValidate.post_code.$error" >

                            <?php echo getValidationMessage(); ?>


                            <?php echo getValidationMessage('minlength'); ?>


                            <?php echo getValidationMessage('maxlength'); ?>


                            <?php echo getValidationMessage('pattern'); ?>


                    </div>

                </div>
                <!--Zip Code-->
                
                <!--Police Station-->
                <div class="form-group">

                    <?php echo Form::label('police_station', getPhrase('Police Station'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php 
   
                     $val=old('police_station');
                     if ($record)
                      $val = $record->police_station;

                    ?>


                    <?php echo e(Form::text('police_station', old('police_station'), $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'police station Name',

                    'ng-model' => 'police_station', 

                    'required' => 'true',

                    'ng-pattern' => getRegexPattern("name"),

                    'ng-init'=>'police_station="'.$val.'"',

                    'ng-minlength' => '2',

                    'ng-maxlength' => '100',

                    'ng-class'=>'{"has-error": formValidate.police_station.$touched && formValidate.police_station.$invalid}',



                    ))); ?>



                    
                    <div class="validation-error" ng-messages="formValidate.police_station.$error" >

                            <?php echo getValidationMessage(); ?>


                            <?php echo getValidationMessage('minlength'); ?>


                            <?php echo getValidationMessage('maxlength'); ?>


                            <?php echo getValidationMessage('pattern'); ?>


                    </div>

                </div>
                <!--Police Station-->



                  <div class="form-group">

                    <?php echo Form::label('status', getPhrase('status'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php
                        $val=old('status');
                        if ($record)
                         $val = $record->status;

                        $selected = null;
                        if($record)
                        $selected = $record->status;      
                    ?>

                    

                    <?php echo e(Form::select('status', activeinactive(), $selected, ['placeholder' => getPhrase('select'),'class'=>'form-control select2',

                            'ng-model'=>'status',

                            'required'=> 'true',

                            'ng-init'=>'status="'.$val.'"', 

                            'ng-class'=>'{"has-error": formValidate.status.$touched && formValidate.status.$invalid}'

                         ])); ?>



                    
                        <div class="validation-error" ng-messages="formValidate.status.$error" >

                            <?php echo getValidationMessage(); ?>


                        </div>

                </div>
                


               <div class="form-group pull-right">

					<button class="btn btn-success" ng-disabled='!formValidate.$valid'><?php echo e(getPhrase('save')); ?></button>

				</div>

			</div>



                