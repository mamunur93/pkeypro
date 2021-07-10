<?php $currency_code = getSetting('currency_code','site_settings');?>
<div class="col-xs-12">

			<div class="col-xs-6"> 	

				<div class="form-group">

                    <?php echo Form::label('bidininame', getPhrase('Bid Initiator Name'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                     <?php
                        $val=old('bidininame');
                        if ($record)
                         $val = $record->bidininame;
    
                    ?>


                    <?php echo e(Form::text('bidininame', old('bidininame'), $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Bid Initiator Name',

                    'ng-model' => 'bidininame', 

                    'required' => 'true',

                    'ng-init'=>'bidininame="'.$val.'"',

					'ng-class'=>'{"has-error": formValidate.bidininame.$touched && formValidate.bidininame.$invalid}',



                    ))); ?>



                    
                    <div class="validation-error" ng-messages="formValidate.title.$error" >

	    					<?php echo getValidationMessage(); ?>



					</div>

                </div>
                <div class="form-group">

                    <?php echo Form::label('currency', getPhrase('Currency'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                     <?php
                        $val=old('currency');
                        if ($record)
                         $val = $record->currency;
    
                    ?>


                    <?php echo e(Form::text('currency', old('currency'), $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'currency',

                    'ng-model' => 'currency', 

                    'required' => 'true',

                    'ng-init'=>'currency="'.$val.'"',

					'ng-class'=>'{"has-error": formValidate.currency.$touched && formValidate.currency.$invalid}',



                    ))); ?>



                    
                    <div class="validation-error" ng-messages="formValidate.currency.$error" >

	    					<?php echo getValidationMessage(); ?>


					</div>

                </div>
                <!-- not done to db -->
                <div class="form-group">

                    <?php echo Form::label('title', getPhrase('Bid Event Title'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                     <?php
                        $val=old('title');
                        if ($record)
                         $val = $record->title;
    
                    ?>


                    <?php echo e(Form::text('title', old('title'), $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Bid Event Title',

                    'ng-model' => 'title', 

                    'required' => 'true',

					'ng-minlength' => '2',

					'ng-maxlength' => '100',

                    'ng-init'=>'title="'.$val.'"',

					'ng-class'=>'{"has-error": formValidate.title.$touched && formValidate.title.$invalid}',



                    ))); ?>



                    
                    <div class="validation-error" ng-messages="formValidate.title.$error" >

	    					<?php echo getValidationMessage(); ?>


	    					<?php echo getValidationMessage('minlength'); ?>


	    					<?php echo getValidationMessage('maxlength'); ?>



					</div>

                </div>

                <?php if(checkRole(['admin'])): ?>
                <div class="form-group">

                    <?php echo Form::label('user_id', getPhrase('seller'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php
                        $val=old('user_id');
                        if ($record)
                         $val = $record->user_id;

                        $selected = null;
                        if($record)
                        $selected = $record->user_id;      
                    ?>

                    

                    <?php echo e(Form::select('user_id', $users , $selected, ['placeholder' => getPhrase('select_seller'),'class'=>'form-control select2',

                            'ng-model'=>'user_id',

                            'required'=> 'true',

                            'ng-init'=>'user_id="'.$val.'"',
                            
                            'ng-class'=>'{"has-error": formValidate.user_id.$touched && formValidate.user_id.$invalid}'

                         ])); ?>



                    
                        <div class="validation-error" ng-messages="formValidate.user_id.$error" >

                            <?php echo getValidationMessage(); ?>


                        </div>

                </div>
                <?php endif; ?>



                <div class="form-group">

                    <?php echo Form::label('category', getPhrase('category'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php
                        $val=old('category_id');
                        if ($record)
                         $val = $record->category_id;

                        $selected = null;
                        if($record)
                        $selected = $record->category_id;      
                    ?>

                    

                    <?php echo e(Form::select('category_id', $categories , $selected, ['placeholder' => getPhrase('select'),'class'=>'form-control select2',

                            'ng-model'=>'category_id',

                            'required'=> 'true',

                            'ng-init'=>'category_id="'.$val.'"',

                            'ng-change'=> 'getSubCategories(category_id)', 

                            'ng-class'=>'{"has-error": formValidate.category_id.$touched && formValidate.category_id.$invalid}'

                         ])); ?>



                    
                        <div class="validation-error" ng-messages="formValidate.category_id.$error" >

                            <?php echo getValidationMessage(); ?>


                        </div>

                </div>


                <div class="form-group">

                        <label for="name"> <?php echo e(getPhrase('sub_category')); ?> <span class="text-red">*</span></label>


                        <?php 

                        
                        $val=old('sub_category_id');
                        if ($record)
                          $val = $record->sub_category_id;

                        ?>

                        <select ng-init="sub_category_id={id:<?php echo e($val); ?> }" name="sub_category_id" ng-model="sub_category_id" class="form-control select2" ng-options="item.id as item.sub_category for item in sub_categories track by item.id" required="true">

                          <option value="">Select</option>  

                        </select>




                          <div class="validation-error" ng-messages="formValidate.sub_category_id.$error">

                                <?php echo getValidationMessage(); ?>



                            </div>

                 </div>
                 
                 <div class="form-group">

                    <?php echo Form::label('bit_event_category', getPhrase('Bit Event Category'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php
                        $val=old('bit_event_category');
                        if ($record)
                         $val = $record->bit_event_category;

                        $selected = null;
                        if($record)
                        $selected = $record->bit_event_category;      
                    ?>

                    

                    <?php echo e(Form::select('bit_event_category', ["1"=> "Open", "2"=> "Close"] , $selected, ['placeholder' => getPhrase('select'),'class'=>'form-control select2',

                            'ng-model'=>'bit_event_category',

                            'required'=> 'true',

                            'ng-init'=>'bit_event_category="'.$val.'"',

                            'ng-change'=> 'getEventCategories(bit_event_category)', 

                            'ng-class'=>'{"has-error": formValidate.bit_event_category.$touched && formValidate.bit_event_category.$invalid}'

                         ])); ?>



                    
                        <div class="validation-error" ng-messages="formValidate.bit_event_category.$error" >

                            <?php echo getValidationMessage(); ?>


                        </div>

                </div>


                <div class="form-group">

                        <label for="name"> <?php echo e(getPhrase('sub_category')); ?> <span class="text-red">*</span></label>


                        <?php 

                        
                        $val=old('close_users_id');
                        if ($record)
                          $val = $record->close_users_id;

                        ?>
                        
                       <select  name="close_users[]"  multiple="multiple"  class="form-control select2 js-example-basic-multiple" >
                        <!--<select class="form-control" multiple="multiple">-->
                        
                          <option value="">Select</option>  

                        </select>
                          <br>
                      
                        <br>

                         
                        <br>
                      
                        <br>

                        <?php echo e(Form::select('close_users[]', $users, null, ['class'=>'form-control select2',
                            
                            'required'=> 'true',

                            'multiple'=> 'true',
                            
                            'ng-init' => '',
                            
                            'ng-options' => 'item.id as item.sub_category for item in close_users track by item.id',

                            'ng-class'=>'{"has-error": formValidate.users.$touched && formValidate.users.$invalid}'

                         ])); ?>





                          <div class="validation-error" ng-messages="formValidate.sub_category_id.$error">

                                <?php echo getValidationMessage(); ?>



                            </div>

                 </div>




                <div class="form-group">
                    <?php echo Form::label('start_date', getPhrase('start_date'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php 

                        $val=old('start_date');
                        if (isset($record->start_date) && $record->start_date!='')
                          $val = date('m/d/Y H:i:s',strtotime($record->start_date));
                    ?>



                    <?php echo e(Form::text('start_date', $value = $val, $attributes = 

                    array('class' => 'form-control', 

                    'id' => 'datetimepicker6',

                    'placeholder'=>'Start Date and Time',

                    'ng-model' => 'start_date', 

                    'ng-init'=>'start_date="'.$val.'"',

                  
                    ))); ?>



                </div>


                <div class="form-group">
                    <?php echo Form::label('end_date', getPhrase('end_date'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php 

                        $val=old('end_date');
                        if (isset($record->end_date) && $record->end_date!='')
                          $val = date('m/d/Y H:i:s',strtotime($record->end_date));
                    ?>



                    <?php echo e(Form::text('end_date', $value = $val, $attributes = 

                    array('class' => 'form-control', 

                    'id' => 'datetimepicker7',

                    'placeholder'=>'End Date and Time',

                    'ng-model' => 'end_date', 

                    'ng-init'=>'end_date="'.$val.'"',

                  
                    ))); ?>


                </div>







                 <div class="form-group">
                    <?php echo Form::label('live_auction_date', getPhrase('live_auction_date'), ['class' => 'control-label']); ?>


                    <?php 

                        $val=old('live_auction_date');
                        if (isset($record->live_auction_date) && $record->live_auction_date!='')
                          $val = date('m/d/Y',strtotime($record->live_auction_date));
                    ?>



                    <?php echo e(Form::text('live_auction_date', $value = $val, $attributes = 

                    array('class' => 'form-control', 

                    'id' => 'datepicker',

                    'placeholder'=>'Live Auction Date',

                    'ng-model' => 'live_auction_date', 

                    'ng-init'=>'live_auction_date="'.$val.'"',

                  
                    ))); ?>


                </div>

                <div class="form-group">
                    <?php echo Form::label('live_auction_start_time', getPhrase('live_auction_start_time'), ['class' => 'control-label']); ?>


                    <?php 

                        $val=old('live_auction_start_time');
                        if (isset($record->live_auction_start_time) && $record->live_auction_start_time!='')
                          $val = $record->live_auction_start_time;
                    ?>



                    <?php echo e(Form::text('live_auction_start_time', $value = $val, $attributes = 

                    array('class' => 'form-control', 

                    'id' => 'timepicker1',

                    'placeholder'=>'Live Auction Start Time',

                    'ng-model' => 'live_auction_start_time', 

                    'ng-init'=>'live_auction_start_time="'.$val.'"',

                    ))); ?>


                </div>


                <div class="form-group">
                    <?php echo Form::label('live_auction_end_time', getPhrase('live_auction_end_time'), ['class' => 'control-label']); ?>


                    <?php 

                        $val=old('live_auction_end_time');
                        if (isset($record->live_auction_end_time) && $record->live_auction_end_time!='')
                          $val = $record->live_auction_end_time;
                    ?>



                    <?php echo e(Form::text('live_auction_end_time', $value = $val, $attributes = 

                    array('class' => 'form-control', 

                    'id' => 'timepicker2',

                    'placeholder'=>'Live Auction End Time',

                    'ng-model' => 'live_auction_end_time', 

                    'ng-init'=>'live_auction_end_time="'.$val.'"',

                  
                    ))); ?>


                </div>














                  <div class="form-group">

                    <?php echo Form::label('reserve_price', getPhrase('reserve_price'), ['class' => 'control-label']); ?>

                    (<?php echo e($currency_code); ?>)
                    <span class="text-red">*</span>

                    <?php
                        $val=old('reserve_price');
                        if ($record)
                         $val = $record->reserve_price;
    
                    ?>

                    <?php echo e(Form::text('reserve_price', old('reserve_price'), $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Reserve Price',

                    'ng-model' => 'reserve_price', 

                    'required' => 'true',

                    'ng-pattern' => getRegexPattern("price"),

                    'ng-init'=>'reserve_price="'.$val.'"',

                    'ng-class'=>'{"has-error": formValidate.reserve_price.$touched && formValidate.reserve_price.$invalid}',

                    ))); ?>


                    <div class="validation-error" ng-messages="formValidate.reserve_price.$error" >

                            <?php echo getValidationMessage(); ?>


                            <?php echo getValidationMessage('pattern'); ?>


                    </div>

                </div>
   

                <div class="form-group">

                    <?php echo Form::label('minimum_bid', getPhrase('minimum_bid'), ['class' => 'control-label']); ?>

                    (<?php echo e($currency_code); ?>)
                   
                    <?php
                        $val=old('minimum_bid');
                        if ($record)
                         $val = $record->minimum_bid;
    
                    ?>

                    <?php echo e(Form::text('minimum_bid', old('minimum_bid'), $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Mimimum Bid',

                    'ng-model' => 'minimum_bid', 

                    'ng-pattern' => getRegexPattern("price"),

                    'ng-init'=>'minimum_bid="'.$val.'"',

                    'ng-class'=>'{"has-error": formValidate.minimum_bid.$touched && formValidate.minimum_bid.$invalid}',

                    ))); ?>


                    <div class="validation-error" ng-messages="formValidate.minimum_bid.$error" >

                           
                            <?php echo getValidationMessage('pattern'); ?>


                    </div>

                </div>



                <div class="form-group">

                    <?php echo Form::label('is_it_bid_increment', getPhrase('is_it_bid_increment'), ['class' => 'control-label']); ?>


                    <div class="form-group row">
                        <div class="col-md-6">
                        <?php echo e(Form::radio('is_bid_increment', 0, false, array('id'=>'bid_increment_no', 'name'=>'is_bid_increment'))); ?>

                            
                            <label for="bid_increment_no"> <span class="fa-stack radio-button"> <i class="mdi mdi-check active"></i> </span> <?php echo e(getPhrase('Reverse Auction')); ?></label> 
                        </div>
                        <div class="col-md-6">
                        <?php echo e(Form::radio('is_bid_increment', 1, true, array('id'=>'bid_increment_yes', 'name'=>'is_bid_increment'))); ?>

                            <label for="bid_increment_yes"> <span class="fa-stack radio-button"> <i class="mdi mdi-check active"></i> </span> <?php echo e(getPhrase('English')); ?> 
                            </label>
                        </div>
                    </div>
                </div>


                <div class="form-group">

                    <?php echo Form::label('bid_increment', getPhrase('bid_increment'), ['class' => 'control-label']); ?>

                    (<?php echo e($currency_code); ?>)
                   
                    <?php
                        $val=old('bid_increment');
                        if ($record)
                         $val = $record->bid_increment;
    
                    ?>

                    <?php echo e(Form::text('bid_increment', old('bid_increment'), $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Bid Increment',

                    'ng-model' => 'bid_increment', 

                  
                    'ng-init'=>'bid_increment="'.$val.'"',

                    'ng-pattern' => getRegexPattern("price"),

                    'ng-class'=>'{"has-error": formValidate.bid_increment.$touched && formValidate.bid_increment.$invalid}',

                    ))); ?>


                    <div class="validation-error" ng-messages="formValidate.bid_increment.$error" >

                            <?php echo getValidationMessage('pattern'); ?>


                    </div>

                </div>




               


                 <div class="form-group">

                    <?php echo Form::label('is_buynow', getPhrase('is_it_buy_now_item'), ['class' => 'control-label']); ?>


                    <div class="form-group row">
                        <div class="col-md-6">
                        <?php echo e(Form::radio('is_buynow', 0, false, array('id'=>'buynow_no', 'name'=>'is_buynow'))); ?>

                            
                            <label for="buynow_no"> <span class="fa-stack radio-button"> <i class="mdi mdi-check active"></i> </span> <?php echo e(getPhrase('No')); ?></label> 
                        </div>
                        <div class="col-md-6">
                        <?php echo e(Form::radio('is_buynow', 1, true, array('id'=>'buynow_yes', 'name'=>'is_buynow'))); ?>

                            <label for="buynow_yes"> <span class="fa-stack radio-button"> <i class="mdi mdi-check active"></i> </span> <?php echo e(getPhrase('Yes')); ?> 
                            </label>
                        </div>
                    </div>
                </div>


                <div class="form-group">

                    <?php echo Form::label('buy_now_price', getPhrase('buy_now_price'), ['class' => 'control-label']); ?>

                    (<?php echo e($currency_code); ?>)
                   
                    <?php
                        $val=old('buy_now_price');
                        if ($record)
                         $val = $record->buy_now_price;
    
                    ?>

                    <?php echo e(Form::text('buy_now_price', old('buy_now_price'), $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Buy Now Price',

                    'ng-model' => 'buy_now_price', 

                   
                    'ng-pattern' => getRegexPattern("price"),

                    'ng-init'=>'buy_now_price="'.$val.'"',

                    'ng-class'=>'{"has-error": formValidate.buy_now_price.$touched && formValidate.buy_now_price.$invalid}',

                    ))); ?>


                    <div class="validation-error" ng-messages="formValidate.buy_now_price.$error" >

                            
                            <?php echo getValidationMessage('pattern'); ?>


                    </div>

                </div>


                <div class="form-group">

                    <?php echo Form::label('description', getPhrase('specification'), ['class' => 'control-label']); ?>


                     <span class="text-red">*</span>

                      <?php
                        $val=old('description');
                        if ($record)
                         $val = $record->description;
    
                    ?>
                   
                    <?php echo e(Form::textarea('description', old('description'), $attributes = 

                    array('class' => 'form-control ckeditor', 

                    'placeholder' => 'Description',

                    'ng-model' => 'description',

                    'required' => 'true',

                    'ng-init'=>'description="'.$val.'"',

                    'ng-class'=>'{"has-error": formValidate.description.$touched && formValidate.description.$invalid}',

                    ))); ?>



                    
                    <div class="validation-error" ng-messages="formValidate.description.$error" >

                        <?php echo getValidationMessage(); ?>


                    </div>

                </div>
                
                <div class="form-group">

                    <?php echo Form::label('line_item1', getPhrase('Line Item 1'), ['class' => 'control-label']); ?>

                   
                    <?php
                        $val=old('line_item1');
                        if ($record)
                         $val = $record->line_item1;
    
                    ?>

                    <?php echo e(Form::text('line_item1', old('line_item1'), $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Line Item 1',

                    'ng-model' => 'line_item1', 

                    'ng-init'=>'line_item1="'.$val.'"',
                    
                    'ng-maxlength' => '75',

                    'ng-class'=>'{"has-error": formValidate.line_item1.$touched && formValidate.line_item1.$invalid}',

                    ))); ?>


                    <div class="validation-error" ng-messages="formValidate.line_item1.$error" >
                    
                        <?php echo getValidationMessage('pattern'); ?>

                    </div>

                </div>
                <div class="form-group">

                    <?php echo Form::label('line_item2', getPhrase('Line Item 2'), ['class' => 'control-label']); ?>

                   
                    <?php
                        $val=old('line_item2');
                        if ($record)
                         $val = $record->line_item2;
    
                    ?>

                    <?php echo e(Form::text('line_item2', old('line_item2'), $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Line Item 2',

                    'ng-model' => 'line_item2', 

                    'ng-init'=>'line_item2="'.$val.'"',
                    
                    'ng-maxlength' => '75',

                    'ng-class'=>'{"has-error": formValidate.line_item2.$touched && formValidate.line_item2.$invalid}',

                    ))); ?>


                    <div class="validation-error" ng-messages="formValidate.line_item2.$error" >
                    
                    <?php echo getValidationMessage('pattern'); ?>

                    </div>

                </div>
                <div class="form-group">

                    <?php echo Form::label('line_item3', getPhrase('Line Item 3'), ['class' => 'control-label']); ?>

                   
                    <?php
                        $val=old('line_item3');
                        if ($record)
                         $val = $record->line_item3;
    
                    ?>

                    <?php echo e(Form::text('line_item3', old('line_item3'), $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Line Item 3',

                    'ng-model' => 'line_item3', 

                    'ng-init'=>'line_item3="'.$val.'"',
                    
                    'ng-maxlength' => '75',

                    'ng-class'=>'{"has-error": formValidate.line_item3.$touched && formValidate.line_item3.$invalid}',

                    ))); ?>


                    <div class="validation-error" ng-messages="formValidate.line_item3.$error" >
                    <?php echo getValidationMessage('pattern'); ?>


                    </div>

                </div>
                <div class="form-group">

                    <?php echo Form::label('line_item4', getPhrase('Line Item 4'), ['class' => 'control-label']); ?>

                   
                    <?php
                        $val=old('line_item4');
                        if ($record)
                         $val = $record->line_item4;
    
                    ?>

                    <?php echo e(Form::text('line_item4', old('line_item4'), $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Line Item 4',

                    'ng-model' => 'line_item4', 

                    'ng-init'=>'line_item4="'.$val.'"',
                    
                    'ng-maxlength' => '75',

                    'ng-class'=>'{"has-error": formValidate.line_item4.$touched && formValidate.line_item4.$invalid}',

                    ))); ?>


                    <div class="validation-error" ng-messages="formValidate.line_item4.$error" >
                    <?php echo getValidationMessage('pattern'); ?>


                    </div>

                </div>
                <div class="form-group">

                    <?php echo Form::label('line_item5', getPhrase('Line Item 5'), ['class' => 'control-label']); ?>

                   
                    <?php
                        $val=old('line_item5');
                        if ($record)
                         $val = $record->line_item5;
    
                    ?>

                    <?php echo e(Form::text('line_item5', old('line_item5'), $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Line Item 5',

                    'ng-model' => 'line_item5', 

                    'ng-init'=>'line_item5="'.$val.'"',
                    
                    'ng-maxlength' => '75',

                    'ng-class'=>'{"has-error": formValidate.line_item5.$touched && formValidate.line_item5.$invalid}',

                    ))); ?>


                    <div class="validation-error" ng-messages="formValidate.line_item5.$error" >
                    <?php echo getValidationMessage('pattern'); ?>


                    </div>

                </div>


            </div>



            <div class="col-xs-6">  

                <div class="form-group">

                    <?php echo Form::label('international_shipping', getPhrase('international_shipping'), ['class' => 'control-label']); ?>


                    <div class="form-group row">
                        <div class="col-md-6">
                        <?php echo e(Form::radio('international_shipping', 0, true, array('id'=>'yes', 'name'=>'international_shipping'))); ?>

                            
                            <label for="yes"> <span class="fa-stack radio-button"> <i class="mdi mdi-check active"></i> </span> <?php echo e(getPhrase('No')); ?></label> 
                        </div>
                        <div class="col-md-6">
                        <?php echo e(Form::radio('international_shipping', 1, false, array('id'=>'no', 'name'=>'international_shipping'))); ?>

                            <label for="no"> <span class="fa-stack radio-button"> <i class="mdi mdi-check active"></i> </span> <?php echo e(getPhrase('Yes')); ?> 
                            </label>
                        </div>
                    </div>

                </div>

                <!-- -->
                <div class="form-group">

                    <?php echo Form::label('quantity', getPhrase('quantity'), ['class' => 'control-label']); ?>

                   
                   
                    <?php
                        $val=old('quantity');
                        if ($record)
                         $val = $record->quantity;
    
                    ?>

                    <?php echo e(Form::text('quantity', old('quantity'), $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'quantity',

                    'ng-model' => 'quantity', 

                   

                    'ng-init'=>'quantity="'.$val.'"',

                    'ng-class'=>'{"has-error": formValidate.quantity.$touched && formValidate.quantity.$invalid}',

                    ))); ?>


                    <div class="validation-error" ng-messages="formValidate.quantity.$error" >

                            
                            <?php echo getValidationMessage('pattern'); ?>


                    </div>

                </div>
                
                <div class="form-group">

                    <?php echo Form::label('unit_of_measurement', getPhrase('Unit of Measurement'), ['class' => 'control-label']); ?>

                   
                   
                    <?php
                        $val=old('unit_of_measurement');
                        if ($record)
                         $val = $record->unit_of_measurement;
    
                    ?>

                    <?php echo e(Form::text('unit_of_measurement', old('unit_of_measurement'), $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Unit of Measurement',

                    'ng-model' => 'unit_of_measurement', 


                    'ng-init'=>'unit_of_measurement="'.$val.'"',

                    'ng-class'=>'{"has-error": formValidate.unit_of_measurement.$touched && formValidate.unit_of_measurement.$invalid}',

                    ))); ?>


                    <div class="validation-error" ng-messages="formValidate.unit_of_measurement.$error" >

                            
                            <?php echo getValidationMessage('pattern'); ?>


                    </div>

                </div>
                
                 <div class="form-group">

                    <?php echo Form::label('unit_price', getPhrase('Unit Price'), ['class' => 'control-label']); ?>

                   
                   
                    <?php
                        $val=old('unit_price');
                        if ($record)
                         $val = $record->unit_price;
    
                    ?>

                    <?php echo e(Form::text('unit_price', old('unit_price'), $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Unit Price',

                    'ng-model' => 'unit_price', 


                    'ng-init'=>'unit_price="'.$val.'"',

                    'ng-class'=>'{"has-error": formValidate.unit_price.$touched && formValidate.unit_price.$invalid}',

                    ))); ?>


                    <div class="validation-error" ng-messages="formValidate.unit_price.$error" >

                            
                            <?php echo getValidationMessage('pattern'); ?>


                    </div>

                </div>
                
                 <div class="form-group">

                    <?php echo Form::label('total_price', getPhrase('Total Price'), ['class' => 'control-label']); ?>

                   
                   
                    <?php
                        $val=old('total_price');
                        if ($record)
                         $val = $record->total_price;
    
                    ?>

                    <?php echo e(Form::text('total_price', old('total_price'), $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'total Price',

                    'ng-model' => 'total_price', 


                    'ng-init'=>'total_price="'.$val.'"',

                    'ng-class'=>'{"has-error": formValidate.total_price.$touched && formValidate.total_price.$invalid}',

                    ))); ?>


                    <div class="validation-error" ng-messages="formValidate.total_price.$error" >

                            
                            <?php echo getValidationMessage('pattern'); ?>


                    </div>

                </div>
                  <!-- -->
                <div class="form-group">

                    <?php echo Form::label('shipping_conditions', getPhrase('payment_and_shipping'), ['class' => 'control-label']); ?>


                    <?php
                        $val=old('shipping_conditions');
                        if ($record)
                         $val = $record->shipping_conditions;
    
                    ?>

                     
                    <?php echo e(Form::textarea('shipping_conditions', old('shipping_conditions'), $attributes = 

                    array('class' => 'form-control ckeditor',

                    'ng-model' => 'shipping_conditions',

                     'id'=>'shipping',

                    'ng-init'=>'shipping_conditions="'.$val.'"',


                    ))); ?>



                </div>



                



                <div class="form-group">

                    <?php echo Form::label('shipping_terms', getPhrase('terms'), ['class' => 'control-label']); ?>


                      <?php
                        $val=old('shipping_terms');
                        if ($record)
                         $val = $record->shipping_terms;
    
                    ?>


                    <?php echo e(Form::textarea('shipping_terms', old('shipping_terms'), $attributes = 

                    array('class' => 'form-control ckeditor',

                    'placeholder' => 'Shipping Terms',

                    'id'=>'terms',

                    'ng-model' => 'shipping_terms',


                    'ng-init'=>'shipping_terms="'.$val.'"',
                    
                    ))); ?>




                </div>



                 <div class="form-group">

                    <?php echo Form::label('make_featured', getPhrase('is_featured'), ['class' => 'control-label']); ?>


                    <div class="form-group row">
                        <div class="col-md-6">
                        <?php echo e(Form::radio('make_featured', 0, false, array('id'=>'featured_no', 'name'=>'make_featured'))); ?>

                            
                            <label for="featured_no"> <span class="fa-stack radio-button"> <i class="mdi mdi-check active"></i> </span> <?php echo e(getPhrase('No')); ?></label> 
                        </div>
                        <div class="col-md-6">
                        <?php echo e(Form::radio('make_featured', 1, true, array('id'=>'featured_yes', 'name'=>'make_featured'))); ?>

                            <label for="featured_yes"> <span class="fa-stack radio-button"> <i class="mdi mdi-check active"></i> </span> <?php echo e(getPhrase('Yes')); ?> 
                            </label>
                        </div>
                    </div>
                </div>


                <?php if(checkRole(['admin'])): ?>
                <div class="form-group">

                    <?php echo Form::label('auction_status', getPhrase('auction_status'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php
                        $val=old('auction_status');
                        if ($record)
                         $val = $record->auction_status;

                        $selected = null;
                        if($record)
                        $selected = $record->auction_status;      
                    ?>

                    

                    <?php echo e(Form::select('auction_status', auctionstatusoptions() , $selected, ['placeholder' => getPhrase('select'),'class'=>'form-control select2',

                            'ng-model'=>'auction_status',

                            'required'=> 'true',

                            'ng-init'=>'auction_status="'.$val.'"',

                            'ng-class'=>'{"has-error": formValidate.auction_status.$touched && formValidate.auction_status.$invalid}'

                         ])); ?>



                    
                        <div class="validation-error" ng-messages="formValidate.auction_status.$error" >

                            <?php echo getValidationMessage(); ?>


                        </div>

                </div>




                 <div class="form-group">

                    <?php echo Form::label('admin_status', getPhrase('admin_status'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php
                        $val=old('admin_status');
                        if ($record)
                         $val = $record->admin_status;

                        $selected = null;
                        if($record)
                        $selected = $record->admin_status;      
                    ?>

                    

                    <?php echo e(Form::select('admin_status', adminstatusoptions() , $selected, ['placeholder' => getPhrase('select'),'class'=>'form-control select2',

                            'ng-model'=>'admin_status',

                            'required'=> 'true',

                            'ng-init'=>'admin_status="'.$val.'"',

                            'ng-class'=>'{"has-error": formValidate.admin_status.$touched && formValidate.admin_status.$invalid}'

                         ])); ?>



                    
                        <div class="validation-error" ng-messages="formValidate.admin_status.$error" >

                            <?php echo getValidationMessage(); ?>


                        </div>

                </div>
                <?php endif; ?>



                 <div class="form-group">

                     <?php echo Form::label('image', getPhrase('image'), ['class' => 'control-label']); ?> <b><small style="color:red;">(950x650 for good resolution)</small></b>

                    <div class="row"> 

                       <div class="col-md-6">

                        <?php echo Form::file('image', array('id'=>'image_input', 'accept'=>'.png,.jpg,.jpeg')); ?>


                        </div>

                        <?php if(isset($record) && $record) { 

                              if($record->image!='') {

                            ?>

                        <div class="col-md-6">

                            <img class="auction-create-img" src="<?php echo e(getAuctionImage($record->image,'auction')); ?>" alt="<?php echo e($record->title); ?>"/>

                        </div>

                        <?php } } ?>

                     </div>   

                </div>



               <div class="form-group pull-right">

					<button class="btn btn-success" ng-disabled='!formValidate.$valid'><?php echo e(getPhrase('save')); ?></button>

				</div>

			</div>

</div>


                