<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;

    protected $fillable = [
        'soalan',
    ];

    public function creator() {
        return $this->belongsTo(User::class);
    }       

    public function votes() {
        return $this->hasMany(PollVote::class);
    }

    public function anon_votes() {
        return $this->hasMany(PollAnonVote::class);
    }    

    public function options() {
        return $this->hasMany(PollOption::class);
    }  
    
    public function sekolahs() {
        return $this->belongsToMany(Sekolah::class);
    }     
    
}
