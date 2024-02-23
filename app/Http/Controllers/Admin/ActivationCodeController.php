<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivatedCode;
use App\Models\ActivationCode;
use Illuminate\Http\Request;

class ActivationCodeController extends Controller
{
    public function index(){
        $codes = ActivationCode::latest()->get();
        // dd($codes);
        return view('admin.accessCodes.index', compact('codes'));
    }

    public function create(){
        return view('admin.accessCodes.create');
    }

    public function store(Request $request){

        $request->validate([
            'code' => 'required',
            'serial_code' => 'required'
        ]);
        ActivationCode::create([
            'code' => $request->input('code'),
            'serial_code' => $request->input('serial_code'),
            'status' => 'inactive'
        ]);
        $notification = array(
            'message' => 'New Code Generated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.activationCode.view')->with($notification);
    }

    public function destroy(String $serial_code){
        $code = ActivationCode::where('serial_code', $serial_code)->first();
        $code->delete();
        $notification = array(
            'message' => 'Code Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.activationCode.view')->with($notification);
    }
}
