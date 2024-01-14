<?php

namespace App\back\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'password',
        'phone',
        'address',
        'status',
        'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getFullNameAttribute(){
        return "{$this->first_name} {$this->middle_name} {$this->last_name}";
    }

    public function setPasswordAttribute($value){
        $this->attributes['password']=Hash::make($value);
    }

    public function getIsAdminAttribute()
    {
        return $this->type =='Admin';
    }

    public function getIsStaffAttribute()
    {
        return $this->type=='Staff';
    }

}
