<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bicycle extends Model
{
    use HasFactory;

    protected $table = 'bicycles';
    protected $primaryKey = 'id_bicycle';
    protected $fillable = [
        'merk',
        'foto',
        'tipe',
        'warna',
        'harga_sewa',
        'status',
    ];
    public function rentals(){
        return $this->hasMany(Rentals::class, 'id_bicycle');
    }
}
