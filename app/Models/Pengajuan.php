<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    //
    protected $table = 'pengajuan';

    protected $guarded = [];

    public function penilaian()
    {

        return $this->hasOne(Penilaian::class, 'uuid_pengajuan', 'uuid');
    }
}
