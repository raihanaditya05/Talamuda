<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Data dummy untuk contoh tampilan dashboard
        $data = [
            'total_proyek' => 12,
            'proyek_selesai' => 8,
            'proyek_berjalan' => 4,
        ];

        return view('dashboard', compact('data'));
    }
}
