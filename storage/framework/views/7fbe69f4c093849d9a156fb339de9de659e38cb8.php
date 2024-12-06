<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/home.css')); ?>">

<div class="home-container">
    <section class="intro-section">
        <div class="intro-content">
            <h1>Bem-vindo ao Fórum de Motos Esportivas</h1>
            <p>Conecte-se com outros entusiastas de motos esportivas, compartilhe experiências e informações, e fique por dentro das últimas novidades no mundo das motos.</p>
            <a class="btn btn-primary" href="<?php echo e(route('register')); ?>">Cadastre-se Agora</a>
        </div>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://wallpaperaccess.com/full/4243813.jpg" class="d-block w-100" alt="Moto">
                </div>
                <div class="carousel-item">
                    <img src="https://i.pinimg.com/736x/a8/3a/9f/a83a9fea4412f118ded2cfe237b7ec23.jpg" class="d-block w-100" alt="Moto">
                </div>
                <div class="carousel-item">
                    <img src="https://www.motonline.com.br/noticia/wp-content/uploads/2022/03/daytona-675-ano-2009-1.png" class="d-block w-100" alt="Moto Esportiva 3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section class="models-section">
        <h2>Modelos Populares</h2>
        <div class="models">
            <div class="model">
                <img src="https://th.bing.com/th/id/R.b65c31d597ec46668ea37345c5615c42?rik=hZbXbkfH5bWrRg&pid=ImgRaw&r=0" alt="Modelo 1">
                <h3>Yamaha R15</h3>
                <p>uma motocicleta esportiva de alta performance, projetada para oferecer agilidade, velocidade e precisão. </p>
            </div>
            <div class="model">
                <img src="https://images.pexels.com/photos/1068478/pexels-photo-1068478.png?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="Modelo 2">
                <h3>Kawasaki z1000</h3>
                <p>A Kawasaki Z1000 é uma motocicleta naked de alto desempenho, com um motor 4 cilindros em linha de 1.043 cc, oferecendo aproximadamente 142 cavalos de potência.</p>
            </div>
            <div class="model">
                <img src="https://th.bing.com/th/id/R.af3ff95fa77c1b1077f9e7ba43906493?rik=vvxL14lgcsRMcQ&riu=http%3a%2f%2fs1.paultan.org%2fimage%2f2019%2f06%2f2019-Ducati-Panigale-V4-R-11-1200x799.jpg&ehk=I7PqrkyAR8uw4lLVvg9WVRqn%2bzhfRsjSokPqA%2bu3uNs%3d&risl=&pid=ImgRaw&r=0" alt="Modelo 3">
                <h3>Ducati Panigale</h3>
                <p>A Ducati Panigale é uma moto esportiva de alta performance, conhecida por seu design agressivo e motor potente.</p>
            </div>
        </div>
    </section>

    <section class="contact-section">
        <h2>Contato</h2>
        <form action="<?php echo e(route('contact')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" id="name" name="name" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="message">Mensagem:</label>
                <textarea id="message" name="message" class="form-input" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junior\Desktop\Downloads\forum-master(f)\resources\views/home.blade.php ENDPATH**/ ?>