<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="<?php echo e(asset('imagens/icone_moto.png')); ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendor/font-awesome/css/all.min.css')); ?>">
    <script src="<?php echo e(asset('js/sidebar.js')); ?>" defer></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Fórum - Motos Esportivas</title>
</head>
<body>
    <div id="app">
        <?php if(Session::has('message-success')): ?>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    toastr.success("<?php echo e(session('message-success')); ?>");
                });
            </script>
        <?php elseif(Session::has('message-error')): ?>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    toastr.error("<?php echo e(session('message-error')); ?>");
                });
            </script>
        <?php endif; ?>
        <header class="navbar">
            <div class="container">
                <i class="fa fa-bars" id="btn-navbar"></i> <!-- Botão de menu no canto superior esquerdo -->
                <div class="logo">
                    <img src="<?php echo e(asset('https://th.bing.com/th/id/OIP.O_ztXCn3lKN2IET_tx1gsAHaHa?rs=1&pid=ImgDetMain')); ?>" alt="Logo">
                </div>
                <div class="navbar-title">
                    <a href="<?php echo e(route('home')); ?>">
                        <h1 class="title">Motos Esportivas</h1>
                    </a>
                </div>
                <div class="navbar-buttons">
                    <?php if(Auth::check()): ?>
                        <a href="<?php echo e(route('profile')); ?>" class="btn btn-profile">
                            <i class="fas fa-user-circle"></i> Meu Perfil
                        </a>
                        <a href="<?php echo e(route('logout')); ?>" class="btn btn-logout">
                            <i class="fas fa-sign-out-alt"></i> Sair
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </header>
        <nav id="sidebar" class="sidebar">
            <ul class="sidebar-content">
                <li><a href="<?php echo e(route('home')); ?>">Início</a></li>
                <li><a href="<?php echo e(route('listAllUsers')); ?>">Tabela Usuários</a></li>
                <li>
                    <a href="#collapsePost" class="dropdown-toggle" data-bs-toggle="collapse">Posts</a>
                    <ul id="collapsePost" class="collapse">
                        <li><a href="<?php echo e(route('listAllPosts')); ?>">Visualizar</a></li>
                        <li><a href="<?php echo e(route('createPost')); ?>">Criar</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#collapseTopicos" class="dropdown-toggle" data-bs-toggle="collapse">Tópicos</a>
                    <ul id="collapseTopicos" class="collapse">
                        <li><a href="<?php echo e(route('listAllTopics')); ?>">Visualizar</a></li>
                        <li><a href="<?php echo e(route('createTopicForm')); ?>">Criar</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#collapseTag" class="dropdown-toggle" data-bs-toggle="collapse">Tags</a>
                    <ul id="collapseTag" class="collapse">
                        <li><a href="<?php echo e(route('listAllTags')); ?>">Visualizar</a></li>
                        <li><a href="<?php echo e(route('createTagForm')); ?>">Criar</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#collapseCategoria" class="dropdown-toggle" data-bs-toggle="collapse">Categorias</a>
                    <ul id="collapseCategoria" class="collapse">
                        <li><a href="<?php echo e(route('listAllCategories')); ?>">Visualizar</a></li>
                        <li><a href="<?php echo e(route('createCategory')); ?>">Criar</a></li>
                    </ul>
                </li>
                <?php if(Auth::check()): ?>
                    <li><a href="<?php echo e(route('profile')); ?>" class="sidebar-user">Meu Perfil</a></li>
                    <li><a href="<?php echo e(route('logout')); ?>" class="sidebar-user">Sair</a></li>
                <?php else: ?>
                    <li><a class="sidebar-user" href="<?php echo e(route('register')); ?>">Cadastre-se</a></li>
                    <li><a class="sidebar-user" href="<?php echo e(route('login')); ?>">Entrar</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <main id="content">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
        <footer>
            <div class="container">
                <p>&copy; 2024 Fórum Motos Esportivas. Todos os direitos reservados.</p>
                <ul class="social-links">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
        </footer>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleButton = document.getElementById('btn-navbar');
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');

            toggleButton.addEventListener('click', function () {
                document.body.classList.toggle('show-sidebar');
            });

            content.addEventListener('click', function () {
                if (document.body.classList.contains('show-sidebar')) {
                    document.body.classList.remove('show-sidebar');
                }
            });
        });
    </script>
</body>
</html>
<?php /**PATH C:\Users\Junior\Desktop\Downloads\forum-dae5b8243074015230065d40e29b600bfa0d6e88\resources\views/layouts/header_footer.blade.php ENDPATH**/ ?>