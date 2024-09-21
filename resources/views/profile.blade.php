<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tes</title>
	<link href="{{ asset('assets/css/blade1.css') }}" rel="stylesheet">
</head>
<body>
	<div class="kotakisi">
		<img src="{{asset('assets/img/profile2.png')}}" alt="Avatar">
		<div class="identitas">
			<p>Nama: {{ $nama }}</p>
		</div>
		<div class="identitas">
			<p>Kelas: {{ $nama_kelas ?? 'Kelas tidak ditemukan' }}</p>
		</div>
		<div class="identitas">
			<p>NPM: {{ $npm }}</p>
		</div>
	</div>
</body>
</html>