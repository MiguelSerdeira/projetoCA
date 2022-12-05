<?php

namespace App\Http\Controllers\Actl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UnitMeasure;

class UnitMeasureController extends Controller
{
    public function UnitMeasureAll(){

        $unitMeasure = UnitMeasure::latest()->get();
        return view('backend.UnitMeasure.unitMeasure_all', compact('unitMeasure'));
    }
}
