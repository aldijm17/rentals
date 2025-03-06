<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                'nama' => 'Customer Satu',
                'email' => 'customer1@example.com',
                'password' => Hash::make('password123'),
                'alamat' => 'Jl. Contoh No. 123, Jakarta',
                'no_telpon' => '081234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Customer Dua',
                'email' => 'customer2@example.com',
                'password' => Hash::make('password123'),
                'alamat' => 'Jl. Contoh No. 456, Bandung',
                'no_telpon' => '081234567891',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Customer Tiga',
                'email' => 'customer3@example.com',
                'password' => Hash::make('password123'),
                'alamat' => 'Jl. Contoh No. 789, Surabaya',
                'no_telpon' => '081234567892',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}