@extends('app')

@section('content') 
    <div class="kotakisi">
    <a href="{{ route('user.create') }}" class="tombol">Tambah Pengguna Baru</a>
        <table class="tabeluser"> 
            <thead> 
                <tr> 
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>Semester</th>
                    <th>Fakultas</th>
                    <th>Operasi</th>
                </tr>
            </thead>
            <tbody> 
                @if ($users && count($users) > 0)
                    @foreach ($users as $user)
                        <tr> 
                            <td>
                            @if ($user['foto'])
                                <img src="{{ asset('storage/uploads/' . $user['foto']) }}" alt="User Photo" width="100" height="100">
                            @else
                                Tidak ada foto
                            @endif
                            </td>
                            <td>{{ $user['nama'] }}</td> 
                            <td>{{ $user->kelas->nama_kelas }}</td>
                            <td>{{ $user['jurusan'] }}</td>
                            <td>{{ $user['semester'] }}</td>
                            <td>{{ $user->fakultas->nama_fakultas }}</td>
                            <td>
                                <a href="{{ route('users.show', $user->id) }}" class="tombolcek">Detail</a>
                                <br>
                                <a href="{{ route('user.edit', $user->id) }}" class="tombolcek">Edit</a>
                                <br>
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="tombolcekmerah"
                                        onclick="return confirm('Yakin ingin hapus pengguna ini?')">Hapus</button>
                                </form>
                            </td>

                        </tr> 
                    @endforeach
                @else
                    <tr>
                        <td colspan="7">Tidak ada data pengguna.</td>
                    </tr>
                @endif
            </tbody> 
        </table>
    </div>
@endsection
