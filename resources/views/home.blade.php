@extends('layouts.content')

@section('title-adminlte', 'Bienvenido al Panel Administrativo!')

@section('content-adminlte')
<div class="container-fluid">
    <div class="row">

          <div class="col-12 col-md-6 col-lg-6 col-xl-4">
            <div class="info-box">
              <span class="info-box-icon bg-main-blue col-3 col-md-4 col-lg-4"><i class="fas fa-cogs text-white"></i></span>
              <div class="info-box-content">
                <h5 class="info-box-text text-wrap" style="height:60px;">Configuración</h5>
                <a href="/config" class="btn btn-block btn-outline-primary">
                  Gestión  <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-6 col-lg-6 col-xl-4">
            <div class="info-box">
              <span class="info-box-icon bg-primary col-3 col-md-4 col-lg-4"><i class="fas fa-suitcase"></i></span>
              <div class="info-box-content">
                <h5 class="info-box-text text-wrap" style="height:60px;">Empresas</h5>
                <a href="/companies" class="btn btn-block btn-outline-primary">
                  Gestión  <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-6 col-lg-6 col-xl-4">
            <div class="info-box">
              <span class="info-box-icon bg-success col-3 col-md-4 col-lg-4"><i class="fas fa-box"></i></span>
              <div class="info-box-content">
                <h5 class="info-box-text text-wrap" style="height:60px;">Servicios</h5>
                <a href="/services" class="btn btn-block btn-outline-success">
                  Gestión  <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-6 col-lg-6 col-xl-4">
            <div class="info-box">
              <span class="info-box-icon bg-danger col-3 col-md-4 col-lg-4"><i class="fas fa-percent"></i></span>
              <div class="info-box-content">
                <h5 class="info-box-text text-wrap" style="height:60px;">Ofertas</h5>
                <a href="/offers" class="btn btn-block btn-outline-danger">
                  Gestión  <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-6 col-xl-4">
            <div class="info-box">
              <span class="info-box-icon bg-info col-3 col-md-4 col-lg-4"><i class="fas fa-tag"></i></span>
              <div class="info-box-content">
                <h5 class="info-box-text text-wrap" style="height:60px;">Destacar Logo</h5>
                <a href="/banners" class="btn btn-block btn-outline-info">
                  Gestión  <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-6 col-lg-6 col-xl-4">
            <div class="info-box">
              <span class="info-box-icon bg-warning col-3 col-md-4 col-lg-4"><i class="fas fa-tags text-dark"></i></span>
              <div class="info-box-content">
                <h5 class="info-box-text text-wrap" style="height:60px;">Destacar Plan</h5>
                <a href="/plans" class="btn btn-block btn-outline-warning text-dark">
                  Gestión  <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
          </div>

    </div>
</div>
@stop
