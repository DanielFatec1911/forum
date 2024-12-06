<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/category/createCategory.css')); ?>">

<div class="form-container">
    <h1 class="form-title">Editar Categoria</h1>
    <form action="<?php echo e(route('updateCategory', ['idCategory' => $category->idCategory])); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="form-group">
            <label for="name" class="form-label">Nome:</label>
            <input type="text" id="name" name="name" class="form-input" value="<?php echo e($category->name); ?>" required>
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
        <div class="form-group">
            <label for="description" class="form-label">Descrição:</label>
            <textarea id="description" name="description" class="form-input" rows="5" required><?php echo e($category->description); ?></textarea>
            <?php $__errorArgs = ['description'];
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
        <button type="submit" class="submit-button">Atualizar Categoria</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junior\Desktop\Downloads\forum-master(f)\resources\views/categories/editCategory.blade.php ENDPATH**/ ?>