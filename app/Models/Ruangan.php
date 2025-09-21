<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'ruangan';
    protected $guarded;

    public function pic()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

}
