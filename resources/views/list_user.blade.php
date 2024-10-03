@extends('app')

@section('content') 
    <div class="kotakisi">
    <a href="{{ route('user.create') }}" class="tombol">Tambah Pengguna Baru</a>
        <table class="tabeluser"> 
            <thead> 
                <tr> 
                    <th>Nama</th>
                    <th>NPM</th>
                    <th>Kelas</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody> 
                @if ($users && count($users) > 0)
                    @foreach ($users as $user)
                        <tr> 
                            <td>{{ $user['nama'] }}</td> 
                            <td>{{ $user['npm'] }}</td> 
                            <td>{{ $user['nama_kelas'] }}</td> 
                            <td><a href="{{ route('users.show', $user->id) }}" class="tombolcek">Detail</a></td>
                        </tr> 
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Tidak ada data pengguna.</td>
                    </tr>
                @endif
            </tbody> 
        </table>
    </div>
@endsection
