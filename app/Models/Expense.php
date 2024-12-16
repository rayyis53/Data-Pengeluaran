<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi secara mass assignment
    protected $fillable = [
        'title',        // Judul pengeluaran
        'amount',       // Nominal
        'description',  // Deskripsi
        'date',         // Tanggal pengeluaran
    ];
}
