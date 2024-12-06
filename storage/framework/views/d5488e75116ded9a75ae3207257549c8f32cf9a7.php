<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/comments/editComment.css')); ?>">

<div class="comment-edit-container">
    <h1>Editar Comentário</h1>
    <form action="<?php echo e(route('updateComment', ['topicId' => $topicId, 'id' => $comment->id])); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="form-group">
            <label for="content">Comentário:</label>
            <textarea id="content" name="content" class="form-input" rows="3" required><?php echo e($comment->content); ?></textarea>
            <?php $__errorArgs = ['content'];
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
        <button type="submit" class="submit-button">Atualizar Comentário</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junior\Desktop\Downloads\forum-master(f)\resources\views/comments/editComment.blade.php ENDPATH**/ ?>