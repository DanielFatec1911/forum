<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/tag/showTag.css')); ?>">

<div class="container">
    <h1>Posts com a Tag: <?php echo e($tag->name); ?></h1>
    <div class="posts-container">
        <?php $__empty_1 = true; $__currentLoopData = $tag->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="post-item">
                <h2 class="post-title"><?php echo e($post->title); ?></h2>
                <div class="post-meta">
                    <p><strong>Autor:</strong> <?php echo e($post->user->name); ?></p>
                    <p><strong>Categoria:</strong> <?php echo e($post->category->name); ?></p>
                </div>
                <?php if($post->image): ?>
                    <img src="<?php echo e(asset($post->image)); ?>" alt="<?php echo e($post->title); ?>" class="post-image">
                <?php endif; ?>
                <div class="post-content">
                    <p><?php echo e($post->description); ?></p>
                    <p><?php echo e($post->content); ?></p>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="empty-message">Nenhum post encontrado para esta tag.</p>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junior\Desktop\Downloads\forum-master(f)\resources\views/tags/showTag.blade.php ENDPATH**/ ?>