<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }

        return view('admin.dashboard');
    }
}
