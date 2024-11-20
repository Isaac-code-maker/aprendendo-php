<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upost extends Model
{
    use HasFactory;

    protected $table = 'upost';

    protected $fillable = ['title', 'body', 'user_id'];

    public function user(){
        return $this-> belongsTo(User::class, 'user_id');
    }
}
