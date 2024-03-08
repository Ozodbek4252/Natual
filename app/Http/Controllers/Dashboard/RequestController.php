<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\RequestModel;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = RequestModel::orderBy('created_at', 'desc')->paginate(20);
        return view('dashboard.requests.index', compact('requests'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:255',
        ]);

        RequestModel::query()->create($request->only(['name', 'number']));

        return redirect()->back()->with('success', 'Request has been sent successfully');
    }
}
