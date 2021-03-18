<?php

namespace Cms\Cmsblog\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{

    public function index(){
        return view('cmsblog::website.index');
    }
}