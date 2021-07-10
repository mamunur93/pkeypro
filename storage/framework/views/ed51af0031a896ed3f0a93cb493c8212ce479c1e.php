

<?php $__env->startSection('content'); ?>
    <h3 class="page-title"> <?php echo e($title); ?> </h3>

    <?php echo Form::open(array('url' => URL_INDUSTRY_TYPE_ADD, 'method' => 'POST','name'=>'formValidate', 'novalidate'=>'')); ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo e(getPhrase('create')); ?>

        </div>
        

        <div class="panel-body form-auth-style">
         
        <div class="row">

            <div class="col-xs-6">  

           
                <div class="form-group">

                    <?php echo Form::label('title', getPhrase('title'), ['class' => 'control-label']); ?>


                     <span class="text-red">*</span>

                     <?php echo e(Form::text('title', old('title'), $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Title',

                    'ng-model' => 'title', 

                    'required' => 'true',

                    'ng-minlength' => '2',

                    'ng-class'=>'{"has-error": formValidate.title.$touched && formValidate.title.$invalid}',

                    ))); ?>


                    <div class="validation-error" ng-messages="formValidate.title.$error" >

                            <?php echo getValidationMessage(); ?>


                            <?php echo getValidationMessage('minlength'); ?>


                    </div>
                   
                </div>

                 <div class="form-group pull-right">

                    <button class="btn btn-success" ng-disabled='!formValidate.$valid'><?php echo e(getPhrase('save')); ?></button>

                </div>

            </div>

            </div>
            
        </div>

    </div>

   
    <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>



<?php $__env->startSection('footer_scripts'); ?>
<?php echo $__env->make('common.validations', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('common.alertify', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<script src="<?php echo e(PREFIX1); ?>ckeditor/ckeditor.js"></script>
<script src="<?php echo e(PREFIX1); ?>ckeditor/adapters/jquery.js"></script>


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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>