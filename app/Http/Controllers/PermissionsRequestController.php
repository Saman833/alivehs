<?php

namespace App\Http\Controllers;

use App\Models\PermissionsRequest;
use Illuminate\Http\Request;

class PermissionsRequestController extends Controller
{
    public function permissionsRequest() {
        $user=auth()->user();
        if (!PermissionsRequest::where("user_id",$user->id)->get()) {
            PermissionsRequest::create([
                'user_id' => $user->id
            ]);
        }
        return redirect()->back();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(PermissionsRequest $permissionsRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PermissionsRequest $permissionsRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PermissionsRequest $permissionsRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PermissionsRequest $permissionsRequest)
    {
        //
    }
}
