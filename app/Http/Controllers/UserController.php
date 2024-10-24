<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\KelasModel;
use App\Http\Requests\UserRequest;
use App\Models\FakultasModel;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;
    public $fakultasModel;

    public function __construct(){
        $this->userModel = new UserModel();
        $this->kelasModel = new KelasModel();
        $this->fakultasModel = new FakultasModel();
    }

    public function create()
    {
        $kelas = $this->kelasModel->getKelas();
        $fakultas = $this->fakultasModel->getFakultas();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
            'fakultas' => $fakultas,
        ];

        return view('create_user', $data);
    }

    public function destroy($id){
        $user = UserModel::findOrFail($id);
        $user->delete();

        return redirect()->route('list_user')->with('Sukses', 'Pengguna telah dihapus');
    }

    public function edit($id){
        $user = UserModel::findOrFail($id);
        $kelas = $this->kelasModel->getKelas();
        $fakultas = $this->fakultasModel->getFakultas();
        $title = 'Edit User';
        return view('edit_user', compact('user', 'kelas', 'fakultas', 'title'));
    }

    public function index()
    {
        // $users = UserModel::join('kelas', 'kelas.id', '=', 'user.kelas_id', 'fakultas', 'fakultas.id', '=', 'user.fakultas_id')
        //         ->select('user.*', 'kelas.nama_kelas as nama_kelas', 'fakultas.nama_fakultas as nama_fakultas')
        //         ->get();

        $users = UserModel::get();
     
        $data = [
            'title' => 'List User',
            'users' => $users
        ];

        return view('list_user', $data);
    }


    public function profile($nama = "", $semester = "", $kelas = "", $fakultas = "", $jurusan = "")
    {
        $data = [
            'nama' => $nama,
            'semester' => $semester,
            'kelas' => $kelas,
            'fakultas' => $fakultas,
            'jurusan' => $jurusan,
        ];
        return view('profile', $data);
    }

    public function show($id){
        $user = UserModel::findOrFail($id); 
        $kelas = KelasModel::find($user->kelas_id); 
        $fakultas = FakultasModel::find($user->fakultas_id);

        $title = 'Detail ' . $user->nama; 

        return view('profile', compact('user', 'kelas', 'fakultas', 'title'));
    }
    
    

    public function store(Request $request){ 

        $request->validate([
            'nama' => 'required',
            'semester' => 'required|min:1|max:14',
            'kelas_id' => 'required',
            'fakultas_id' => 'required',
            'jurusan' => 'required|in:fisika,kimia,biologi,matematika,ilmu komputer',
            'foto' => 'image|file|max:4096',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads', $filename); 

            $this->userModel->create([
                'nama' => $request->input('nama'),
                'semester' => $request->input('semester'),
                'kelas_id' => $request->input('kelas_id'),
                'fakultas_id' => $request->input('fakultas_id'),
                'jurusan' => $request->input('jurusan'),
                'foto' => $filename,
            ]);
        }
        
        return redirect()->route('list_user')->with('Sukses', 'Pengguna berhasil ditambahkan');            
    }

    public function update(Request $request, $id){
        $user = UserModel::findOrFail($id);

    $request->validate([
        'nama' => 'required',
        'semester' => 'required|min:1|max:14',
        'kelas_id' => 'required',
        'fakultas_id' => 'required',
        'jurusan' => 'required|in:fisika,kimia,biologi,matematika,ilmu komputer',
        'foto' => 'image|file|max:4096',
    ]);

    $user->nama = $request->input('nama');
    $user->semester = $request->input('semester');
    $user->kelas_id = $request->input('kelas_id');
    $user->fakultas_id = $request->input('fakultas_id');
    $user->jurusan = $request->input('jurusan');

    if ($request->hasFile('foto')) {
        if ($user->foto && \Storage::disk('public')->exists('uploads/' . $user->foto)) {
            \Storage::disk('public')->delete('uploads/' . $user->foto);
        }

        $file = $request->file('foto');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('uploads', $filename, 'public');

        $user->foto = $filename;
    }

    $user->save();

        return redirect()->route('list_user')->with('Sukses', 'Pengguna telah diperbarui');
    }
}
