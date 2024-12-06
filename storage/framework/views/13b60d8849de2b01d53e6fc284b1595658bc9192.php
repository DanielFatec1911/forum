<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/category/listAllCategories.css')); ?>">

<div class="categories-container">
    <h1>Todas as Categorias</h1>
    <div class="categories-list">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="category-item">
                <h2>
                    <a href="<?php echo e(route('showCategory', ['idCategory' => $category->idCategory])); ?>"><?php echo e($category->name); ?></a>
                </h2>
                <p><?php echo e(\Illuminate\Support\Str::limit($category->description, 150, $end='...')); ?></p>
                <a href="<?php echo e(route('editCategory', ['idCategory' => $category->idCategory])); ?>" class="button button-edit">Editar</a>
                <form action="<?php echo e(route('deleteCategory', ['idCategory' => $category->idCategory])); ?>" method="POST" class="inline-form">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="button button-delete">Deletar</button>
                </form>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junior\Desktop\Downloads\forum-dae5b8243074015230065d40e29b600bfa0d6e88\resources\views/categories/listAllCategories.blade.php ENDPATH**/ ?>