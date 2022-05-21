<?php

namespace App\Http\Controllers;

use App\Events\OrderCheckedEvent;
use App\Events\TestEvent;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function home(){
        return view('home');
    }
}
