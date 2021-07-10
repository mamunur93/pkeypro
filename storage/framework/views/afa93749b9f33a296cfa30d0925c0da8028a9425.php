


<?php $__env->startSection('custom_div'); ?>

<?php if(isset($record) && count($record)): ?>
<div ng-controller="auctionsController" ng-init="initFunctions()">
    <?php else: ?>
    <div ng-controller="auctionsController">
        <?php endif; ?>

        <?php $__env->stopSection(); ?>


        <?php $__env->startSection('content'); ?>

        <?php echo $__env->make('bidder.leftmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <!--Dashboard section -->


        <div class="col-lg-9 col-md-8 col-sm-12 au-onboard">
            <a href="<?php echo e(URL_HOME); ?>" class="au-middles justify-content-start"> <?php echo e(getPhrase('home')); ?> &nbsp;<span> / <?php echo e(getPhrase('profile')); ?> </span></a>

            <div class="au-left-side form-auth-style">


                <?php echo e(Form::model($record, 
				array('url' => 'users/business/edit/'.$record->slug, 
				'method'=>'PATCH', 'name'=>'formValidate', 'files'=>'true' , 'novalidate'=>''))); ?>


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

                            <?php echo Form::label('industry_type', getPhrase('Industry Type'), ['class' => 'control-label']); ?>


                            <span class="text-red">*</span>

                            <?php
                            $val = old('industry_type_id');
                            if ($record)
                                $val = $record->industry_type_id;

                            ?>

                            <?php echo e(Form::select('industry_type_id', $industries, $val, ['placeholder' => getPhrase('select_industry'),'class'=>'form-control select2',

                                'ng-model'=>'industry_type_id',

                                'required'=> 'true',

                                'ng-init'=>'industry_type_id="'.$val.'"',

                                'ng-change'=>'getStates(industry_type_id)', 

                                'ng-class'=>'{"has-error": formValidate.industry_type_id.$touched && formValidate.industry_type_id.$invalid}'

                            ])); ?>




                            <div class="validation-error" ng-messages="formValidate.industry_type_id.$error">

                                <?php echo getValidationMessage(); ?>


                            </div>

                        </div>

                        <div class="form-group">
                            <?php echo Form::label('product', getPhrase('product'), ['class' => 'control-label']); ?>


                            <span class="text-red"></span>

                            <?php
                            $val = old('product');
                            if ($record)
                                $val = $record->product;
                            ?>

                            <?php echo e(Form::text('product', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Product / Service',

                    'ng-model' => 'product', 

                    'ng-init'=>'product="'.$val.'"',

					'ng-class'=>'{"has-error": formValidate.product.$touched && formValidate.product.$invalid}',



                    ))); ?>




                            <div class="validation-error" ng-messages="formValidate.product.$error">

                                <?php echo getValidationMessage(); ?>


                            </div>

                        </div>

                        <div class="form-group">

                            <div class="row">

                                <div class="col-md-6">

                                    <?php echo Form::label('nid_or_passport', getPhrase('nid_or_passport'), ['class' => 'control-label']); ?>


                                    <?php echo Form::file('nid_passport', array('id'=>'image_input', 'accept'=>'.png,.jpg,.jpeg')); ?>


                                </div>

                               

                                        <div class="col-md-6">
                                        <?php if (isset($record) && $record) {

                                            if ($record->nid_passport != '') {

                                                ?>
                                        <img width="300" src="/public/uploads/users/<?php echo e($record->nid_passport); ?>" style="border: 5px solid #ddd;padding: 7px;"/>
                                        
                                        <?php }
                                            } ?>
                                        </div>

                               
                            </div>

                        </div>

                        

                        <div class="form-group">

                            <div class="row">

                                <div class="col-md-6">

                                    <?php echo Form::label('trade', getPhrase('trade licence &nbsp; &nbsp; &nbsp; &nbsp;'), ['class' => 'control-label']); ?>


                                    <?php echo Form::file('trade_license', array('id'=>'image_input', 'accept'=>'.png,.jpg,.jpeg')); ?>


                                </div>


                            
                          

                                    <div class="col-md-6">
                                    <?php if (isset($record) && $record) {

                                            if ($record->trade_license != '') {

                                            ?>
                                   
                                        <img width="300" src="/public/uploads/users/<?php echo e($record->trade_license); ?>" style="border: 5px solid #ddd;padding: 7px;"/>
                                        <?php }
                                        } ?>
                                    </div>

                                    </div>       
                        </div>

                        <div class="form-group">

                            <div class="row">

                                <div class="col-md-6">

                                    <?php echo Form::label('tin', getPhrase(' tin certificate &nbsp; &nbsp; &nbsp;'), ['class' => 'control-label']); ?>


                                    <?php echo Form::file('tin', array('id'=>'image_input', 'accept'=>'.png,.jpg,.jpeg')); ?>


                                </div>

                                

                                        <div class="col-md-6">
                                        <?php if (isset($record) && $record) {

                                        if ($record->tin != '') {

                                        ?>
                                            <img width="300" src="/public/uploads/users/<?php echo e($record->tin); ?>" style="border: 5px solid #ddd;padding: 7px;" />
                                            <?php }
                                          } ?>
                                        </div>

                               
                            </div>

                        </div>

                        <?php if(checkRole(['partnership'])): ?>
                        <div class="form-group">
                            <?php echo Form::label('nid_passport2', getPhrase('NID/Passport 2'), ['class' => 'control-label']); ?>


                            <span class="text-red">*</span>

                            <?php
                            $val = old('nid_passport2');
                            if ($record)
                                $val = $record->nid_passport2;
                            ?>

                            <?php echo e(Form::text('nid_passport2', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'NID / Passport - 2',

                    'ng-model' => 'nid_passport2', 

                    'ng-init'=>'nid_passport2="'.$val.'"',

					'ng-class'=>'{"has-error": formValidate.nid_passport2.$touched && formValidate.nid_passport2.$invalid}',



                    ))); ?>




                            <div class="validation-error" ng-messages="formValidate.nid_passport2.$error">

                                <?php echo getValidationMessage(); ?>


                            </div>

                        </div>

                        <?php endif; ?>



                        <?php if(checkRole(['partnership']) || checkRole(['company']) || checkRole(['single_owner_business']) ): ?>
                        <div class="form-group">
                            <?php echo Form::label('bin', getPhrase('bin'), ['class' => 'control-label']); ?>


                            <span class="text-red">*</span>

                            <?php
                            $val = old('bin');
                            if ($record)
                                $val = $record->bin;
                            ?>

                            <?php echo e(Form::text('bin', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'BIN',

                    'ng-model' => 'bin', 

                    'ng-init'=>'bin="'.$val.'"',

					'ng-class'=>'{"has-error": formValidate.bin.$touched && formValidate.bin.$invalid}',



                    ))); ?>




                            <div class="validation-error" ng-messages="formValidate.bin.$error">

                                <?php echo getValidationMessage(); ?>


                            </div>

                        </div>

                        <div class="form-group">
                            <?php echo Form::label('contact_person', getPhrase('Contact Person'), ['class' => 'control-label']); ?>


                            <span class="text-red">*</span>

                            <?php
                            $val = old('contact_person');
                            if ($record)
                                $val = $record->contact_person;
                            ?>

                            <?php echo e(Form::text('contact_person', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Contact Person',

                    'ng-model' => 'contact_person', 

                    'required' => 'true',

                    'ng-init'=>'contact_person="'.$val.'"',

					'ng-class'=>'{"has-error": formValidate.contact_person.$touched && formValidate.contact_person.$invalid}',



                    ))); ?>




                            <div class="validation-error" ng-messages="formValidate.contact_person.$error">

                                <?php echo getValidationMessage(); ?>


                            </div>

                        </div>
                        <?php endif; ?>




                        <div class="form-group">

                            <button class="btn btn-primary login-bttn" ng-disabled='!formValidate.$valid'><?php echo e(getPhrase('save')); ?></button>

                        </div>



                    </div>



                </div>

                <?php echo Form::close(); ?>


            </div>
        </div>




    </div>
</div>
</section>
<!--Dashboard section-->

<?php $__env->stopSection(); ?>



<?php $__env->startSection('footer_scripts'); ?>
<?php echo $__env->make('common.validations', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('common.alertify', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('home.pages.auctions.auctions-js-script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

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
                alertify.error("<?php echo e(getPhrase('file_type_not_allowed')); ?>");
                this.value = '';
        }
    };
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make($layout, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>