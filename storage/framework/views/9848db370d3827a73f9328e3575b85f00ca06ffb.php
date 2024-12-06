<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/topic/listAllTopics.css')); ?>">

<div class="topics-container">
    <h1>Todos os Tópicos</h1>
    <div class="topics-list">
        <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="topic-item">
                <h2>
                    <a href="<?php echo e(route('showTopic', ['id' => $topic->id])); ?>"><?php echo e($topic->title); ?></a>
                </h2>
                <p><?php echo e(\Illuminate\Support\Str::limit($topic->description, 150, $end='...')); ?></p>
                <a href="<?php echo e(route('editTopicForm', ['id' => $topic->id])); ?>" class="button">Editar</a>
                <form action="<?php echo e(route('deleteTopic', ['id' => $topic->id])); ?>" method="POST" class="inline-form">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="button button-delete">Deletar</button>
                </form>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junior\Desktop\Downloads\forum-master(f)\resources\views/topics/listAllTopics.blade.php ENDPATH**/ ?>