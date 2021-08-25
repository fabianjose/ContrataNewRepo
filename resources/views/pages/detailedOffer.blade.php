@extends('layouts.content')

@section('title-adminlte', 'Oferta #'.$offer->id)

@section('content-adminlte')

<offer-detailed :offer="{{json_encode($offer)}}" ></offer-detailed>

@stop
