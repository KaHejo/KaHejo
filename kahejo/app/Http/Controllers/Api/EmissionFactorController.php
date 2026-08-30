<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmissionFactorController extends Controller
{
    /**
     * Get reference emission factors table.
     */
    public function index()
    {
        $factors = DB::table('emission_factors')->get();

        return response()->json([
            'success' => true,
            'message' => 'Tabel faktor emisi resmi berhasil dimuat.',
            'data' => $factors,
        ]);
    }
}
