<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $fillable = [
        'foto_id',
        'users_id',
    ];
    protected $table = 'like';

    //nilai balik ke user
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    //nilai balik ke foto
    public function foto()
    {
        return $this->belongsTo(Foto::class, 'foto_id', 'id');
    }
}
