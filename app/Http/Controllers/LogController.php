<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use Carbon\Carbon;

class LogController extends Controller
{


    public function storeLogData()
    {
        // Data yang ingin dimasukkan
        $data = [
            'created_at' => Carbon::now(),  // Menggunakan waktu sekarang
            'type' => 'query',
            'content' => [
                'connection' => 'mongodb',
                'query' => [
                    'find' => 'users',
                    'filter' => [
                        '_id' => [
                            '$eq' => 1
                        ]
                    ]
                ]
            ]
        ];


        // Membuat instance baru dari model Log dan menyimpan data
        $log = Log::create($data);

        // Mengembalikan respons atau data yang telah disimpan
        return response()->json($log);
    }
    public function storeLoop()
    {
        // Membuat instance baru dari model Log dan menyimpan data
        for ($i = 0; $i < 100; $i++) {
            $data = [
                'created_at' => Carbon::now(),  // Update waktu untuk setiap log
                'type' => 'query',
                'content' => [
                    'connection' => 'mongodb',
                    'query' => [
                        'find' => 'users',
                        'filter' => [
                            'wew' => [
                                
                            ]
                        ]
                    ]
                ]
            ];

            $log = Log::create($data);  // MongoDB akan otomatis menambahkan _id unik
        }

        // Mengembalikan respons atau data yang telah disimpan
        return response()->json("success");
    }

}
