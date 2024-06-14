<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    //
    public function index()
    {
        // $sliders = $this->slider->latest()->paginate(5);
        // return view('admin.slider.index', compact('sliders'));
        return view('admin.settings.index');
    }
}
