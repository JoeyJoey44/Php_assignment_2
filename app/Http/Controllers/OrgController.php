<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Org;
use Illuminate\Support\Facades\Auth;

class OrgController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        echo (Auth::id());
        $orgs = Org::where('user_id', Auth::id())->latest('updated_at')->get();
        return view("orgs.index", ['orgs' => $orgs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
