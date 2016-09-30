<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Analytics;
use Carbon\Carbon;
use Spatie\Analytics\Period;

class DashboardController extends Controller
{
    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::create(Carbon::now()->startOfWeek(),Carbon::now()));
        $day = Analytics::performQuery(Period::create(Carbon::now()->startOfDay(),Carbon::now()), 'ga:users');
        $thisMonth = Analytics::performQuery(Period::create(Carbon::now()->startOfMonth(),Carbon::now()), 'ga:users');
        $total = Analytics::performQuery(Period::create(Carbon::createFromDate(2015, 1, 1),Carbon::now()), 'ga:users');
        return view('admin::dashboard', compact('analyticsData','day','thisMonth','total'));
    }


}