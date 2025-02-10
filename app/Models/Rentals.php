<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Rentals extends Model
{
    use Hasfactory;
    protected $table = 'rentals';
    protected $primaryKey = 'id_rental';
    protected $fillable = [
        'id_customer',
        'id_bicycle',
        'tanggal_sewa',
        'tanggal_sewa',
        'tanggal_kembali',
        'total_biaya',
        'status',
    ];

    public function customers(){
        return $this->belongsTo(Customers::class, 'id_customer');
    }
    public function bicycles(){
        return $this->belongsTo(Bicycle::class, 'id_bicycle');
    }
}
