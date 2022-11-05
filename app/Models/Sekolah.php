<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'latitude',
        'longitude',
    ];

    public function voters() {
        return $this->hasMany(User::class);
    }  
    
    public function options() {
        return $this->hasMany(PollOption::class);
    }     
    
    public function polls() {
        return $this->belongsToMany(Poll::class);
    }         

}
