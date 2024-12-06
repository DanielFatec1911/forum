<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/topic/showTopic.css')); ?>">

<div class="topic-container">
    <div class="topic-header">
        <h1><?php echo e($topic->title); ?></h1>
        <p class="topic-meta">Postado por <?php echo e($topic->user->name); ?> em <?php echo e($topic->created_at->format('d M, Y')); ?></p>
    </div>
    <div class="topic-content">
        <p><?php echo e($topic->content); ?></p>
    </div>

    <div class="comments-section">
        <h2>Comentários</h2>
        <?php $__currentLoopData = $topic->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="comment-box">
                <div class="comment-header">
                    <strong><?php echo e($comment->user->name); ?></strong> disse:
                    <span class="comment-date"><?php echo e($comment->created_at->format('d M, Y - H:i')); ?></span>
                </div>
                <div class="comment-content">
                    <p><?php echo e($comment->content); ?></p>
                </div>
                <div class="comment-actions">
                    <a href="<?php echo e(route('editComment', ['topicId' => $topic->id, 'id' => $comment->id])); ?>" class="button button-edit">Editar</a>
                    <form action="<?php echo e(route('deleteComment', ['topicId' => $topic->id, 'id' => $comment->id])); ?>" method="POST" class="inline-form">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="button button-delete">Deletar</button>
                    </form>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="comment-create-section">
        <h2>Adicionar Comentário</h2>
        <form action="<?php echo e(route('storeComment', ['topicId' => $topic->id])); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="content">Comentário:</label>
                <textarea id="content" name="content" class="form-input" rows="3" required></textarea>
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
            <button type="submit" class="submit-button">Adicionar Comentário</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junior\Desktop\Downloads\forum-dae5b8243074015230065d40e29b600bfa0d6e88\resources\views/topics/showTopic.blade.php ENDPATH**/ ?>