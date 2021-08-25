@extends("layouts.landing")

@section("content-page")
@if ($count === 0)


<div class="container">
<div class="container">
<div class="container">
<div class="container">
<div class="container">
<div class="container">


<div class="container">
        <div class="card bg-dark text-white">
        <img class="card-img" src="{{url('images/fondo.jpg')}}" alt="Card image">
        <div class="card-img-overlay">
        <div class="row text-center sin-resultados-1">
            <div class="col">
              
                                <h1 class="" style="font-size: 2vw;">                     No se han encontrado planes para la selección que hicistes.
                                </h1>
            </div>
        </div>
        <br>
        <div class="row text-center sin-resultados-2">
            
            <div class="col">
                <a href="/">             <img class="card-img" src="{{url('images/icono-sinresultado-5.png')}}"  alt="Card image" style="width: 60%;"></a>
            </div>
        </div>
        <br>
        <div class="row text-center sin-resultados-3">
            
            <div class="col">
            <img class="card-img" src="{{url('images/icono-sinresultado-1.png')}}"  alt="Card image" style="width: 60%;">

            </div>
            <div class="col">
            <img class="card-img" src="{{url('images/icono-sinresultado-2.png')}}"  alt="Card image" style="width: 60%;">
            </div>
            <div class="col">
            <img class="card-img" src="{{url('images/icono-sinresultado-3.png')}}"  alt="Card image" style="width: 60%;">
            </div>
            <div class="col">
            <img class="card-img" src="{{url('images/icono-sinresultado-4.png')}}"  alt="Card image" style="width: 60%;">
            </div>
        </div>
  <br>  
        <div class="row text-center sin-resultados-4">
            <div class="col">
            <div class="col">

            <a href="https://api.whatsapp.com/send?phone=573212120281&text=hola, me gustaria saber de los planes"> <img class="card-img" src="{{url('images/icono-sinresultado-6.png')}}"  alt="Card image" style="width: 60%;"></a>
            </div>
            </div>
        </div>
        </div>
        </div>

</div>

</div>
</div>
</div>
</div>
</div>
</div>

<style>


@else
    <offers-filter :pagination="{{$pagination->toJson()}}" :fields="{{$fields}}" 
        query="{{$query}}" :lastpage="{{$last_page}}" :providers="{{$providers}}"
        :technologies = "{{$technologies}}"
        :speeds="{{json_encode($speeds)}}"
        :max_price="{{$max_price}}"
        :min_price="{{$min_price}}" 
        :plans="{{json_encode($plans)}}">
    </offers-filter>
@endif

@stop
				