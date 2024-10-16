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
            'nama' => 'required',
            'npm' => 'required',
            'kelas_id' => 'required',
            'foto' => 'image|file|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads', $filename); 

            $this->userModel->create([
                'nama' => $request->input('nama'),
                'npm' => $request->input('npm'),
                'kelas_id' => $request->input('kelas_id'),
                'foto' => $filename,
            ]);
        }
        
        return redirect()->route('list_user')->with('Sukses', 'Pengguna berhasil ditambahkan');            
    }

    public function update(Request $request, $id){
        $user = UserModel::findOrFail($id);

    $request->validate([
        'nama' => 'required',
        'npm' => 'required',
        'kelas_id' => 'required',
        'foto' => 'image|file|max:2048',
    ]);

    $user->nama = $request->input('nama');
    $user->kelas_id = $request->input('kelas_id');
    $user->npm = $request->input('npm');

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
