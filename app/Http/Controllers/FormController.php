<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;

// ...
class FormController extends Controller
{

    /**
    * Task 1: Request Validation
    *
    *Implement request validation for a registration form that contains 
    *the following fields: name, email, and password. 
    *Validate the following rules:
    */

    //Answer - 1

    public function registerValidation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2',
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        // Proceed with registration logic if the validation passes
    
        // ...
    }
    
    public function RedirectsReq(Request $request) 
    {
        return new RedirectResponse('/dashboard', 302);
    }

    
       
}
