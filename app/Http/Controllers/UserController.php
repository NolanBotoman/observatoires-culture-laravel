<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
	public function displayAccount() {
        return view("account", [
            "news" => News::latest()->take(3)->get()
        ]);
    }

    public function updateAccount(Request $request) {
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'username' => 'required',
        ]);

        if ($validator->fails()) {
            $request->session()->flash('message', "Navré, il est impossible de mettre à jour votre compte avec des valeurs nulles.");
            return redirect()->route('account');
        }

        $data = [
        	'username' => $request->name,
            'email' => $request->email,
        ]

        if($request->password) {
        	array_push($data, 'password' => Hash::make($request->password));
        }

        User::where('id', $request->user()->id)->update($data);

        $request->session()->flash('message', "Votre compte a été mis à jour avec succès.");
        return redirect()->route('account');
    }
}