@extends('layouts.app')

@section('content')

<div class="wrapper">
  <nav class="main-header navbar navbar-expand-md navbar-white navbar-light sticky-top">

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link nav-btn" data-widget="pushmenu" href="#">
          <i class="fas fa-bars"></i>
          <span class="sr-only">Navegación de palanca</span>
        </a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto ">
      <li class="nav-item">
        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="fa fa-fw fa-power-off"></i> Salir
        </a>
        <form id="logout-form" action="/logout" method="GET" style="display: none;">
          <input type="hidden" name="_token" value="fvSEdai2bWbgQegBVXLAvni4D50kwAc2700uZZOE">
        </form>
      </li>
    </ul>

  </nav>

  <aside class="sidebar main-sidebar sidebar-dark-primary elevation-4">
    <a href="/dashboard" class="brand-link ">
      <img src="{{ asset('images/LOGO3BLANCO.png') }}" alt="Contrata Internet" style="height: 55px!important;" class="img-fluid" style="opacity: .8">
    </a>

    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu">
          <li class="nav-item ">
            <a class="nav-link d-flex flex-row align-items-center" href="/config">
              <i class="fa fa-cogs"></i col-2>
              <p class="col-10">Configuración</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link d-flex flex-row align-items-center" href="/companies">
              <i class="fa fa-suitcase"></i col-2>
              <p class="col-10">Empresas</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link d-flex flex-row align-items-center" href="/services">
              <i class="fa fa-box"></i col-2>
              <p class="col-10">Servicios</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link d-flex flex-row align-items-center" href="/offers">
              <i class="fa fa-percent"></i col-2>
              <p class="col-10">Ofertas</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link d-flex flex-row align-items-center" href="/banners">
              <i class="fa fa-tag"></i col-2>
              <p class="col-10" class="text-wrap">Destacar Logo</p>
            </a>
          </li>

          <li class="nav-item ">
            <a class="nav-link d-flex flex-row align-items-center" href="/plans">
              <i class="fa fa-tags"></i col-2>
              <p class="col-10">Destacar Plan</p>
            </a>
          </li>

          <li class="nav-item ">
            <a class="nav-link d-flex flex-row align-items-center" href="/locations">
              <i class="fas fa-map-marker-alt col-2"></i>
              <p class="col-10">Zonas</p>
            </a>
          </li>

        </ul>
      </nav>
    </div>
  </aside>

<div class="content-wrapper" style="min-height: 1071.31px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <h1 class="px-4 m-0 text-dark">@yield('title-adminlte')</h1>
      </div>
    </div>
  </section>
  <section class="content pb-5" >
    @yield('content-adminlte')
  </section>
</div>

</div>

@stop
