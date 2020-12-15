<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva venta online - Escuela de proyectistas</title>
    <!-- Bootstrap CSS -->    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <table class="table" width="800">
            <tr>
                <td>
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="30%"><img src="{{asset('assets/images/logo-bw.png')}}" class="img-fluid" width="150" alt=""></td>
                            <td width="70%" valign="middle" align="right"><h4>Nueva venta online - Escuela de proyectistas</h4></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><td> &nbsp; </td></tr>
            <tr><td> <h4>Datos del comprador</h4> </td></tr>
            <tr><td> &nbsp; </td></tr>
            <tr>
                <td>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col"> D.N.I.</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Teléfono</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> {{$data['first_name']}} </td>
                                <td> {{$data['last_name']}} </td>
                                <td> {{$data['doc_number']}} </td>
                                <td> {{$data['email']}} </td>
                                <td> {{$data['address']}} </td>
                                <td> {{$data['phone_number']}} </td>
                            </tr>
                        </tbody>
                    </table>
                    {{-- <table width="100%" cellspacing="0" cellpadding="0" style="border: 1px solid #DEDEDE;">
                        <tr>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>D.N.I</th>
                            <th>Correo</th>                            
                            <th>Dirección</th>
                            <th>Teléfono</th>
                        </tr>
                        <tr>
                            <td> {{$data['first_name']}} </td>
                            <td> {{$data['last_name']}} </td>
                            <td> {{$data['doc_number']}} </td>
                            <td> {{$data['email']}} </td>
                            <td> {{$data['address']}} </td>
                            <td> {{$data['phone_number']}} </td>
                        </tr>
                    </table> --}}
                </td>
            </tr>
            <tr><td> &nbsp; </td></tr>
            <tr><td> <h4>Datos de la Compra</h4> </td></tr>
            <tr><td> &nbsp; </td></tr>
            <tr>
                <td>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Código de Autorización</th>
                                <th scope="col">Código de Referencia</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$data['reference_code']}}</td>
                                <td>{{$data['authorization_code']}}</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr><td> &nbsp; </td></tr>
            <tr><td> <h4>Cursos adquiridos</h4>  </td></tr>
            <tr><td> &nbsp; </td></tr>
            <tr>
                <td>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nombre del Curso</th>
                                <th width="18%" scope="col"> &nbsp; </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <ul class="list-group list-group-flush">
                                        @foreach($data['courses'] as $index => $course_name)
                                            <li class="list-group-item">{{$course_name}}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td width="18%"> &nbsp; </td>
                            </tr>
                            <tr>
                                <td> <strong>TOTAL:</strong></td>
                                <td> <strong> {{$data['amount']}} </strong></td>
                            </tr>
                        </tbody>
                    </table>
                    {{-- <table width="100%" cellspacing="0" cellpadding="0" style="border: 1px solid #DEDEDE;">
                        <tr>
                            <th>Título del curso</th>
                            <th> &nbsp; </th>
                        </tr>
                        <tr>
                            <td>
                                <ul>
                                    @foreach($data['courses'] as $index => $course_name)
                                    <li> {{$course_name}} </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td width="15%"> &nbsp; </td>
                        </tr>
                        <tr>
                            <td><strong>TOTAL</strong></td>
                            <td>{{$data['amount']}}</td>
                        </tr>
                    </table> --}}
                </td>
            </tr>
            <tr><td> &nbsp; </td></tr>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="0" style="border: 1px solid #DEDEDE;">
                        <tr>
                            <th>Mensaje:</th>
                        </tr>
                        <tr>
                            <td> {{$data['merchant_message']}} </td>
                        </tr>
                    </table>                    
                </td>
            </tr>
            <tr><td> &nbsp; </td></tr>
            <tr>
                <td bgcolor="#000000" align="center">
                    <span style="font-size: 0.7rem; color: #FFFFFF;">Powered By <i class="fa fa-star-half-o" aria-hidden="true"></i> Starmedia Solutions - 2020</span>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>