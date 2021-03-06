<!--
 * User: AzaeL Ponce
 * Date: 3/25/2018
 * Time: 11:39 PM
 * Descripcion: Plantilla base que contiene las inclusiones contiene todas los framework...|
 *              de css y js que requieren todas las plantillas de la administracion de la
 *              aplicacion............|
 */
-->
<!Doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/ico" href="{{asset('favicon.ico')}}" />
    <title> Riues :: Admin</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/fuentes.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('framework/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('framework/jquery/jquery-ui.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/simple-line-icons.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/Tools/jquery.webui-popover.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('font-awesome/css/fontawesome-all.min.css')}}">

    @yield('css')


</head>

    <body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden" style="background-color: #F0F0F0">
        <!--
        *| Seccion Header de plantilla
        *|
        -->
        <header class="app-header navbar addToJq" style="background-color: #aa0000;border: 0px">
            <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler sidebar-minimizer d-md-down-none" type="button">
                {{--<span class="navbar-toggler-icon"></span>--}}
                <i class="fas fa-bars" style="color: white;"></i>
            </button>



            <!-- Menu que se localiza a la par del boton izquierdo de la barra superior... -->
            {{--<ul class="nav navbar-nav d-md-down-none">--}}
                {{--<li class="nav-item px-3">--}}
                    {{--<a class="nav-link" href="#">Dashboard</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item px-3">--}}
                    {{--<a class="nav-link" href="#">Users</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item px-3">--}}
                    {{--<a class="nav-link" href="#">Settings</a>--}}
                {{--</li>--}}
            {{--</ul>--}}

            <!-- -->

            <ul class="nav navbar-nav ml-auto" id="barraS">
                <!-- 

                <li class="nav-item d-md-down-none">
                    <a href="" class="nav-link">
                        <div  class="menuSup" id="menuSupMsj">
                        @if(isset($msjj))
                           <a href="http://localhost:8080/">  <i class="fas fa-comments bg-msj menuSup bttn-nav-w"></i></a>
                            <span class="bg-msj badge badge-danger">{{count($msjj)}}</span>

                        @else
                            <i class="fas fa-comments bg-msj  bttn-nav-r"></i>

                        @endif

                        </div>
                        <div  class="webui-popover-content" style="overflow-x: hidden;">
                            <div class="row"style="width: 400px">
                                <div class="col-12">
                                     <strong > Mensajes </strong>
                                    <hr>
                                    <div id="menuMsj">
                                        @if(isset($msj))

                                        @else
                                            No tienes mensajes ...!
                                        @endif
                                    </div>
                                </div>

                            </div>

                        </div>
                    </a>

                </li> -->
                &nbsp;&nbsp;
                <li class="nav-item d-md-down-none">
                    <a href="#" class="nav-link">
                        <div class="menuSupNtf" id="menuSupNtf">
                            @if(isset($ntf))
                                @if($ntf>0)
                                    <i class="fas fa-bell bg-ntf bttn-nav-w"></i>
                                    <span class="bg-ntf badge badge-danger">{{$ntf}}</span>
                                @else
                                    <i class="fas fa-bell bttn-nav-r"></i>
                                @endif

                            @endif
                        </div>
                        <div class="webui-popover-content" >
                            <div class="row" style="width: 400px;overflow:hidden !important;">
                                <div class="col-12">

                                </div>
                                <hr>
                                <div class="col-12" id="menuNtf" style="overflow:hidden !important;">

                                </div>
                            </div>

                        </div>


                    </a>
                </li>
                <script type="text/javascript">
    function loc(url) {
        location.href=url;
    }
</script>
                <li class="nav-item">
                </li>

                {{--<li class="nav-item d-md-down-none">--}}
                    {{--<a class="nav-link" href="#"><i class="icon-bell"></i><span class="badge badge-pill badge-danger">5</span></a>--}}
                {{--</li>--}}
                {{--<li class="nav-item d-md-down-none">--}}
                    {{--<a class="nav-link" href="#"><i class="icon-list"></i></a>--}}
                {{--</li>--}}
                {{--<li class="nav-item d-md-down-none">--}}
                    {{--<a class="nav-link" href="#"><i class="icon-location-pin"></i></a>--}}
                {{--</li>--}}
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <img src="{{asset('storage/avatar/'.$user->rt_foto_usuario)}}" class="img-avatar" alt="{{$user->rt_correo_usuario}}">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header text-center">
                            <strong>Mi cuenta</strong>
                        </div>
                        <a class="dropdown-item" href="{{ route('gestionDatosPersonales') }}"><i class="fa fa-bell-o" style="color: green"></i> Perfil</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"><i class="fa fa-lock" style="color:#aa0000;"></i> Cerrar Sesión</a>
                        <!--
                        <a class="dropdown-item" href="#"><i class="fa fa-envelope-o"></i> Messages<span class="badge badge-success">42</span></a>
                        <a class="dropdown-item" href="#"><i class="fa fa-tasks"></i> Tasks<span class="badge badge-danger">42</span></a>
                        <a class="dropdown-item" href="#"><i class="fa fa-comments"></i> Comments<span class="badge badge-warning">42</span></a>
                        <div class="dropdown-header text-center">
                            <strong>Settings</strong>
                        </div>
                        <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a>
                        <a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> Settings</a>
                        <a class="dropdown-item" href="#"><i class="fa fa-usd"></i> Payments<span class="badge badge-secondary">42</span></a>
                        <a class="dropdown-item" href="#"><i class="fa fa-file"></i> Projects<span class="badge badge-primary">42</span></a>
                        <div class="divider"></div>
                        <a class="dropdown-item" href="#"><i class="fa fa-shield"></i> Lock Account</a>
                        -->
                    </div>
                </li>
            </ul>
            &nbsp;&nbsp;
            <!--Boton derecho para esconder/mostrar el menu derecho-->
            @if(isset($var51))
            <button class="navbar-toggler aside-menu-toggler" id="messageBtn" type="button">
                {{--<span class="navbar-toggler-icon"></span>--}}
                <i class="fas fa-bars" style="color: white;"></i>
            </button>
            @endif
        </header>


        <div class="app-body body">
            @yield('menuIzq')

            <main class="main">

                <!-- Breadcrumb -->
                <ol class="breadcrumb addToJq">
                    @yield('menu-sup-02'){{-- Menu de navegacion superior--}}

                    <!-- Breadcrumb Menu
                    <li class="breadcrumb-menu d-md-down-none">
                        <div class="btn-group" role="group" aria-label="Button group">
                            <a class="btn" href="#"><i class="icon-speech"></i></a>
                            <a class="btn" href="./"><i class="icon-graph"></i> &nbsp;Dashboard</a>
                            <a class="btn" href="#"><i class="icon-settings"></i> &nbsp;Settings</a>
                        </div>
                    </li>
                    -->
                </ol>

                <div class="container-fluid">
                    @yield('default')
                </div>
                <!-- /.conainer-fluid -->

            </main>
            @if(isset($var51))
            <aside class="aside-menu">
                <ul class="nav nav-tabs" role="tablist">
                    {{-- <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#timeline" role="tab"><i class="icon-list"></i></a>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a id="mssjLink" class="nav-link " data-toggle="tab" href="#messages" role="tab">
                            <i class="icon-speech"></i>
                        </a>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#settings" role="tab"><i class="icon-settings"></i></a>
                    </li> --}}
                </ul>

                <!-- Contenido del menu/tabla derecha de la aplicacion -->
                <!-- Contenido del menu/tabla derecha de la aplicacion -->

                <div class="tab-content">
                    @include('Common.FrgMenDer')
                    {{-- <div class="tab-pane active" id="timeline" role="tabpanel">
                        <div class="callout m-0 py-2 text-muted text-center bg-light text-uppercase">
                            <small><b>Today</b></small>
                        </div>
                        <hr class="transparent mx-3 my-0">
                        <div class="callout callout-warning m-0 py-3">
                            <div class="avatar float-right">
                                <img src="img/avatars/7.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                            </div>
                            <div>Meeting with
                                <strong>Lucas</strong>
                            </div>
                            <small class="text-muted mr-3"><i class="icon-calendar"></i>&nbsp; 1 - 3pm</small>
                            <small class="text-muted"><i class="icon-location-pin"></i>&nbsp; Palo Alto, CA </small>
                        </div> --}}
                    {{-- <hr class="mx-3 my-0">
                <div class="callout callout-info m-0 py-3">
                    <div class="avatar float-right">
                        <img src="img/avatars/4.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                    </div>
                    <div>Skype with
                        <strong>Megan</strong>
                    </div>
                    <small class="text-muted mr-3"><i class="icon-calendar"></i>&nbsp; 4 - 5pm</small>
                    <small class="text-muted"><i class="icon-social-skype"></i>&nbsp; On-line </small>
                </div>
                <hr class="transparent mx-3 my-0">
                <div class="callout m-0 py-2 text-muted text-center bg-light text-uppercase">
                    <small><b>Tomorrow</b></small>
                </div>
                <hr class="transparent mx-3 my-0">
                <div class="callout callout-danger m-0 py-3">
                    <div>New UI Project -
                        <strong>deadline</strong>
                    </div>
                    <small class="text-muted mr-3"><i class="icon-calendar"></i>&nbsp; 10 - 11pm</small>
                    <small class="text-muted"><i class="icon-home"></i>&nbsp; creativeLabs HQ </small>
                    <div class="avatars-stack mt-2">
                        <div class="avatar avatar-xs">
                            <img src="img/avatars/2.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                        </div>
                        <div class="avatar avatar-xs">
                            <img src="img/avatars/3.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                        </div>
                        <div class="avatar avatar-xs">
                            <img src="img/avatars/4.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                        </div>
                        <div class="avatar avatar-xs">
                            <img src="img/avatars/5.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                        </div>
                        <div class="avatar avatar-xs">
                            <img src="img/avatars/6.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                        </div>
                    </div>
                </div>
                <hr class="mx-3 my-0">
                <div class="callout callout-success m-0 py-3">
                    <div>
                        <strong>#10 Startups.Garden</strong> Meetup</div>
                    <small class="text-muted mr-3"><i class="icon-calendar"></i>&nbsp; 1 - 3pm</small>
                    <small class="text-muted"><i class="icon-location-pin"></i>&nbsp; Palo Alto, CA </small>
                </div>
                <hr class="mx-3 my-0">
                <div class="callout callout-primary m-0 py-3">
                    <div>
                        <strong>Team meeting</strong>
                    </div>
                    <small class="text-muted mr-3"><i class="icon-calendar"></i>&nbsp; 4 - 6pm</small>
                    <small class="text-muted"><i class="icon-home"></i>&nbsp; creativeLabs HQ </small>
                    <div class="avatars-stack mt-2">
                        <div class="avatar avatar-xs">
                            <img src="img/avatars/2.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                        </div>
                        <div class="avatar avatar-xs">
                            <img src="img/avatars/3.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                        </div>
                        <div class="avatar avatar-xs">
                            <img src="img/avatars/4.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                        </div>
                        <div class="avatar avatar-xs">
                            <img src="img/avatars/5.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                        </div>
                        <div class="avatar avatar-xs">
                            <img src="img/avatars/6.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                        </div>
                        <div class="avatar avatar-xs">
                            <img src="img/avatars/7.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                        </div>
                        <div class="avatar avatar-xs">
                            <img src="img/avatars/8.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                        </div>
                    </div>
                </div>
                <hr class="mx-3 my-0"> --}}
            {{-- </div> --}}

                    {{-- <div class="tab-pane p-3" id="settings" role="tabpanel"> --}}
                {{-- <h6>Settings</h6> --}}

                {{-- <div class="aside-options">
                    <div class="clearfix mt-4">
                        <small><b>Option 1</b></small>
                        <label class="switch switch-text switch-pill switch-success switch-sm float-right">
                            <input type="checkbox" class="switch-input" checked="">
                            <span class="switch-label" data-on="On" data-off="Off"></span>
                            <span class="switch-handle"></span>
                        </label>
                    </div>
                    <div>
                        <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</small>
                    </div>
                </div> --}}

                {{-- <div class="aside-options">
                    <div class="clearfix mt-3">
                        <small><b>Option 2</b></small>
                        <label class="switch switch-text switch-pill switch-success switch-sm float-right">
                            <input type="checkbox" class="switch-input">
                            <span class="switch-label" data-on="On" data-off="Off"></span>
                            <span class="switch-handle"></span>
                        </label>
                    </div>
                    <div>
                        <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</small>
                    </div>
                </div>

                <div class="aside-options">
                    <div class="clearfix mt-3">
                        <small><b>Option 3</b></small>
                        <label class="switch switch-text switch-pill switch-success switch-sm float-right">
                            <input type="checkbox" class="switch-input">
                            <span class="switch-label" data-on="On" data-off="Off"></span>
                            <span class="switch-handle"></span>
                        </label>
                    </div>
                </div>

                <div class="aside-options">
                    <div class="clearfix mt-3">
                        <small><b>Option 4</b></small>
                        <label class="switch switch-text switch-pill switch-success switch-sm float-right">
                            <input type="checkbox" class="switch-input" checked="">
                            <span class="switch-label" data-on="On" data-off="Off"></span>
                            <span class="switch-handle"></span>
                        </label>
                    </div>
                </div>

                <hr>
                <h6>System Utilization</h6>

                <div class="text-uppercase mb-1 mt-4">
                    <small><b>CPU Usage</b></small>
                </div>
                <div class="progress progress-xs">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <small class="text-muted">348 Processes. 1/4 Cores.</small>

                <div class="text-uppercase mb-1 mt-2">
                    <small><b>Memory Usage</b></small>
                </div>
                <div class="progress progress-xs">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <small class="text-muted">11444GB/16384MB</small>

                <div class="text-uppercase mb-1 mt-2">
                    <small><b>SSD 1 Usage</b></small>
                </div>
                <div class="progress progress-xs">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <small class="text-muted">243GB/256GB</small>

                <div class="text-uppercase mb-1 mt-2">
                    <small><b>SSD 2 Usage</b></small>
                </div>
                <div class="progress progress-xs">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <small class="text-muted">25GB/256GB</small> --}}
            {{-- </div> --}}
                </div>

            </aside>
            @endif
        </div>

        <!---
          *| Seccion footer de la plantilla de administracion ..........................
        -->
<footer class="app-footer">
    <span><a href="#"> Universidad de El Salvador </a> © Secretaría de Investigaciones Científicas de la Universidad de El Salvador </span>
    <span class="ml-auto"></span>
</footer>


</body>

    <script  src="{{asset('framework/jquery/jquery.min.js')}}"></script>
    <script  src="{{asset('framework/jquery/jquery-ui.min.js')}}"></script>
    <script  src="{{asset('framework/bootstrap/js/bootstrap.min.js')}}"></script>
    <script  src="{{asset('admin/js/admin.js')}}"></script>
    <script  src="{{asset('js/tools/jquery.webui-popover.js')}}"></script>
    <script  src="{{asset('js/admin.js')}}"></script>
    @yield('js')
</html>
