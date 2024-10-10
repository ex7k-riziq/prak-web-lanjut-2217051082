<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\KelasModel;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function __construct(){
        $this->userModel = new UserModel();
        $this->kelasModel = new KelasModel();
    }

    public function create()
    {
        $kelas = $this->kelasModel->getKelas();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
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
        $title = 'Edit User';
        return view('edit_user', compact('user', 'kelas', 'title'));
    }

    public function index()
    {
        $users = UserModel::join('kelas', 'kelas.id', '=', 'user.kelas_id')
                ->select('user.*', 'kelas.nama_kelas as nama_kelas')
                ->get();

     
        $data = [
            'title' => 'List User',
            'users' => $users
        ];

        return view('list_user', $data);
    }


    public function profile($nama = "", $kelas = "", $npm = "")
    {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm,
        ];
        return view('profile', $data);
    }

    public function show($id){
        $user = UserModel::findOrFail($id); 
        $kelas = KelasModel::find($user->kelas_id); 

        $title = 'Detail ' . $user->nama; 

        return view('profile', compact('user', 'kelas', 'title'));
    }
    
    

    public function store(Request $request){ 

        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoPath = $foto->move(('upload/img'), $foto);
        } else {
            $fotoPath = null;
        }

        $this->userModel->create([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
            'foto' => $fotoPath, 
        ]);

        return redirect()->route('list_user')->with('Sukses', 'Pengguna berhasil ditambahkan');            
    }

    public function update(Request $request, $id){
        $user = UserModel::findOrFail($id);

        $user->nama = $request->nama;
        $user->kelas_id = $request->kelas_id;
        $user->npm = $request->npm;

        if ($request->hasFile('foto')) {
            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('uploads'), $fileName);
            $user->foto = 'uploads/' . $fileName;
        }

        $user->save();

        return redirect()->route('list_user')->with('Sukses', 'Pengguna telah diperbarui');
    }
}
