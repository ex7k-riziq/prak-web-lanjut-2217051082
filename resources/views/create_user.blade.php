<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tes2</title>
    <link href="{{ asset('assets/css/blade1.css') }}" rel="stylesheet">
</head>
<body>
    <div class="kotakisi">
        <form action="{{route('user.store')}}" method="POST">
            @csrf
            <p>
                <label>Nama: </label>
                <input type="text" name="nama" required/>
            </p>
            <p>
                <label>Kelas: </label>
                <select name="kelas_id" id="kelas_id" required>
                    @foreach ($kelas as $kelasItem)
                    <option value="{{$kelasItem->id}}">{{$kelasItem->nama_kelas}}</option>
                    @endforeach
                </select>
            </p>
            <p>
                <label>NPM: </label>
                <input type="text" name="npm" required/>
            </p>
            <p>
                <input type="submit" name="submit" value="Masukkan" />
            </p>
        </form>
    </div>
</body>
</html>