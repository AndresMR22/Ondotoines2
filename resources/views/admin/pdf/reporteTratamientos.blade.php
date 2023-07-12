<!DOCTYPE html>
<html>

<head>
    <title>Reporte</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/7c93de4bfc.js" crossorigin="anonymous"></script>
    <style type="text/css">
        .fa {
          display: inline;
          font-style: normal;
          font-variant: normal;
          font-weight: normal;
          font-size: 14px;
          line-height: 1;
          font-family: FontAwesome;
          font-size: inherit;
          text-rendering: auto;
          -webkit-font-smoothing: antialiased;
          -moz-osx-font-smoothing: grayscale;
        }
        </style>
</head>


<body>
    <style>
/*
       @import url('https://fonts.googleapis.com/css2?family=Nunito:ital@1&family=Poppins:ital,wght@1,600&display=swap');
        */
        #imagen{
            position:absolute;
            width:100px;
            margin-left:500px;
        }

        body{
            color:black;
        }
        table{
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        #name__doc{
           font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
           font-size:30px;
           /* font-weight: 700; */

       }

       #description__team{
        font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
           font-weight: 700;
           line-height : 5px;
       }

       #title__c1{
           font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
           font-weight: 700;
       }
       #title__c2{
           font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
           font-weight: 700;
           text-align: center;
       }
       #title__c3{
           font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
           font-weight: 700;
           text-align: center;
       }
       #cabecera__tabla{
           /* background:yellow; */
           border-top: 1px solid #369;
           /* padding: 2px; */
       }
       #cabecera__tabla th{
           padding:0px 10px;
       }



       #tabla__datos{
           margin-top:70px;
           border: black 5px solid;
           width:700px;
       }


       .fila td{
           text-align:center;
           color:black;
       }
       .fila__footer td{
        text-align:center;
       }

       #items__footer{
           color:black;
       }

       .total{
           font-weight:bold;
       }


    </style>

    {{-- < class="container"> --}}
        {{-- <img class="img" src="{{public_path('/images/logo/logoPassionReal.jpeg')}}"> --}}
        {{-- <div class="titulo">FACTURA</div>
        <div class="empresa">Automotriz R.A.L.E</div> --}}
        {{-- <img id="imagen" src="{{asset('assets/img/logos/logo-automotriz-rale.png')}}"> --}}
        <img id="imagen" src="" alt="logo">
        {{-- <h2 id="name__doc">Reporte</h2> --}}
        <h5 id="description__team">ODONTOINES</h5>
        <h5 id="description__team">Ecuador</h5>
<br/>

<div>

    <h5 id="description__team" style="text-align:center;">LISTADO DE TRATAMIENTOS</h5>

</div>
<br>
<div>

    <h5 id="description__team" style="text-align:left;">Desde: {{ date('Y-m-d H:i', strtotime($fechaInicio)) }}</h5>
    <h5 id="description__team" style="text-align:left;">Hasta: {{ date('Y-m-d H:i', strtotime($fechaFin)) }}</h5>

</div>


<table class="table table-light" id="tabla__datos" align="center">
    <thead class="thead-light">
        <tr id="cabecera__tabla">
            <th>N°</th>
            <th>Médico</th>
              <th>Paciente</th>
              <th>Observación</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tratamientos as $key => $tratamiento)
        <tr class="fila">
            <td>{{$key+1}}</td>
            <td>{{$tratamiento->medico}}</td>
            <td>{{$tratamiento->paciente->nombre.' '.$tratamiento->paciente->apellido}}</td>
            <td>{{$tratamiento->observacion}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</body>

</html>
