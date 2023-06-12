<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">
    <title>Requisição Ajax - @yield('title')</title>

    <style>
        li a{
            color: #000000;
            text-transform: uppercase;
            font-weight: 500;
        }
        li a:hover{
            color: gray;
        }
        li.li-logout a:hover{
            color: #8B0000 !important;
            border-color: #8B0000 !important;
        }
        li.li-login a:hover{
            color: #4B0082 !important;
            border-color: #4B0082 !important;
        }
    </style>
</head>
<body>

    <div class="vw-100 min-vh-100 bg-primary d-flex p-2 gap-4 justify-content-center align-items-center">
        <div style="height: 90vh; min-width: 90vw;" class="d-flex gap-5">
            <div class="bg-white p-5 rounded-4" style="width: 20vw; height: 90vh;">
                <nav class=" d-flex flex-column gap-5 text-center">
                    <h1>Painel</h1>
                    <ul class="list-unstyled d-flex gap-4 flex-column">
                        <li>
                            <a href="{{Route('home')}}" class="text-decoration-none">Home</a>
                        </li>
                        <li>
                            <a href="{{Route('create')}}" class="text-decoration-none">Cadastrar</a>
                        </li>
                        <li>
                            <a href="{{Route('list')}}" class="text-decoration-none">Usuários</a>
                        </li>
                        @if(Auth()->check())
                        <li class="d-flex align-items-center justify-content-center li-logout">
                            <a href="{{Route('logout')}}" class="text-danger text-decoration-none px-4 py-2 border border-danger rounded-pill" >Sair</a>
                        </li>
                        @else
                        <li class="d-flex align-items-center justify-content-center li-login">
                            <a href="{{Route('login')}}" class="text-decoration-none text-primary px-3 py-2 border border-primary rounded-pill">Login</a>
                        </li>
                        @endif

                    </ul>
                </nav>
            </div>
            <div style="width: 70vw; ">
                <div class="d-flex flex-column bg-white rounded-4 p-4 d-flex h-100">
                    @if(session('msg'))
                        <div id="msg-content" class="p-3 d-flex justify-content-center align-items-center">
                            <p class="rounded text-uppercase text-light px-3 p-2 bg-danger">
                                {{@session('msg')}}
                            </p>
                        </div>
                    @endif
                    <div class="p-3 d-flex justify-content-center align-items-center">
                        <p  id="message" class="rounded text-uppercase text-light px-3 p-2 bg-danger d-none">
                            
                        </p>
                    </div>
                    <div>
                        @yield('content')
                    </div>
                
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <!-- Link Ajax -->
    <script src="js/ajax.js"></script>
    
    <!-- Rota Home -->
    <script>
        window.route_home = "{{Route('home')}}";
    </script>

    <!-- Data Table -->
    <script>
        $(document).ready(function(){
            $('#tableList').DataTable({
                    "language": {
                        "lengthMenu": "Mostrando _MENU_ registros por página",
                        "zeroRecords": "Nada encontrado",
                        "info": "Mostrando página _PAGE_ de _PAGES_",
                        "infoEmpty": "Nenhum registro disponível",
                        "infoFiltered": "(filtrado de _MAX_ registros no total)"
                    }
                });
        });
  </script>
</body>
</html>