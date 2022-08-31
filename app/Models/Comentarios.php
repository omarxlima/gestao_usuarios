<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    use HasFactory;

    protected $table = 'comentarios';

    protected $fillable = [
        'body',
        'visible'
    ];

    protected $casts = [
        'visible' => 'boolean'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
