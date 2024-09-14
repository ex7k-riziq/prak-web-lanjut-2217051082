<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tes2</title>
    <link href="{{ asset('assets/css/blade1.css') }}" rel="stylesheet">
</head>
<body>
	<form action="{{route('user.store')}}" method="POST">
		@csrf
		<p>
            <label>Nama: </label>
            <input type="text" name="nama" />
        </p>
        <p>
            <label>NPM: </label>
            <input type="text" name="npm" />
        </p>
        <p>
            <label>Kelas: </label>
            <input type="text" name="kelas" />
        </p>
        <p>
            <input type="submit" name="submit" value="Masukkan" />
        </p>
	</form>
</body>
</html>