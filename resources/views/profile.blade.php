<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ $user->nama }}</title>
	<link href="{{ asset('assets/css/blade1.css') }}" rel="stylesheet">
</head>
<body>
<div class="kotakisi">
        <img src="{{ asset('storage/uploads/' . $user->foto) }}" alt="Avatar">
        <div class="identitas">
            <p>Nama: {{ $user->nama }}</p>
        </div>
        <div class="identitas">
            <p>Kelas: {{ $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan'}}</p>
        </div>
        <div class="identitas">
            <p>Jurusan: {{ $user->jurusan }}</p>
        </div>
        <div class="identitas">
            <p>Semester: {{ $user->semester }}</p>
        </div>
        <div class="identitas">
            <p>Fakultas: {{ $user->fakultas->nama_fakultas ?? 'Fakultas tidak ditemukan' }}</p>
        </div>
        </div>
</body>
</html>