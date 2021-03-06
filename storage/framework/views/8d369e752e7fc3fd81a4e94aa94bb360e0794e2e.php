

<?php $__env->startSection('header_scripts'); ?>
<link href="<?php echo e(CSS); ?>checkbox.css" rel="stylesheet" type="text/css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section class="au-who">

    <div class="container">

        <div class="row">

          <div class="col-lg-6 col-lg-offset-2">

                <div class="panel panel-default">


                   <div class="au-who-main"> <h2 class="text-left"><?php echo e(getPhrase('register')); ?></h2>  </div>

                    <div class="panel-body form-auth-style">


                        <?php echo $__env->make('errors.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                        <?php echo Form::open(array('url' => URL_USERS_REGISTER, 'method' => 'POST', 'novalidate'=>'', 'class'=>"form-horizontal", 'name'=>"registrationForm")); ?>


                       



                            <div class="form-group">

                               <?php echo Form::label('name', getPhrase('name'), ['class' => 'control-label']); ?>


                                     <span class="text-red">*</span>
                                 
                                    <?php echo e(Form::text('name', old('name') , $attributes = array('class'=>'form-control',

                                        'placeholder' => 'Name',

                                        'ng-model'=>'name',

                                        'ng-pattern' => getRegexPattern('name'),

                                        'required'=> 'true', 

                                        'ng-class'=>'{"has-error": registrationForm.name.$touched && registrationForm.name.$invalid}',

                                        'ng-minlength' => '4',

                                    ))); ?>



                                    <div class="validation-error" ng-messages="registrationForm.name.$error" >

                                        <?php echo getValidationMessage(); ?>


                                        <?php echo getValidationMessage('minlength'); ?>


                                        <?php echo getValidationMessage('pattern'); ?>


                                    </div>

                                </div>

                            




                            <div class="form-group">

                                <?php echo Form::label('username', getPhrase('username'), ['class' => 'control-label']); ?>


                                    <span class="text-red">*</span>
                                 
                                    <?php echo e(Form::text('username', old('username') , $attributes = array('class'=>'form-control',

                                        'placeholder' => 'Username',

                                        'ng-model'=>'username',

                                        'required'=> 'true', 

                                        'ng-class'=>'{"has-error": registrationForm.username.$touched && registrationForm.username.$invalid}',

                                        'ng-minlength' => '4',

                                    ))); ?>



                                    <div class="validation-error" ng-messages="registrationForm.username.$error" >

                                        <?php echo getValidationMessage(); ?>


                                        <?php echo getValidationMessage('minlength'); ?>


                                        <?php echo getValidationMessage('pattern'); ?>


                                    </div>

                       

                            </div>





                            <div class="form-group">

                                <?php echo Form::label('email', getPhrase('email'), ['class' => 'control-label']); ?>


                                 <span class="text-red">*</span>

                                   <?php echo e(Form::email('email', $value = null , $attributes = array('class'=>'form-control',

                                        'placeholder' => getPhrase("email"),

                                        'ng-model'=>'email',

                                        'required'=> 'true', 

                                        'ng-class'=>'{"has-error": registrationForm.email.$touched && registrationForm.email.$invalid}',

                                    ))); ?>





                                    <div class="validation-error" ng-messages="registrationForm.email.$error" >

                                            <?php echo getValidationMessage(); ?>


                                            <?php echo getValidationMessage('email'); ?>


                                     </div>

                               
                            </div>






                            <div class="form-group">

                                <?php echo Form::label('password', getPhrase('password'), ['class' => 'control-label']); ?>


                                <span class="text-red">*</span>
                              

                                    <?php echo e(Form::password('password', $attributes = array('class'=>'form-control instruction-call',

                                        'placeholder' => getPhrase("password"),

                                        'ng-model'=>'registration.password',

                                        'required'=> 'true', 

                                        'ng-class'=>'{"has-error": registrationForm.password.$touched && registrationForm.password.$invalid}',

                                        'ng-minlength' => 5

                                    ))); ?>




                                   <div class="validation-error" ng-messages="registrationForm.password.$error" >

                                        <?php echo getValidationMessage(); ?>


                                        <?php echo getValidationMessage('password'); ?>


                                    </div>

                            </div>






                            <div class="form-group">

                              <?php echo Form::label('confirm_password', getPhrase('confirm_password'), ['class' => 'control-label']); ?>


                                <span class="text-red">*</span>

                                    
                                    <?php echo e(Form::password('password_confirmation', $attributes = array('class'=>'form-control instruction-call',

                                        'placeholder' => getPhrase("password_confirmation"),

                                        'ng-model'=>'registration.password_confirmation',

                                        'required'=> 'true', 

                                        'ng-class'=>'{"has-error": registrationForm.password_confirmation.$touched && registrationForm.password_confirmation.$invalid}',

                                        'ng-minlength' => 5,

                                        'compare-to' =>"registration.password"

                                    ))); ?>


                                        <div class="validation-error" ng-messages="registrationForm.password_confirmation.$error" >

                                            <?php echo getValidationMessage(); ?>


                                            <?php echo getValidationMessage('minlength'); ?>


                                            <?php echo getValidationMessage('confirmPassword'); ?>


                                        </div>

                                
                            </div>



                            <div class="form-group">

                           <?php echo Form::label('user', getPhrase('user'), ['class' => 'control-label']); ?>


                       


                                <div class="form-group row">
                                    <div class="col-md-2">
                                    <?php echo e(Form::radio('user_type','seller', true, array('id'=>'seller', 'name'=>'user_type'))); ?>

                                        
                                        <label for="seller"> <span class="fa-stack radio-button"> <i class="mdi mdi-check active"></i> </span> <?php echo e(getPhrase('seller')); ?></label> 
                                    </div>
                                    <div class="col-md-2">
                                    <?php echo e(Form::radio('user_type','bidder', false, array('id'=>'bidder', 'name'=>'user_type'))); ?>

                                        <label for="bidder"> <span class="fa-stack radio-button"> <i class="mdi mdi-check active"></i> </span> <?php echo e(getPhrase('bidder')); ?> 
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                    <?php echo e(Form::radio('user_type','Individual', false, array('id'=>'Individual', 'name'=>'user_type'))); ?>

                                        <label for="Individual"> <span class="fa-stack radio-button"> <i class="mdi mdi-check active"></i> </span> <?php echo e(getPhrase('Individual')); ?> 
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                    <?php echo e(Form::radio('user_type','Partnership', false, array('id'=>'Partnership', 'name'=>'user_type'))); ?>

                                        <label for="Partnership"> <span class="fa-stack radio-button"> <i class="mdi mdi-check active"></i> </span> <?php echo e(getPhrase('Partnership')); ?> 
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                    <?php echo e(Form::radio('user_type','Company', false, array('id'=>'Company', 'name'=>'user_type'))); ?>

                                        <label for="Company"> <span class="fa-stack radio-button"> <i class="mdi mdi-check active"></i> </span> <?php echo e(getPhrase('Company')); ?> 
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                    <?php echo e(Form::radio('user_type','Single-Owner-Business', false, array('id'=>'Single-Owner-Business', 'name'=>'user_type'))); ?>

                                        <label for="Single-Owner-Business"> <span class="fa-stack radio-button"> <i class="mdi mdi-check active"></i> </span> <?php echo e(getPhrase('Single-Owner-Business')); ?> 
                                        </label>
                                    </div>
                                </div>

                                


                            </div>
                            
                        


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" ng-disabled='!registrationForm.$valid'>
                                       <?php echo e(getPhrase('register_now')); ?>

                                    </button>
                                </div>
                            </div>


                       <?php echo Form::close(); ?>



                       <a href="<?php echo e(URL_USERS_LOGIN); ?>"><p class="text-center"><?php echo e(getPhrase('i_am_having_account')); ?> </p></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>