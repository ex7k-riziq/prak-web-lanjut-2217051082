<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $fillable = ['id', 'nama', 'npm', 'kelas_id'];

    public function kelas(){
        return $this->belongsTo(KelasModel::class, 'kelas_id');
    }

    public function getUser(){ 
        return $this->join('kelas', 'kelas.id', '=', 'user.kelas_id')->select('user.*', 'kelas.nama_kelas as nama_kelas')->get(); 
    }
}
