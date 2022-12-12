<?php

namespace App\Http\Controllers\Actl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Auth;
use Illuminate\Support\Carbon;


class SupplierController extends Controller
{
    public function SupplierAll()
    {
        $supplier = Supplier::latest()->get();
        return view('backend.supplier.supplier_all', compact('supplier'));
    }
    public function SupplierAdd(){
        return view('backend.supplier.supplier_add');
    }

    public function SupplierStore(Request $request){
      Supplier::insert([
        'code' => $request-> code,
        'name' => $request-> name,
        'postalCode' => $request-> postalCode,
        'town' => $request-> town,
        'created_by' => Auth::user()->id,
        'created_at' => Carbon::now(),
      ]);

      $notification = array (
        'message' => 'Supplier Successfully Inserted.',
        'alert-type' => 'success'
      );

      return redirect()->route('postalCode.all')->with($notification);
    }

    public function PostalCodeEdit($id){
        $postalCode = PostalCode::findOrFail($id);
        return view('backend.postalCode.postalCode_edit', compact('postalCode'));
    }

    public function PostalCodeUpdate(Request $request){
       $postalCode_id = $request->id;
       PostalCode::findOrFail($postalCode_id)->update([
        'postalCode' => $request->postalCode,
        'location' => $request->location,
        'updated_by' => Auth::user()->id,
        'updated_at' => Carbon::now()
       ]);


      $notification = array (
        'message' => 'Postal Code Successfully Updated.',
        'alert-type' => 'success'
      );

      return redirect()->route('postalCode.all')->with($notification);
    }

    public function PostalCodeDelete($id){

      PostalCode::findOrFail($id)->delete();
      $notification = array(
          'message' => 'Postal Code Deleted Successfuly.',
          'alert-type' => 'success'
      );
        return redirect()->back()->with($notification);
    }
}