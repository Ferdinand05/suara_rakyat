<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoleResources;
use App\Models\Role;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RoleController extends Controller
{
    public function index()
    {

        return Inertia::render('Role/RoleView', [
            'roles' => RoleResources::collection(Role::all())
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_role' => ['required', 'unique:roles,nama_role']
        ]);

        Role::create([
            'nama_role' => $request->nama_role
        ]);

        return redirect()->back();
    }
}
