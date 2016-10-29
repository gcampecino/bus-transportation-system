<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusStop;
use DB;
use Gate;

class BusSearchController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('bus-search'))
            return redirect('/bus');

        //user location
        $latitude = 1.299430;
        $longitude = 103.855669;

        $busStops = BusStop::select('name', 'description', DB::raw('(6371 * acos(cos(radians(latitude)) * cos( radians('.$latitude.')) * cos( radians('.$longitude.') - radians(longitude)) + sin(radians(latitude)) * sin( radians('.$latitude.')))) AS distanceFromUser'))
                    ->orderBy('distanceFromUser', 'asc')
                    ->get();

        return view('bus.search', ['busStops' => $busStops]);
    }
}
