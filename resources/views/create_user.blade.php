@extends('app')

@section('content')
<div class="kotakisi">
    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <p>
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama"><br>
        </p>
        <p>
        <label for="kelas">Kelas:</label>
        <select name="kelas_id" id="kelas_id">
            @foreach ($kelas as $kelasItem)
            <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
            @endforeach
        </select>
        </p>
        <p>
        <label for="jurusan">Jurusan:</label>
        <select name="jurusan" id="jurusan" required>
            <option value="fisika">Fisika</option>
            <option value="kimia">Kimia</option>
            <option value="biologi">Biologi</option>
            <option value="matematika">Matematika</option>
            <option value="ilmu komputer">Ilmu Komputer</option>
        </select>
        </p>
        <p>
        <label for="semester">Semester:</label>
        <input type="number" id="semester" name="semester" min="1" max="14" required><br>
        </p>
        <p>
        <label for="fakultas">Fakultas:</label>
        <select name="fakultas_id" id="fakultas_id" required>
            @foreach ($fakultas as $fakultasItem)
            <option value="{{ $fakultasItem->id }}">{{ $fakultasItem->nama_fakultas }}</option>
            @endforeach
        </select>
        </p>
        <p>
        <label for="foto">Foto:</label><br>
        <input type="file" id="foto" name="foto"><br>
        </p>
        <p>
        <button type="submit">Submit</button>
        </p>
    </form>
</div>
@endsection