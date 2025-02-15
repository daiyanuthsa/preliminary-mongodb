<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model as Eloquent;

class Log extends Eloquent
{
    protected $collection = 'logs';
    protected $connection = 'mongodb';

    protected $fillable = ['type', 'content', 'created_at'];  // Kolom yang bisa diisi

    // Menentukan bahwa `content` adalah array atau subdokumen
    protected $casts = [
        'content' => 'array',  // Menangani field 'content' sebagai array atau subdokumen
        'created_at' => 'datetime', // Menangani 'created_at' sebagai timestamp
    ];

    // Menentukan bahwa MongoDB akan mengelola _id secara otomatis
    public $timestamps = false;  // Jika Anda tidak ingin otomatis menambahkan created_at dan updated_at
}
