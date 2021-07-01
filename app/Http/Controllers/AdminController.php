<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create(){
        return view('admin.create');
    }

    public function store(Request $request){
        return redirect('admin/store');
    }
}
