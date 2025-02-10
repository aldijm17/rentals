<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customers extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $primaryKey = 'id_customer';
    protected $fillable = [
        'nama',
        'alamat',
        'no_telpon',
        'email',
    ];
    public function rentals(){
        return $this->hasMany(Rentals::class, 'id_customer');
    }
}
