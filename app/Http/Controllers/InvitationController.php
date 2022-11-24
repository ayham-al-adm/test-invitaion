<?php

namespace App\Http\Controllers;

use App\Events\AddNewInvitation;
use App\Http\Requests\Invitations\InvitationPostRequest;
use App\Models\Invitation;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invitations = Invitation::latest()->paginate(10);
        return view('invitations.index', ['invitations' => $invitations]);
    }
    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response

     */
    public function create()
    {
        return view('invitations.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request   $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvitationPostRequest $request)
    {
        $invitation = Invitation::create($request->validated());
        event(new AddNewInvitation($invitation));
        return redirect()->route('invitations.index');
    }
    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        //
    }
    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id)

    {

        //

    }
    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request   $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //

    }
    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
