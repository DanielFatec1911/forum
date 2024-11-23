<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="{{ asset('images/masterIcon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/all.min.css') }}">
    <script src="{{ asset('js/sidebar.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <title> Fórum - Laravel </title>
</head>


<body>

    <div id="app">
        @if (Session::has('message-sucess'))
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    toastr.success("{{ session('message-sucess') }}");
                    timeOut: 4000
                });
            </script>
        @elseif (Session::has('message-error'))
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    toastr.success("{{ session('message-error') }}");

                    timeOut: 4000
                });
            </script>
        @endif
        <header>
        <div class="box-img-header">
            <img class="img-logo" src="https://th.bing.com/th/id/R.8a3768f757167ad5cf8ed0eade0ad482?rik=fD6DoF%2bOv8ILlg&pid=ImgRaw&r=0" alt="Logo SW">
        </div>
        <nav>
        <a href='./createPost' class="nav-links">Criar Post</a>
            <a href="#experiences" class="nav-links">Palavras-chave</a>
            <a href="#who-am-i" class="nav-links">Introdução</a>
            <a href="#new" class="nav-links">Posts</a>
            <a href="#contact" class="nav-links">Mais Informações</a>
        </nav>

        <div class="box-btn-actions">
            <a href = './register' class ="btn-action link-action" >Cadastrar</a>
            <a href = './login' class ="btn-action link-action" >Entrar</a>

        </div>


    </header>

            @if (Auth::check())
                <a href="{{ route('listUserById', [Auth::user()->id]) }}" class="nav-icon">
                    <i class="fas fa-user-circle"></i>
                
                </a>
                <a href="logout" class="nav-icon">
                    <i class="fas fa-sign-out-alt"></i>
                    
                </a>
            @else
               
            @endif
        </div>
        <div id="sidebar" class="sidebar">
            <div class="sidebar-header">
                <span class="menu-text">Menu</span>
                <i class="fas fa-times" id="close-btn"></i>
            </div>
            <div class="sidebar-content">
                <a href="{{ route('teste') }}"><i class="fa fa-home"></i> Início</a>
                <a href="{{ route('listAllUsers') }}"><i class="fa-solid fa-users"></i> Lista de usuários</a>

                <a href="#collapsePost" data-bs-toggle="collapse"><i class="fa-solid fa-comments"></i> Posts</a>
                <a class="collapse" id="collapsePost" href="{{ route('listAllPosts') }}"><i
                        class="fa-solid fa-comments"></i> Ver Post</a>
                <a class="collapse" id="collapsePost" href="{{ route('createPost') }}"><i class="fa-solid fa-plus"></i>
                    Criar Posts</a>

                <a data-bs-toggle="collapse" href="#collapseTopicos"><i class="fa-solid fa-arrow-trend-up"></i>
                    Topicos</a>
                <a class="collapse" id="collapseTopicos"><i class="fa-solid fa-arrow-trend-up"></i> Ver Topicos</a>
                <a class="collapse" id="collapseTopicos"><i class="fa-solid fa-plus"></i> Criar Topicos</a>

                <a href="#collapseTag" data-bs-toggle="collapse"><i class="fa-solid fa-hashtag"></i> Tags</a>
                <a class="collapse" id="collapseTag"><i class="fa-solid fa-hashtag"></i> Ver Tags</a>
                <a class="collapse" id="collapseTag"><i class="fa-solid fa-plus"></i> Criar Tags</a>

                @if (Auth::check())
                    <a href='{{ route('listUserById', [Auth::user()->id]) }}' class="sidebar-user"><i
                            class="fa-solid fa-id-card"></i>
                        Meu Perfil
                    </a>
                    <a href='logout' class="sidebar-user">

                        <i class="fa-solid fa-right-from-bracket"></i> Sair
                    </a>
                @else
                    <a class="sidebar-user" href="register">Cadastre-se</a>
                    <a class="sidebar-user"href="login">Entrar</a>
                @endif

                <a href="settings"><i class="fa fa-cog"></i> Configurações</a>
            </div>
        </div>
    </div>

    <main>
        @yield('content')
    </main>
    <footer id="contact">
        <h2 class="title"><strong>Mais Informações</strong></h2>
        
        <div>
            
            <a href="https://www.youtube.com/watch?v=bEx-JkjEYXY" title="Historia da Moto" target="_blank">
                
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="36" height="36">
                <path d="M408.237,234.667l-13.675-41.024c12.715-1.045,25.515-1.643,33.28-1.643c12.501,20.373,61.141,35.157,64,0v-64  c-2.859-35.157-51.499-20.373-64,0c-12.523,0-34.645,1.152-54.037,3.371l-7.701-23.061c-13.025-39.222-49.723-65.679-91.051-65.643  h-28.544c-17.673,0-32,14.327-32,32s14.327,32,32,32h28.544c13.77-0.002,25.997,8.805,30.357,21.867l6.976,20.928  c-10.317,5.849-19.857,12.973-28.395,21.205h-98.133c-12.705-25.697-38.687-42.157-67.349-42.667H75.842c-17.673,0-32,14.327-32,32  s14.327,32,32,32h42.667c4.067-0.111,7.813,2.202,9.536,5.888c1.982,4.054,1.289,8.908-1.749,12.245l-16.981,24.533h-1.472  C48.961,234.737,1.246,282.452,1.176,341.333c1.515,123.733,175.488,146.133,209.387,28.8c10.956-6.645,20.531-15.337,28.203-25.6  l81.237-118.4c3.852-5.132,8.323-9.768,13.312-13.803l13.547,40.661c-48.594,33.656-60.703,100.333-27.047,148.926  c19.733,28.491,52.04,45.663,86.695,46.082C546.434,443.733,547.928,241.195,408.237,234.667z M186.776,307.2  c-6.065,8.031-15.536,12.767-25.6,12.8h-32.939l50.005-72.533c2.97-4.007,5.542-8.294,7.68-12.8h50.624L186.776,307.2z M406.509,384  c-23.564,0-42.667-19.102-42.667-42.667c0-23.564,19.102-42.667,42.667-42.667s42.667,19.103,42.667,42.667  C449.176,364.898,430.073,384,406.509,384z"/>
                </svg>

                  </svg>
             </a>
             <a href="https://suzukimotos.com.br/" title="Suzuki Motos" target="_blank">
        
            <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="36" height="36"><path d="M12,5C2.749,5.3,2.751,18.707,12,19,21.251,18.7,21.249,5.293,12,5Zm0,12c-6.608-.21-6.606-9.791,0-10C18.608,7.21,18.606,16.791,12,17ZM22.611,9.1a10.961,10.961,0,0,0-1.055-2.542,2.006,2.006,0,0,0-.364-2.332L19.778,2.808a2.015,2.015,0,0,0-2.331-.367A9.4,9.4,0,0,0,14.9,1.385,2,2,0,0,0,13,0H11A2,2,0,0,0,9.1,1.387a9.215,9.215,0,0,0-2.55,1.055,1.984,1.984,0,0,0-.913-.22,1.947,1.947,0,0,0-1.416.586L2.808,4.222a2,2,0,0,0-.363,2.331A11.116,11.116,0,0,0,1.386,9.1,2,2,0,0,0,0,11v2a2,2,0,0,0,1.392,1.9,11.67,11.67,0,0,0,1.054,2.538,2,2,0,0,0,.362,2.335l1.414,1.414a2.007,2.007,0,0,0,2.32.37A7.4,7.4,0,0,0,9.1,22.62,2,2,0,0,0,11,24h2a2,2,0,0,0,1.9-1.382,7.407,7.407,0,0,0,2.557-1.056,2.006,2.006,0,0,0,2.319-.37l1.414-1.414a2.024,2.024,0,0,0,.365-2.34A12.085,12.085,0,0,0,22.612,14.9,2,2,0,0,0,24,13V11A2,2,0,0,0,22.611,9.1ZM22,13a.979.979,0,0,0-.171.015c-.243.042-.838.246-1.111,1.225a9.748,9.748,0,0,1-.926,2.255c-.572.995-.28,1.57-.014,1.869l-1.413,1.415a1.106,1.106,0,0,0-.095-.085,1.507,1.507,0,0,0-1.855.156,5.416,5.416,0,0,1-2.13.857,1.481,1.481,0,0,0-1.274,1.148A1,1,0,0,0,13,22H11a1,1,0,0,0-.011-.145,1.479,1.479,0,0,0-1.273-1.147,5.414,5.414,0,0,1-2.131-.859,1.524,1.524,0,0,0-1.855-.155,1.081,1.081,0,0,0-.094.084L4.264,18.319c.224-.254.516-.829-.057-1.825a9.8,9.8,0,0,1-.926-2.255c-.272-.978-.867-1.182-1.11-1.224A.979.979,0,0,0,2,13V11a.929.929,0,0,0,.15-.012c.254-.038.871-.235,1.132-1.231A8.933,8.933,0,0,1,4.19,7.531c.621-1.064.283-1.648.032-1.895l1.429-1.4c.172.163.813.643,1.893-.055a7.308,7.308,0,0,1,2.2-.9C10.933,2.985,11.006,2.206,11,2l2-.026c-.006.232.067,1.011,1.255,1.312a7.329,7.329,0,0,1,2.2.9c1.079.7,1.721.219,1.907.04l1.419,1.409c-.256.252-.594.836.026,1.9a8.942,8.942,0,0,1,.909,2.228c.261,1,.878,1.193,1.132,1.231A.929.929,0,0,0,22,11ZM13,9a1,1,0,0,1-2,0A1,1,0,0,1,13,9Zm2,2a1,1,0,0,1,0,2A1,1,0,0,1,15,11Zm-5,1a1,1,0,0,1-2,0A1,1,0,0,1,10,12Zm3,3a1,1,0,0,1-2,0A1,1,0,0,1,13,15Z"/></svg>

             </a>
             <a href="https://www.motonline.com.br/guia-de-motos/todas-as-marcas?estilo=sport" title="Avaliação de Motos" target="_blank">
            
                  
                <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" width="36" height="36" viewBox="0 0 24 24">
                <path d="m10,14h4.242l8.879-8.879c1.17-1.17,1.17-3.072,0-4.242s-3.072-1.17-4.242,0l-8.879,8.879v4.242ZM20.293,2.293c.391-.391,1.023-.391,1.414,0s.39,1.024,0,1.414l-.896.896-1.414-1.414.896-.896Zm-8.293,8.293l5.983-5.983,1.414,1.414-5.983,5.983h-1.414v-1.414Zm8.847,3.039l3.052,1.756-2.991,5.201-3.051-1.754c-.841.721-1.81,1.279-2.856,1.649v3.522h-6v-3.522c-1.047-.37-2.016-.929-2.856-1.649l-3.051,1.754L.102,15.381l3.052-1.755c-.102-.544-.153-1.088-.153-1.626s.052-1.082.153-1.626L.102,8.619,3.093,3.418l3.051,1.754c.841-.721,1.81-1.279,2.856-1.649V0h6v1.93l-2,2v-1.93h-2v3.036l-.75.193c-1.237.32-2.361.969-3.25,1.877l-.542.554-2.629-1.512-.997,1.734,2.632,1.514-.206.746c-.171.621-.258,1.246-.258,1.857s.087,1.236.258,1.857l.206.746-2.632,1.514.997,1.734,2.629-1.512.542.554c.889.908,2.013,1.557,3.25,1.877l.75.193v3.036h2v-3.036l.75-.193c1.237-.32,2.361-.969,3.25-1.877l.542-.554,2.629,1.512.997-1.734-.643-.369h0s-1.99-1.144-1.99-1.144l.206-.747c.164-.596.246-1.194.253-1.782l1.83-1.83c.102.544.176,1.216.176,1.754s-.052,1.082-.153,1.625Z"/>
                </svg>

             </a>

             <a href="https://www.gridmotors.com.br/" title="ShopMoto" target="_blank">

                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36"  class="bi bi-cart-fill" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                </svg>
               
    

        </div>

    </footer>

</body>

</html>
