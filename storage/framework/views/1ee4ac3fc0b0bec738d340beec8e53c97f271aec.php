<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/post/listAllPosts.css')); ?>">

<div class="container">
    <h1>Lista de Posts</h1>
    <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="post-item">
            <div class="post-inner">
                <a href="<?php echo e(route('showPost', ['id' => $post->id])); ?>" class="post-title-link">
                    <h2 class="post-title"><?php echo e($post->title); ?></h2>
                </a>
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
                <div class="post-actions">
                    <a href="<?php echo e(route('editPost', ['id' => $post->id])); ?>" class="button button-edit">Editar</a>
                    <form action="<?php echo e(route('deletePost', ['id' => $post->id])); ?>" method="POST" class="inline-form">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="button button-delete">Deletar</button>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p>Nenhum post encontrado.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junior\Desktop\Downloads\forum-dae5b8243074015230065d40e29b600bfa0d6e88\resources\views/posts/listAllPosts.blade.php ENDPATH**/ ?>