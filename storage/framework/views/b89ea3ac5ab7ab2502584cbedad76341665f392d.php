<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/auth/login.css')); ?>">

<div class="auth-container">
    <div class="image-box">
        <img src="https://img.freepik.com/fotos-premium/uma-motocicleta-vermelha-e-mostrada-no-escuro_796580-1891.jpg?semt=ais_hybrid" alt="Bem-vindo">
        <h2>Bem-vindo novamente!</h2>
        <p>Pé na estrada!</p>
    </div>
    <div class="form-box">
        <h2 id="login-title">Entrar</h2> <!-- Adicionando o título "Entrar" -->
        <form action="<?php echo e(route('login')); ?>" method="POST">
            <?php echo csrf_field(); ?>
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
            <button type="submit" class="submit-button">Entrar</button>
        </form>
        <a href="<?php echo e(route('register')); ?>" class="auth-link">Não possui uma conta? Registre-se</a>
    </div>
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

<?php echo $__env->make('layouts.header_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junior\Desktop\Downloads\forum-dae5b8243074015230065d40e29b600bfa0d6e88\resources\views/auth/login.blade.php ENDPATH**/ ?>