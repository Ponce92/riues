@extends('Common.adminLayout')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/comun.css')}}">
@endsection

@section('menuIzq')
    @include('AdminFragment.FrgMenIzq')
@endsection

@section('menu-sup-02')
    <li class="breadcrumb-item"><a href="/dashboard">Inicio</a></li>
    <li class="breadcrumb-item ">Ajustes</li>
    <li class="breadcrumb-item"><a href="{{route('estados')}}">Estados de Proyectos</a></li>
    <li class="breadcrumb-item active">crear</li>
@endsection

@section('default')
    <div class="row justify-content-center">
        <div class="col-sm-5">
            <div class="card">
                <div class="card-header">
                    <strong>Estados de Proyectos :: actualizar</strong>
                </div>
                <div class="card-body   ">

                    <form action="{{ route('estado.editar.post') }}" method="post" id="frm_crear" name="frm_crear">
                        {{ csrf_field()  }}
                        <div class="row">
                            @include('Common.FlashMsj')
                        </div>

                        <div class="form-group">
                            <label class="form-col-form-label" for="nombre">Estado de Proyecto:</label>
                            <input class="form-control {{ $errors->has('nombre') ? ' is-invalid' : '' }}"
                                   id="nombre"
                                   name="nombre"
                                   type="text"
                                   value="{{ $errors->any() ? old('nombre'):$Objetivo->getNombre()  }}"
                                   autocomplete="off">
                            @if($errors->has('nombre'))
                                <div class="invalid-feedback">{{ $errors->first('nombre') }}</div>
                            @endif
                        </div>
                        <div class="row">
                            <input type="number" name="id" value="{{$Objetivo->getId()}}" hidden>
                        </div>
                        <div class="row">

                            <div class="form-group col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="est">Estado:</label>
                                    </div>
                                </div>
                                <div class="row justify-content-lg-end">
                                    <div class="col-11">
                                        <input class="form-check-input" id="check" name="estado" type="checkbox" {{ $Objetivo->getEstadoo() ? 'checked':''}}>
                                        <label for="est">Activo</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="row justify-content-end">
                        <div class="col-6">
                            <a href="{{route('estados')}}">
                                <button class="btn bttn bttn-exit" type="submit" style="color: #fff;">
                                     Cancelar
                                </button>
                            </a>
                            &nbsp;
                            <button class="btn bttn bttn-red" form="frm_crear" onclick="this.form.submit();" type="reset">
                                 Actualizar
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>







@endsection

@section('js')
@endsection




