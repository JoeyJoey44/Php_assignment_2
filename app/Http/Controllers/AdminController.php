<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show all users.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.index', compact('users'));
    }

    /**
     * Approve/Unapprove user.
     */
    public function approve($id)
    {
        $user = User::findOrFail($id);
        $user->is_approved = !$user->is_approved;
        $user->save();

        return back()->with('success', 'User approval status updated.');
    }

    /**
     * Promote/Demote user.
     */
    public function promote($id)
    {
        $user = User::findOrFail($id);
        $user->role = ($user->role === 'Admin') ? 'Contributor' : 'Admin';
        $user->save();

        return back()->with('success', 'User role updated.');
    }
}
