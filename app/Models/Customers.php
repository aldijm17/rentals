<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Customers extends Authenticatable
{
    protected $table = 'customers';
    protected $primaryKey = 'id_customer';
    
    protected $fillable = ['nama', 'email', 'password', 'alamat', 'no_telpon'];
    
    protected $hidden = ['password'];
}