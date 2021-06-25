<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lweet extends Model
{
    use HasFactory, Relweetable, Likable;

    protected $fillable = ['body', 'image'];
    
    public function getImageAttribute ($value) {
        if ($value) {
            return asset('storage/' . $value);
        }
    }
    
    public function user () {
        return $this->belongsTo(User::class);
    }
}
