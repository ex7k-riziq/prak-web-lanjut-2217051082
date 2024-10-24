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
        <label for="jurusan">Jurusan:</label>
        <select name="jurusan" id="jurusan" required>
            <option value="fisika" {{ $user->jurusan == 'fisika' ? 'selected' : '' }}>Fisika</option>
            <option value="kimia" {{ $user->jurusan == 'kimia' ? 'selected' : '' }}>Kimia</option>
            <option value="biologi" {{ $user->jurusan == 'biologi' ? 'selected' : '' }}>Biologi</option>
            <option value="matematika" {{ $user->jurusan == 'matematika' ? 'selected' : '' }}>Matematika</option>
            <option value="ilmu komputer" {{ $user->jurusan == 'ilmu komputer' ? 'selected' : '' }}>Ilmu Komputer</option>
        </select>
        </p>
        <p>
        <label for="semester">Semester:</label>
        <input type="number" id="semester" name="semester" value="{{ old('semester', $user->semester) }}" min="1" max="14" required><br>
        </p>
        <p>
        <label for="fakultas">Fakultas:</label>
        <select name="fakultas_id" id="fakultas_id" required>
            @foreach ($fakultas as $fakultasItem)
                <option value="{{ $fakultasItem->id }}" 
                    {{ $fakultasItem->id == $user->fakultas_id ? 'selected' : '' }}>
                    {{ $fakultasItem->nama_fakultas }}
                </option>
            @endforeach
        </select>
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