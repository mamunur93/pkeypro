

<?php $__env->startSection('title', 'New message'); ?>

<?php $__env->startSection('messenger-content'); ?>

    <div class="row">
        <div class="col-md-12">
            

            <?php echo Form::model($topic, ['method' => 'PUT', 'route' => ['messenger.update', $topic->id]]); ?>


            <?php echo $__env->make('admin.messenger.form-partials.fields', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            
            <?php echo Form::close(); ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.messenger.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>