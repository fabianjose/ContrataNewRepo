<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Document</title>
      <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
      <style>
          
          body{
            font-family:  'Montserrat',Arial, Helvetica, sans-serif;
          }

          h1{
              font-size:35px;
              margin: 20px;
              color: #13293d;
          }
          h2{
            font-size:25px;
            margin: 20px;
            color: #13293d;
          }
          p{
              font-size:20px;
              margin-top: 30px;
              color: #03192d;
          }
          .contenedor{
              text-align: center;
              max-width: 80%;
              margin: 0 auto;
          }
          .text-fields{
            font-size: 18px!important;
            color: #03192d;
            padding-left:15px;
            padding-right:15px;
            margin-bottom:10px;
          }
      </style>
  </head>
  <body>
      <div class="contenedor">
          <h1>Saludos Cordiales</h1>
          <h2>Mi nombre es {{ $fullName }}</h2>
          <p>
            {{$general_message}}
            <br>

            
            @if($extra_message)
              <br>
                {{$extra_message}}
              <br>
              <br>  
            @endif

            @if($offerLink)
              <span>Link de la oferta: {{$offerLink}}</span>
              <br>  
            @endif

            <br>
            Aqui están mis datos de contacto:
            <br>
            <br>
            <span class="text-fields">
                Número telefónico: {{ $phone }}
            </span>
            <br>
            <span class="text-fields">
                Correo electrónico: {{ $email }}
            </span>
          </p>
      </div>
  </body>
</html>
