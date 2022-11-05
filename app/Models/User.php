<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sekolah() {
        return $this->belongsTo(Sekolah::class);
    }   
    
    public function polls() {
        return $this->hasMany(Poll::class);
    }   
    
    public function votes() {
        return $this->hasMany(PollAnswer::class);
    }  
    
    public function options() {
        return $this->hasMany(PollOption::class);
    }    
}
