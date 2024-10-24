<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FakultasModel extends Model
{
    protected $table = 'fakultas';
    
    public function getFakultas(){
        return $this->all();
    }
}
