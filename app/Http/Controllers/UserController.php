<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Product;

class UserController extends Controller
{
    public function login(Request $request){
        
        // validate inputs
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required',
        ]);

        // check user
        $user = User::where('email', $request->email)->first();
        if($user){
            $result = Hash::check($request->password, $user->password);
            if ($result) {

                // get product list
                $products = Product::all();
                return view('dashboard', compact('products'));
            }else{
                return redirect()->route('landing')->with('error', 'Credentioals doesn\'t match');
            }
        }else{
            return redirect()->route('landing')->with('error', 'Credentioals doesn\'t match');
        }

    }
}
