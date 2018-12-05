<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lab;
use App\User;

class LabUserController extends Controller
{
    public function allocateUser(Request $request ,$id)
    {
        $lab = Lab::findOrFail($id);
        $technician = User::findOrFail($request->technician_id);
        $lab->users()->attach($technician);
        return redirect()->back();
    }
}
