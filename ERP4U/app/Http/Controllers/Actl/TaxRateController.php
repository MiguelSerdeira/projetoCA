<?php

namespace App\Http\Controllers\Actl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TaxRate;
use Auth;
use Illuminate\Support\Carbon;


class TaxRateController extends Controller
{
    public function TaxRateAll()
    {

        $taxRate = TaxRate::latest()->get();
        return view('backend.taxRate.taxRate_all', compact('taxRate'));
    }

    public function TaxRateAdd()
    {
        return view('backend.taxRate.taxRate_add');
    }

    public function TaxRateStore(Request $request)
    {
        TaxRate::insert([
            'TaxRateCode' => $request->TaxRateCode,
            'DescriptionTaxRate' => $request->DescriptionTaxRate,
            'TaxRate' => $request->TaxRate,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Tax Rate Successfully Inserted.',
            'alert-type' => 'success'
        );

        return redirect()->route('taxRate.all')->with($notification);
    }

    public function TaxRateEdit($id)
    {
        $taxRate = TaxRate::findOrFail($id);
        return view('backend.taxRate.taxRate_edit', compact('taxRate'));
    }

    public function TaxRateUpdate(Request $request)
    {
        $taxRate_id = $request->id;
        TaxRate::findOrFail($taxRate_id)->update([
            'TaxRateCode' => $request->TaxRateCode,
            'DescriptionTaxRate' => $request->DescriptionTaxRate,
            'TaxRate' => $request->TaxRate,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);


        $notification = array(
            'message' => 'Tax Rate Successfully Updated.',
            'alert-type' => 'success'
        );

        return redirect()->route('taxRate.all')->with($notification);
    }

    public function TaxRateDelete($id)
    {

        TaxRate::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Tax Rate Deleted Successfuly.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}