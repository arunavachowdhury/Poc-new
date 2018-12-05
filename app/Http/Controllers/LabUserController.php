<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lab;
use App\User;

class LabUserController extends Controller
{
    public function allocateUser(Request $request ,$id)
    {
        dd($request);
        $lab = Lab::findOrFail($id);
        $user = User::findOrFail($request->id);


    }
}
