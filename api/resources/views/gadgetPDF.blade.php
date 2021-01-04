<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
	<title></title>
	<!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .m-b-md {
                margin-bottom: 5px;
            }
            table {
			  border-collapse: collapse;
			  width: 100%;
			}

			th, td {
			  text-align: left;
			  padding: 4px;
			}

			tr:nth-child(even){background-color: #f2f2f2}

			th {
			  background-color: #000;
			  color: white;
			}
			.margin{
				margin: auto 10;
			}
            .header{

            }
            .items{
            width: 60%;
            margin:auto;
            }
            .logo-img {
            width: 50px;
            margin:0px 10px;
            }
            .items{
            width: 60%;
            margin:auto;
            }
            .logo-img {
            width: 200px;
            margin:0px 10px;
            }
            .header-title{
                color: black;
                margin:0 5px;
            }
            .item-sign{
                width: 100px;
                height: 100px;
            }
            .sign{
                margin-left: 30px;
                text-align: left;
                font-weight: bolder;
                color:black;
            }
            .img-sing{
                margin-left: 70px;
            }
        </style>
</head>
<body>
	<div class="content">
         <div class="header">
            <div class="items">
                <img src="GobiernoBolivarianoVenezolano.png" alt="logo ministerio" class="logo-img">
                <img src="mppe.png" alt="logo gobernación" class="logo-img">
            </div>
        </div>
        <h1 class="header-title">
            Ministerio Del Poder Popular Para la Educación<br/>
            <br/>
            Dirección del municipio Sucre
        </h1>
        <div class="title m-b-md">
            Registro de Equipos
        </div>
        <div class="margin">
          <table>
			  <tr>
			    <th>nombre</th>
			    <th>codigo</th>
			    <th>Departamento</th>
			    <th>estatus</th>
			  </tr>
              @foreach($data as $item)
              <tr>
                <td>{{$item['name']}}</td>
                <td>{{$item['code']}}</td>
                <td>{{$item['departament']['name']}}</td>
                <td>{{$item['status'] == 1 ? 'incorporado' : 'desincorporado'}}</td>
              </tr>
              @endforeach
		  </table>
        </div>
    </div>

</body>
</html>