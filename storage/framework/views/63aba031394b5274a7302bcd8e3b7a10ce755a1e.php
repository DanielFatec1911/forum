<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/tag/listAllTags.css')); ?>">

<div class="tags-container">
    <h1>Todas as Tags</h1>
    <div class="tags-list">
        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="tag-item">
                <h2>
                    <a href="<?php echo e(route('showTag', ['id' => $tag->id])); ?>"><?php echo e($tag->name); ?></a>
                </h2>
                <a href="<?php echo e(route('editTagForm', ['id' => $tag->id])); ?>" class="button button-edit">Editar</a>
                <form action="<?php echo e(route('deleteTag', ['id' => $tag->id])); ?>" method="POST" class="inline-form">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="button button-delete">Deletar</button>
                </form>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junior\Desktop\Downloads\forum-dae5b8243074015230065d40e29b600bfa0d6e88\resources\views/tags/listAllTags.blade.php ENDPATH**/ ?>