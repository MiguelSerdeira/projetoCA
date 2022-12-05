<?php

namespace App\Http\Controllers\Actl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TaxRate;


class TaxRateController extends Controller
{    
    public function TaxRateAll(){

        $taxRate = TaxRate::latest()->get();
        return view('backend.taxRate.taxRate_all', compact('taxRate'));
    }
}
