@extends('Common.adminLayout')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/comun.css')}}">
@endsection

@section('menuIzq')
    @include('AdminFragment.FrgMenIzq')
@endsection

@section('menu-sup-02')
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
    <li class="breadcrumb-item">Perfil</li>
    <li class="breadcrumb-item"><a href="{{route('gestionProyectosRealizados')}}">Proyectos realizados</a></li>
    <li class="breadcrumb-item active">Editar</li>
@endsection

@section('default')
    <div class="row">
        <div class="col-6 offset-3">
            <div class="card">
                <div class="card-header" style="background-color: #aa0000">
                    <div class="row cabeza-seccion">
                        <div class="col-9">
                            <p class="titulo" style="color: white">
                                Proyecto Realizado
                            </p>
                        </div>
                        <div class="col-3 align-middle" style="align-content: center;display: flex;align-items: center">
                            <div class="row align-items-center" >
                                <div class="col">
                                    <label style="color: white;font-size: 20px;" for="#" class="editar-seccion">Editar&nbsp; &nbsp;</label>
                                </div>
                            </div>

                            <div class="col">
                                <i class="fas fa-toggle-off fa-2x inactivo" style="color: white" id="switch-prj-edit"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form id="frm-add" method="post"  action="{{route('gestionProyectosRealizados')}}/editar/{{$id}}">
                        {{ csrf_field()  }}
                        <input type="hidden" value="{{$id}}" name="id">
                        @if($errors->any())
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-danger">
                                        <i class="fas fa-exclamation">
                                            &nbsp;&nbsp; </i>Por favor, corrija los campos que se marcan en rojo.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="nombreProyecto">Título del Proyecto:</label>
                                    <input type="text"
                                           form="frm-add"
                                           class="form-control @if($errors->has('nombre')) is-invalid @endif edt"
                                           name="nombre"
                                           id="nombre"
                                           {{$errors->any() ? '':'disabled'}}
                                           value="{{$errors->any() ? old('nombre'):$proyecto->rt_titulo_proyecto}}"
                                    >
                                    <div class="invalid-feedback">
                                        {{$errors->first('nombre')}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="fechaIncicio">Fecha de Inicio:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-calendar-alt"></i>
                                </span>
                                    </div>
                                    <input type="text"
                                           form="frm-add"
                                           autocomplete="off"
                                           class="form-control @if($errors->has('fechaI')) is-invalid @endif edt"
                                           name="fechaI"
                                           id="fechaI"
                                           value="{{$errors->any() ? old('fechaI'):$proyecto->rf_fecha_inicio_proyecto}}"
                                           readonly
                                            {{$errors->any() ? '':'disabled'}}
                                    >
                                    <div class="invalid-feedback">
                                        {{$errors->first('fechaI')}}
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <label for="fechaF">Fecha de Finalización:</label>
                                <div class="input-group  mb-3">
                                    <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-calendar-alt"></i>
                                </span>
                                    </div>
                                    <input type="text"
                                           autocomplete="off"
                                           form="frm-add"
                                           class="form-control @if($errors->has('fechaF')) is-invalid @endif edt"
                                           id="fechaF"
                                           readonly
                                           {{$errors->any() ? '':'disabled'}}
                                           name="fechaF"
                                           value="{{$errors->any() ? old('fechaF'):$proyecto->rf_fecha_fin_proyecto}}"

                                    >
                                    <div class="invalid-feedback">
                                        {{$errors->first('fechaF')}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label class="" for="area">Área de Conocimiento:</label>
                                <select id="area"
                                        name="area"
                                        onchange="verificarSelcArea(this)"
                                        class="form-control edt"
                                        disabled
                                >
                                    @foreach($areas as $area)
                                        <option value="{{$area->pk_id_area}}"
                                        @if($proyecto->fk_id_area < 100)
                                            {{$area->pk_id_area ==$proyecto->fk_id_area ? 'selected':''}}
                                                @else
                                            {{$area->pk_id_area == 7 ? 'selected':''}}
                                                @endif
                                        >
                                            {{$area->rt_nombre_area}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="pais">País de ejecución:</label>
                                <select name="pais" id="pais" class="form-control mb-3 edt" form="frm-add" {{$errors->any() ? '':'disabled'}}>
                                    @foreach($paises as $pais)
                                        <option value="{{$pais->pk_id_pais}}"
                                                @if($errors->any())
                                                    {{old('pais') == $pais->pk_id_pais ? 'selected':''}}
                                                @else
                                                    {{$proyecto->fk_id_pais == $pais->pk_id_pais ? 'selected':''}}
                                                @endif
                                        >
                                            {{$pais->rt_nombre_pais}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                <div class="col">
                                    <label for="area-c">Especifique Área:</label>
                                    <input type="text"
                                           name="area-c"
                                           id="area-c"
                                           disabled
                                           class="form-control edt {{$errors->has('area-c') ? 'is-invalid':''}}"
                                           value="{{$proyecto->fk_id_area >100 ? $proyecto['area']:''}}"
                                    >
                                    <div class="invalid-feedback">{{$errors->first('area-c')}}</div>
                                </div>

                            </div>

                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="descripcion">Descripción:</label>
                                <textarea   class="form-control  mb-3 edt
                                                @if($errors->has('descripcion')) is-invalid @endif"
                                            rows="4"
                                            form="frm-add"
                                            autocomplete="off"
                                            {{$errors->any() ? '':'disabled'}}
                                            cols="60"
                                            placeholder="Descripcion..."
                                            name="descripcion"
                                            id="descripcion"
                                >@if($errors->any()){{old('descripcion')}}@else{{$proyecto->rd_descripcion_proyecto}}@endif</textarea>
                                <div class="invalid-feedback">
                                    {{$errors->first('descripcion')}}
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer align-content-end">
                    <div class="row justify-content-end">
                        <a href="{{route('gestionProyectosRealizados')}}">
                            <button class="btn bttn-exit btn-lg" style="color: white;">&nbsp;&nbsp;Cancelar&nbsp;&nbsp;</button>

                        </a>
                        <div class="col-1"></div>
                        <input type="submit" form="frm-add" class="btn bttn-red btn-lg" id="actualizar" value="&nbsp;Actualizar&nbsp;" />
                        &nbsp;
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('js')
    <script  src="{{asset('js/ProyectoRealizado/EditarProyecto.js')}}"></script>
@endsection