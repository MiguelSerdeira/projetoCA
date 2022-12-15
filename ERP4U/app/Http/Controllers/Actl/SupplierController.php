<?php

namespace App\Http\Controllers\Actl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\PostalCode;

use Auth;
use Illuminate\Support\Carbon;


class SupplierController extends Controller
{
  public function SupplierAll()
  {
    $supplier = Supplier::latest()->get();
    return view('backend.supplier.supplier_all', compact('supplier'));
  }
  public function SupplierAdd()
  {
    $postalCode = PostalCode::all();
    return view('backend.supplier.supplier_add', compact('postalCode'));
  }

  public function SupplierStore(Request $request)
  {
    Supplier::insert([
      'code' => $request->code,
      'name' => $request->name,
      'postalCode' => $request->postalCode,
      'nif' => $request->nif,
      'town' => $request->town,
      'created_by' => Auth::user()->id,
      'created_at' => Carbon::now(),
    ]);

    $notification = array(
      'message' => 'Supplier Successfully Inserted.',
      'alert-type' => 'success'
    );

    return redirect()->route('supplier.all')->with($notification);
  }

  public function SupplierEdit($id)
  {
    $postalCode = PostalCode::all();
    $supplier = Supplier::findOrFail($id);
    
    return view('backend.supplier.supplier_edit', compact('postalCode', 'supplier'));
  }

  public function SupplierUpdate(Request $request)
  {
    $supplier_id = $request->id;
    Supplier::findOrFail($supplier_id)->update([
      'code' => $request->code,
      'name' => $request->name,
      'postalCode' => $request->postalCode,
      'nif' => $request->nif,
      'town' => $request->town,
      'created_by' => Auth::user()->id,
      'created_at' => Carbon::now(),
    ]);


    $notification = array(
      'message' => 'Supplier Successfully Updated.',
      'alert-type' => 'success'
    );

    return redirect()->route('supplier.all')->with($notification);
  }

  public function SupplierDelete($id)
  {

    Supplier::findOrFail($id)->delete();
    $notification = array(
      'message' => 'Supplier Deleted Successfuly.',
      'alert-type' => 'success'
    );
    return redirect()->back()->with($notification);
  }
}