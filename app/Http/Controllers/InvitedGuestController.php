<?php

namespace App\Http\Controllers;

use App\Models\InvitedGuest;
use Illuminate\Http\Request;

class InvitedGuestController extends Controller
{

    public function index()
    {
        return response()->json(InvitedGuest::all(), 200);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show(InvitedGuest $invitedGuest)
    {
        //
    }


    public function edit(InvitedGuest $invitedGuest)
    {
        //
    }


    public function update(Request $request, InvitedGuest $invitedGuest)
    {
        //
    }


    public function destroy(InvitedGuest $invitedGuest)
    {
        //
    }
}
