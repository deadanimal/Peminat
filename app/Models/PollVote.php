<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollVote extends Model
{
    use HasFactory;

    public function voter() {
        return $this->hasMany(User::class);
    }      
    
    public function poll() {
        return $this->belongsTo(Poll::class);
    }    
    
    public function option() {
        return $this->belongsTo(PollOption::class);
    }            
    
}
