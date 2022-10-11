<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    /**
     * @throws \Exception
     */
    public function datatable()
    {
        $user = User::get(['id', 'name', 'email']);
        return DataTables::of($user)->make(true);
    }
}
