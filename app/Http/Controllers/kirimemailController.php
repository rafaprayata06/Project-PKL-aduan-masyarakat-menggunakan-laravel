<?php

namespace App\Http\Controllers;

use App\Mail\kirimEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class kirimemailController extends Controller
{
    function index()
    {
        Mail::to("hawaadams12345678910@gmail.com")->send(new kirimEmail);
        return "sukses anjaii";
    }
}
