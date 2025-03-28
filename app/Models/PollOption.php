<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
    ];

    public function creator() {
        return $this->belongsTo(User::class);
    }   

    public function poll() {
        return $this->belongsTo(Poll::class);
    }   
    
    public function sekolah() {
        return $this->belongsTo(Sekolah::class);
    }        
    
    public function votes() {
        return $this->hasMany(PollVote::class);
    }    
    
    public function anon_votes() {
        return $this->hasMany(PollAnonVote::class);
    }      
    
}
