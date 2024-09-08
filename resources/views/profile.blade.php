<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tes</title>
	<link href="{{ asset('css/blade1.css') }}" rel="stylesheet">
</head>
<body>
	<div class="fotoprofil">
		<img src="{{asset('images/profile1.jpeg')}}" alt="Avatar">
	</div>
	<br>
	<div class="kotakisi">
		<div class="identitas">
			<p>Nama: <?= $nama ?></td>
		</div>
		<div class="identitas">
			<p>Kelas: <?= $kelas ?></td>
		</div>
		<div class="identitas">
			<p>NPM: <?= $npm ?></td>
		</div>
	</div>
</body>
</html>