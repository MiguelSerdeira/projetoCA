<?php

namespace App\Http\Controllers\Actl;

use App\Http\Controllers\Controller;
use App\Models\PostalCode;
use Illuminate\Http\Request;

class PostalCodeController extends Controller
{
    public function PostalCodeAll(){
        $postalCodes = PostalCode::latest()->get();
        return view('backend.postalCode.postalCode_all',compact('postalCodes'));
    }
}
