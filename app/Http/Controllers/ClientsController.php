<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Mail\Clientmail;
use Illuminate\Support\Facades\Mail;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Client::orderBy('created_at', 'DESC')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $addClient = new Client;
        $addClient->firstname = $request->client["firstname"];
        $addClient->lastname = $request->client["lastname"];
        $addClient->email = $request->client["email"];
        $addClient->dateprofiled = $request->client["dateprofiled"];
        $addClient->primarylegalcounsel = $request->client["primarylegalcounsel"];
        $addClient->dateofbirth = $request->client["dateofbirth"];
        $addClient->profileimage = $request->client["profileimage"];
        $addClient->casedetails = $request->client["casedetails"];

        $addClient->save();

        Mail::to($addClient->email)->queue(new Clientmail($addClient));

        return $addClient;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $existingClient = Client::find($id);

        if($existingClient) {
            $existingClient->firstname = $request->client['firstname'];
            $existingClient->save();
            return $existingClient;
        }

        return "Client not found.";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingClient = Client::find($id);

        if($existingClient) {
            $existingClient->delete();
            return "Item successfully deleted.";
        }

        return "Client not found.";
    }
}
