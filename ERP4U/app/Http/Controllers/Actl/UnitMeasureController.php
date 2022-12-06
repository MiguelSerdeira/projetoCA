<?php

namespace App\Http\Controllers\Actl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UnitMeasure;
use Auth;
use Illuminate\Support\Carbon;

class UnitMeasureController extends Controller
{
    public function UnitMeasureAll()
    {

        $unitMeasure = UnitMeasure::latest()->get();


        return view('backend.unitMeasure.unitMeasure_all', compact('unitMeasure'));
    }

    public function UnitMeasureAdd()
    {
        return view('backend.unitMeasure.unitMeasure_add');
    }

    public function UnitMeasureStore(Request $request)
    {
        UnitMeasure::insert([
            'Unit' => $request->Unit,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Unit Measure Successfully Inserted.',
            'alert-type' => 'success'
        );

        return redirect()->route('unitMeasure.all')->with($notification);
    }

    public function UnitMeasureEdit($id)
    {
        $unitMeasure = UnitMeasure::findOrFail($id);
        return view('backend.unitMeasure.unitMeasure_edit', compact('unitMeasure'));
    }

    public function UnitMeasureUpdate(Request $request)
    {
        $unitMeasure_id = $request->id;
        UnitMeasure::findOrFail($unitMeasure_id)->update([
            'Unit' => $request->Unit,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);


        $notification = array(
            'message' => 'Unit Measure Successfully Updated.',
            'alert-type' => 'success'
        );

        return redirect()->route('unitMeasure.all')->with($notification);
    }

    public function UnitMeasureDelete($id)
    {
        UnitMeasure::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Unit Measure Deleted Successfuly.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}