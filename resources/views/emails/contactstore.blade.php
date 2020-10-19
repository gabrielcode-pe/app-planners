<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contacto desde Web</title>
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
							<td width="70%" valign="middle" align="right"><h4>Contacto desde la Web</h4></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr><td> &nbsp; </td></tr>
			<tr>
				<td>
					<table width="100%" cellspacing="0" cellpadding="0" style="border: 1px solid #DEDEDE;">
						<tr>
							<th>Nombres</th>
							<th>Compañía</th>
							<th>Correo</th>
							<th>Teléfono</th>
						</tr>
						<tr>
							<td> {{$data['name']}} </td>
							<td> {{$data['company']}} </td>
							<td> {{$data['email']}} </td>
							<td> {{$data['phone']}} </td>
						</tr>
					</table>
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
							<td> {{$data['message']}} </td>
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