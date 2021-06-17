<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lweet extends Model
{
    use HasFactory, Likable;

    protected $fillable = ['body'];
    
    public function user () {
        return $this->belongsTo(User::class);
    }
}
