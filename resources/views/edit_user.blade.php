@extends('app')

@section('content')
<div class="kotakisi">
    <form action="{{ route('user.update', $user['id']) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <p>
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="{{ old('nama', $user->nama) }}"><br>
        </p>
        <p>
        <label for="kelas">Kelas:</label>
        <select name="kelas_id" id="kelas_id" required>
            @foreach ($kelas as $kelasItem)
                <option value="{{ $kelasItem->id }}" 
                    {{ $kelasItem->id == $user->kelas_id ? 'selected' : '' }}>
                    {{ $kelasItem->nama_kelas }}
                </option>
            @endforeach
        </select>
        </p>
        <p>
        <label for="npm">NPM:</label>
        <input type="text" id="npm" name="npm" value="{{ old('npm', $user->npm) }}"><br>
        </p>
        <p>
        <label for="foto">Foto:</label><br>
        <input type="file" id="foto" name="foto">
        @if($user->foto)
            <img src="{{ asset('storage/uploads/' . $user->foto) }}" alt="User Photo" width="200">
        @endif
        <br>
        </p>
        <p>
        <button type="submit">Submit</button>
        </p>
    </form>
</div>
@endsection