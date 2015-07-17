<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        return view('oleo.client.index');
    }

    public function getLog()
    {
        return view('oleo.client.log');
    }

    public function getPhone()
    {
        return view('oleo.client.index');
    }


}
