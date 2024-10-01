@extends('app')

@section('content')
<div class="kotakisi">
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <p>
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama"><br>
        </p>
        <p>
        <label for="kelas">Kelas :</label>
        <select name="kelas_id" id="kelas_id">
            @foreach ($kelas as $kelasItem)
            <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
            @endforeach
        </select>
        </p>
        <p>
        <label for="npm">NPM : </label>
        <input type="text" id="npm" name="npm"><br>
        </p>
        <p>
        <button type="submit">Submit</button>
        </p>
    </form>
</div>
@endsection