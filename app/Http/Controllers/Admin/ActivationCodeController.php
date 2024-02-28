<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ActivatedCode;
use App\Models\ActivationCode;
use App\Http\Controllers\Controller;

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


    // public function codeDetails($serial_code){
    //     $code = ActivationCode::where('serial_code', $serial_code)->first();

    //     $user = User::where('pass_code', $code->code)->first();

    //     return view('admin.accessCodes.show', [
    //        'code' => $code,
    //        'user' => $user
    //     ]);
    //     // return view('admin.accessCodes.show', compact('code'));
    // }


    public function codeDetails($serial_code) {

        $code = ActivationCode::where('serial_code', $serial_code)->first();

        $user = User::where('pass_code', $code->code)->first();

        $activatedCode = null;

        if($user) {
          $activatedCode = ActivatedCode::where('code_id', $code->id)
                                       ->orWhere('user_id', $user->id)
                                       ->first();
        }

        return view('admin.accessCodes.show', compact('code', 'user', 'activatedCode'));

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
