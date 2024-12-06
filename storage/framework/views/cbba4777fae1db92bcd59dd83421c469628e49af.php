<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/showPost.css')); ?>">

<div class="post-container">
    <h1 class="post-title"><?php echo e($post->title); ?></h1>
    <p class="post-author"><strong>Autor:</strong> <?php echo e($post->user->name ?? 'Autor Desconhecido'); ?></p>
    <p class="post-category"><strong>Categoria:</strong> <?php echo e($post->category->name ?? 'Categoria Desconhecida'); ?></p>
    <p><strong>Tags:</strong>
        <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <span class="tag"><?php echo e($tag->name); ?></span>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </p>
    <div class="post-content-box">
        <div class="post-content">
            <?php echo e($post->content); ?>

        </div>
    </div>
    <?php if($post->image): ?>
        <div class="post-image-container">
            <img src="<?php echo e(asset($post->image)); ?>" alt="<?php echo e($post->title); ?>" class="post-image">
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junior\Desktop\Downloads\forum-master(f)\resources\views/posts/showPost.blade.php ENDPATH**/ ?>