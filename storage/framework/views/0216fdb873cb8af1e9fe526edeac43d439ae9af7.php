<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/tag/createTag.css')); ?>">

<div class="form-container">
    <h1>Editar Tag</h1>
    <form action="<?php echo e(route('updateTag', ['id' => $tag->id])); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" class="form-input" value="<?php echo e($tag->name); ?>" required>
            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="error-message"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <button type="submit" class="submit-button">Atualizar Tag</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junior\Desktop\Downloads\forum-dae5b8243074015230065d40e29b600bfa0d6e88\resources\views/tags/editTagForm.blade.php ENDPATH**/ ?>