@extends('app')

@section('content') 
    <div class="kotakisi">
        <table class="tabeluser"> 
            <thead> 
                <tr> 
                    <th>Nama</th>
                    <th>NPM</th>
                    <th>Kelas</th>
                </tr>
            </thead>
            <tbody> 
                @foreach ($users as $user) 
                    <tr> 
                        <td>{{ $user->nama }}</td> 
                        <td>{{ $user->npm }}</td> 
                        <td>{{ $user->nama_kelas }}</td> 
                    </tr> 
                @endforeach
            </tbody> 
        </table>
    </div>
@endsection
