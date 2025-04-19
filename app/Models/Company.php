<?php

namespace App\Models;

use Dotenv\Repository\Adapter\GuardedWriter;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $guarded = [];

    public function members()
    {
        return $this->belongsToMany(User::class, "company_user", "company_id", "user_id");

    }

    public function clients()
    {
        return $this->hasMany(Client::class);
    } 
}
