<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function new_basic_form()
    {
        return view('forms.basic_form'); // form show view
    }
}
