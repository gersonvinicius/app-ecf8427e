<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movimentation;

class MovimentationController extends Controller
{
    public function index()
    {
        $data = Movimentation::select('sku','qty','date_hour')->get();
        return response()->json($data);
    }
}
