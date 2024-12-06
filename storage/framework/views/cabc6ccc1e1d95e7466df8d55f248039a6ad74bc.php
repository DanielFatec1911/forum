<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/auth/register.css')); ?>">

<div class="auth-container">
    <div class="form-box">
        <div class="image-box">
            <img src="https://th.bing.com/th/id/R.01984be080fb08a5fef5dce7d186c006?rik=gTT5DO%2friCU4MQ&riu=http%3a%2f%2f2.bp.blogspot.com%2f-LkD2Kt6VRZ0%2fTlJVfB8L1LI%2fAAAAAAAAAXA%2f8L2tCnSaz2Y%2fs1600%2fYamaha%2br1%2bvermelha.jpg&ehk=1EslRY6QR4H3cFjSXYa6DAcGTostCjRc2F6mqsFbCOY%3d&risl=&pid=ImgRaw&r=0" alt="Bem-vindo">
            <h2>Junte-se a Nós!</h2>
            <p>Experimente a emoção de estar no controle e compartilhe sua paixão por motos esportivas com a nossa comunidade!</p>
        </div>
        <div class="form-content">
            <h2 id="register-title">Registrar</h2>
            <form action="<?php echo e(route('register')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" id="name" name="name" class="form-input" value="<?php echo e(old('name')); ?>" required>
                    <?php $__errorArgs = ['name'];
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
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-input" value="<?php echo e(old('email')); ?>" required>
                    <?php $__errorArgs = ['email'];
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
                <div class="form-group">
                    <label for="password">Senha:</label>
                    <div style="position: relative;">
                        <input type="password" id="password" name="password" class="form-input" required>
                        <i class="password-toggle fas fa-eye"></i>
                    </div>
                    <?php $__errorArgs = ['password'];
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
                <div class="form-group">
                    <label for="password_confirmation">Confirme a Senha:</label>
                    <div style="position: relative;">
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" required>
                        <i class="password-toggle fas fa-eye"></i>
                    </div>
                </div>
                <button type="submit" class="submit-button">Registrar</button>
            </form>
            <a href="<?php echo e(route('login')); ?>" class="auth-link">Já possui uma conta? Clique aqui</a>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const passwordInputs = document.querySelectorAll('.form-input[type="password"]');
        const passwordToggles = document.querySelectorAll('.password-toggle');

        passwordToggles.forEach((toggle, index) => {
            toggle.addEventListener('click', function () {
                const type = passwordInputs[index].getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInputs[index].setAttribute('type', type);
                this.classList.toggle('fa-eye-slash');
            });
        });

        const formBox = document.querySelector('.form-box');
        const imageBox = document.querySelector('.image-box');

        [formBox, imageBox].forEach(box => {
            box.addEventListener('mouseenter', function () {
                this.style.transform = 'scale(1.02)';
                this.style.boxShadow = '0 0 20px rgba(255, 0, 0, 0.7)';
            });

            box.addEventListener('mouseleave', function () {
                this.style.transform = 'scale(1)';
                this.style.boxShadow = '0 0 20px rgba(0, 0, 0, 0.7)';
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junior\Desktop\Downloads\forum-dae5b8243074015230065d40e29b600bfa0d6e88\resources\views/auth/register.blade.php ENDPATH**/ ?>