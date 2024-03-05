<?php

namespace App\Http\Controllers;

class LocaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('organization_structure.locale.index');
    }
}
