<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/user/listAllUsers.css')); ?>">

<div class="containerAllUsers" id="containerAllUsers">
    <div class="user-list" id="content">
        <h2 class="login-title">Lista de Usuários</h2>
        <div class="row">
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($user->name); ?> (ID: <?php echo e($user->id); ?>)</h5>
                            <p class="card-text"><?php echo e($user->email); ?></p>
                            </a>
                            <a href="<?php echo e(route('deleteUser', $user->id)); ?>" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#banModal-<?php echo e($user->id); ?>">
                                <i class="fa-solid fa-user-slash"></i> Banir
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Modal de Banimento -->
                <div class="modal fade" id="banModal-<?php echo e($user->id); ?>" tabindex="-1" aria-labelledby="banModalLabel-<?php echo e($user->id); ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="banModalLabel-<?php echo e($user->id); ?>">Banir Usuário</h5>
                                <i class="fas fa-times" data-bs-dismiss="modal" aria-label="Close" id="close-btn"></i>
                            </div>
                            <div class="modal-body">
                                Você tem certeza que deseja banir este usuário?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">
                                    <i class="fa-solid fa-rotate-left"></i> Voltar
                                </button>
                                <form action="<?php echo e(route('deleteUser', $user->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa-solid fa-user-slash"></i> Confirmar Banimento
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junior\Desktop\Downloads\forum-master(f)\resources\views/users/listAllUsers.blade.php ENDPATH**/ ?>