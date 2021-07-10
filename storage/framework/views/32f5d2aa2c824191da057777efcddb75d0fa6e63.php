


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

            <a href="/employees/create" class="btn btn-info"> Add New </span></a>

                        <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Designation</th>
                                        <th>Mobile</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $slave_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $single_slave_usres): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($single_slave_usres->name); ?></td>
                                        <td><?php echo e($single_slave_usres->email); ?></td>
                                        <td><?php echo e($single_slave_usres->name); ?></td>
                                        <td><?php echo e($single_slave_usres->phone); ?></td>
                                        <td><?php echo e($single_slave_usres->role[0]->display_name); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                        </table>




                      



                    </div>



                </div>

              

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