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

    public function matchMention () {
        $match = preg_match("/@([A-Za-z0-9_]+)/", $this->body);
        
        $position = strpos($this->body, '@');
        
        $next = $position + 1;
        
        return $match;
    }

    public function stripString () {
        return $string = preg_replace("/[@]/", '', $this->body);
    }
}
