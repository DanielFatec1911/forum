<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/category/showCategory.css')); ?>">

<div class="category-container">
    <h1 class="category-title"><?php echo e($category->name); ?></h1>
    <p class="category-description"><?php echo e($category->description); ?></p>

    <div class="posts-container">
        <?php $__currentLoopData = $category->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="post-item">
                <h2 class="post-title"><?php echo e($post->title); ?></h2>
                <p class="post-meta">
                    <strong>Autor:</strong> <a href="<?php echo e(route('profile', ['id' => $post->user->id])); ?>" class="post-author"><?php echo e($post->user->name ?? 'Autor Desconhecido'); ?></a>
                    <strong>Tags:</strong>
                    <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="tag"><?php echo e($tag->name); ?></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </p>
                <div class="post-content">
                    <?php echo e(Str::limit($post->content, 150)); ?>

                </div>
                <?php if($post->image): ?>
                    <img src="<?php echo e(asset($post->image)); ?>" alt="<?php echo e($post->title); ?>" class="post-image">
                <?php endif; ?>
                <a href="<?php echo e(route('showPost', ['id' => $post->id])); ?>" class="read-more">Ler mais</a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junior\Desktop\Downloads\forum-dae5b8243074015230065d40e29b600bfa0d6e88\resources\views/categories/showCategory.blade.php ENDPATH**/ ?>