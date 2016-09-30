<?php
namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return view('site::index');
    }


}