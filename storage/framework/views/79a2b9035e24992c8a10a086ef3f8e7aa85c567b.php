<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/user/profile.css')); ?>">

<div class="profile-container">
    <?php if($user != null): ?>
        <form action="<?php echo e(route('updateProfile')); ?>" method="POST" enctype="multipart/form-data" class="profile-form">
            <h1 class="text-center">Perfil</h1>
            <?php echo csrf_field(); ?>
            <?php echo method_field('put'); ?>

            <!-- Exibir a Imagem de Perfil -->
            <div class="form-group profile-pic-group">
                <img src="<?php echo e(asset('storage/' . $user->photo)); ?>" alt="Foto de Perfil" class="profile-image">
                <input type="file" id="photo" name="photo" class="form-input">
                <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label for="name" class="form-label">Nome:</label>
                <input type="text" id="name" name="name" class="form-input" value="<?php echo e($user->name); ?>" placeholder="<?php echo e($user->name); ?>" required>
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-input" value="<?php echo e($user->email); ?>" placeholder="<?php echo e($user->email); ?>" required>
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Nova Senha:</label>
                <div style="position: relative;">
                    <input type="password" id="password" name="password" class="form-input">
                    <i class="password-toggle fas fa-eye"></i>
                </div>
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <button type="submit" class="submit-button">Atualizar Perfil</button>
            <a href="<?php echo e(route('home')); ?>" class="cancel-button">Cancelar</a>
        </form>
    <?php endif; ?>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const passwordInput = document.getElementById('password');
        const passwordToggle = document.querySelector('.password-toggle');

        passwordToggle.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });

        const profilePicInput = document.getElementById('photo');
        const profileImage = document.querySelector('.profile-image');

        profilePicInput.addEventListener('change', function (event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function (e) {
                profileImage.src = e.target.result;
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junior\Desktop\Downloads\forum-dae5b8243074015230065d40e29b600bfa0d6e88\resources\views/users/profile.blade.php ENDPATH**/ ?>