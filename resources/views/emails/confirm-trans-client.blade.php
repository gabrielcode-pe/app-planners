<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Orden de Compra</title>
    <style>
    	*{
    		font-family: tahoma;
    	}
    </style>
</head>
<body>
	<div align="center">
		<table class="table" width="800">
			<tr>
				<td>
					<table width="100%" cellpadding="0" cellspacing="0">
						<tr>
							<td width="30%"><img src="{{asset('assets/images/logo-bw.png')}}" class="img-fluid" width="150" alt="Escuela de Proyectistas"></td>
							<td width="70%" valign="middle" align="right"><h4 style="font-size: 20px;">ORDEN DE COMPRA</h4></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr><td> &nbsp; </td></tr>
            <tr>
				<td align="center" style="border:#CACACA 1px solid;">
					<h5 style="font-size: 20px;">Gracias por comprar su curso en la Escuela de Proyectistas.</h5>
					<h5 style="font-size: 17px;">{{$data['user_message']}}</h5>
					<p>Para solicitar tu comprobante de pago electrónico, solicítalo haz click <a href="mailto:info@escueladeproyectistas.com">aqui.</a></p>
				</td>
			</tr>
			<tr><td> &nbsp; </td></tr>
			<tr>
				<td style="border:#CACACA 1px solid;">
					<h4 style="font-size: 15px;"> Datos del Comprador </h4>
					<table width="100%" cellspacing="0" cellpadding="0" border="1" style="border: 1px solid #DEDEDE; font-size: 12px;">
						<thead>
							<tr>
								<th><strong>Nombre Completo</strong></th>
								<th><strong>Correo</strong></th>
								<th><strong>D.N.I.</strong></th>
								<th><strong>Teléfono</strong></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td> {{$data['first_name']}} </td>
								<td> {{$data['email']}} </td>
								<td> {{$data['doc_number']}} </td>
								<td> {{$data['phone_number']}} </td>
							</tr>							
						</tbody>
					</table>
				</td>
			</tr>
			<tr><td> &nbsp; </td></tr>
			<tr>
				<td>
					<table width="100%" cellspacing="0" cellpadding="0" border="1" style="border: 1px solid #DEDEDE; font-size: 12px;">
						<tr>
							<td width="18%"><strong>Dirección</strong></td>
							<td> {{$data['address']}}</td>
						</tr>
					</table>					
				</td>
			</tr>
			<tr><td> &nbsp; </td></tr>
			<tr>
				<td style="border:#CACACA 1px solid;">
					<h4 style="font-size: 15px;"> Detalles de la Compra </h4>
					<table width="100%" cellspacing="0" cellpadding="0" style="border: 1px solid #DEDEDE;">
						<thead>
							<tr>
								<th align="left">Curso(s)</th>							
								<th width="15%"> &nbsp; </th>							
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<ul style="list-style: none; padding: 0; line-height: 30px; font-size: 13px;">
                                        @foreach($data['courses'] as $index => $course_name)
                                            <li>{{$course_name}}</li>
                                        @endforeach
									</ul>									
								</td>
								<td width="15%"> &nbsp; </td>
							</tr>
							<tr>
								<td><strong>TOTAL PAGADO</strong></td>
								<td><strong>S/. {{$data['amount']}}</strong></td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr><td> &nbsp; </td></tr>
			<tr>
				<td align="center">
					<p style="font-size: 16px; font-weight: bold;">Si tienes una consulta adicional, estamos a un click</p>
				</td>
			</tr>
			<tr><td> &nbsp; </td></tr>
			<tr>
				<td align="center">
					<table width="60%">
						<tr>
							<td width="25%" align="center" valign="middle" height="84" style="border: 1px solid #CACACA;">
								<a href="https://www.facebook.com/escueladeproyectistas1/" target="_blank">
									<img src="{{asset('assets/images/m-fb.png')}}" width="45" alt="Facebook">
								</a>
							</td>
							<td width="25%" align="center" valign="middle" height="84" style="border: 1px solid #CACACA;">
								<a href="https://www.instagram.com/escueladeproyectistas/?hl=es-la" target="_blank">
									<img src="{{asset('assets/images/m-ig.png')}}" width="45" alt="Instagram">
								</a>
							</td>
							<td width="25%" align="center" valign="middle" height="84" style="border: 1px solid #CACACA;">
								<a href="https://www.youtube.com/channel/UCD1Zjd-Z-mfXzFoZsUM1mEw" target="_blank">
									<img src="{{asset('assets/images/m-yt.png')}}" width="45" alt="YouTube">
								</a>
							</td>
							<td width="25%" align="center" valign="middle" height="84" style="border: 1px solid #CACACA;">
								<a href="https://api.whatsapp.com/send?phone=+51987420355" target="_blank">
									<img src="{{asset('assets/images/m-wa.png')}}" width="45" alt="Whatsapp">
								</a>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr><td> &nbsp; </td></tr>
			<tr>
				<td style="border:#CACACA 1px solid;">
					<p style="font-size: 11px;">Sobre la responsabilidad de este mensaje: Este mensaje contiene información confidencial y está dirigido a la cuenta de correo electrónico {{$data['email']}}. Si no eres el propietario de la dirección {{$data['email']}} por favor infórmanos a info@escueladeproyectistas.com y elimina el mensaje de tu sistema. La transmisión de este mensaje no garantiza que contenga errores, que sea seguro o que la información podría ser interceptada, alterada, perdida, destruida, incompleta o contener virus. Por lo tanto, Escuela de Proyectistas no acepta la responsabilidad por ningún error u omisión en el contenido de este mensaje que se muestra como resultado de la transmisión del correo electrónico.</p>
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