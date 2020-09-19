<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GoDaddyDomainsClient\Model\DNSRecord;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('site.welcome', []);
    }


    public function register(Request $request)
    {
        return view('site.register.index', []);
    }
}
