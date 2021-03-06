@extends('Common.adminLayout')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/comun.css')}}">
@endsection


@section('menuIzq')
    @include('AdminFragment.FrgMenIzq')
@endsection

@section('menu-sup-02')
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
    <li class="breadcrumb-item ">Proyectos de investigación</li>
    <li class="breadcrumb-item active">Documentos</li>
@endsection

@section('default')
    <div class="container-fluid area-trabajo" id="area-trabajo">

        <br>
        <div class="row cabeza-seccion">
            <div class="col-8">
                <h2 class="titulo-seccion titulo">Documentos de proyecto</h2>
            </div>
            <div class="col-4">
                <div class="row justify-content-end">
                    <a href="#">
                        <button id="uploadDoc" onclick="OpenModal();" class="btn bttn-red btn-lg">&nbsp;&nbsp; Agregar &nbsp;&nbsp;</button>
                    </a>
                </div>
            </div>
        </div>
        <hr class="all" style="margin-top: 0px;">
        <div class="cuerpo-seccion">
            <br>
            @include('Common.FlashMsj')
            <div class="row">
                @if(count($documentos) > 0)
                    <div class=" col col-12">
                         <div class="row justify-content-end">
                             <p>{{$documentos->total()}} registros | página {{$documentos->currentPage()}} de {{$documentos-> lastPage()}}</p>
                            <div class="col col-1"></div>
                         </div>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <td class="td" align="center">Archivo</td>
                                    <td class="td" align="center">Nombre del documento</td>
                                    <td class="td" align="center">Tipo de archivo</td>
                                    <td class="td" align="center">Acciones</td>
                                    </thead>
                                    @foreach ($documentos as $doc)
                                        <tr>
                                            <td align="center">
                                                @if($doc->getTipoArchivo()=="img")
                                                    <i class="fas fa-file-image fa-2x bttn bttn-ver" style="color:darkcyan"></i>
                                                @endif
                                                @if($doc->getTipoArchivo() =="pdf")
                                                    <i class="fas fa-file-pdf fa-2x bttn" style="color:darkred"></i>
                                                @endif
                                                @if($doc->getTipoArchivo()=="excel")
                                                    <i class="fas fa-file-excel fa-2x bttn" style="color:green"></i>
                                                @endif
                                                @if($doc->getTipoArchivo() =="word")
                                                    <i class="fas fa-file-word fa-2x bttn" style="color:blue"></i>
                                                @endif
                                                @if($doc->getTipoArchivo()=="none")
                                                    <i class="fas fa-file fa-2x bttn" style="color:slategray"></i>
                                                @endif
                                                @if($doc->getTipoArchivo()=="texto")
                                                    <i class="fas fa-file-alt fa-2x bttn" style="color:slategray"></i>
                                                @endif
                                                @if($doc->getTipoArchivo()=="rar")
                                                    <i class="fas fa-file-archive fa-2x bttn" style="color:slategray"></i>
                                                @endif
                                                @if($doc->getTipoArchivo()=="rar")
                                                    <i class="fas fa-photo-video fa-2x bttn" style="color:slategray"></i>
                                                @endif
                                            </td>

                                            <td>{{$doc->getNombre()}}</td>
                                            <td align="center">{{$doc->getExtension()}}</td>
                                            <td align="center" class="align-middle">
                                                <a href="{{route('documentos.download')}}/{{$doc->getNombre()}}" style="margin-right: 20px;">
                                                    <i class="fas fa-download bttn bttn-ver" style="font-size: 26px;">

                                                    </i>
                                                </a>

                                            @if($user->getId() ==$proyecto->getTitular()->getId())

                                                    <a href="{{route('documento.eliminar')}}/{{$doc->getNombre()}}">
                                                        <i class="fas fa-trash-alt bttn bttn-ver" style="font-size: 26px;" ></i>
                                                    </a>


                                            @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>


                        <div class="row justify-content-end">
                                <div class="pagination"> {!!$documentos->render()!!} </div>
                                <div class="col col-1"></div>
                        </div>

                    </div>
                @else
                    <br>
                    <br>

                    <div class="col-8 offset-2 align-content-center">
                        <h1 style="font-size: 2.5em; font-family: Aller;color: rgb(130,130,130);">
                            "No se ha encontrado ningún documento"
                        </h1>
                    </div>

                @endif
            </div>

        </div>
    </div>

<!--Formulario para cargar el archivo-->
    <div hidden>
        <div class="row" id="frm_upload">
            <div class="col-12 col">
                <form action="{{route('documento.agregar')}}" enctype="multipart/form-data" method="post">
                    {{ csrf_field()  }}
                    <br>
                    <div class="row">
                        <input type="text" name="id_proyecto" readonly value="{{$id}}" hidden>
                        <input type="file"
                               name="file"
                               id="file"
                               size="25M"
                               class="custom-file"
                               required>
                    </div>
                    <br>
                    <hr class="all">
                    <div class="row justify-content-end">
                        <button class="btn bttn bttn-exit btn-lg" style="color: white" onclick="closeFM()">Cancelar</button>
                        &nbsp;&nbsp;
                        <button type="submit" class="btn bttn-red bttn ">Cargar archivo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        function OpenModal(){
            $('#frm_upload').dialog('open');
        }

        $('#frm_upload').dialog(
            {
                autoOpen:false,
                width:500,
                modal:true,
            }
        );

        function closeFM(){
            $('#frm_upload').dialog('close');
        }

        $('li.active >span').addClass('page-link');
        $('li.disabled >span').addClass('page-link');



    </script>
@endsection