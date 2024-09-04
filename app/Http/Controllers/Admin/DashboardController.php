<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peralatan;
use App\Models\Personil;
use App\Models\Portofolio;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // dd(Auth::user()->role);
        $count = [
            'peralatan' => Peralatan::count(),
            'personil' => Personil::count(),
            'portofolio' => Portofolio::count() 
            // 'proyek' => Permission::count()
        ];
        return view('admin.pages.dashboard', [
            'title' => 'Dashboard',
            'count' => $count
        ]);
    }
}
