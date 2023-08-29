<?php

namespace App\Http\Controllers;

use App\DataProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        return view('home');
    }

    public function getRevenues(DataProvider $provider, Request $request){
        if ( ! Auth::check() ) {
            return response()->json('Unprocessable entity indicates that the action could not be processed properly due to invalid data provided', 422);
        }

        $data = $provider->getRevenues($request);

        return response()->json([
            'html' => view('ajax.revenues', compact('data'))->render()
        ]);
    }

    public function getFollowersGain(DataProvider $provider, Request $request){
        if ( ! Auth::check() ) {
            return response()->json('Unprocessable entity indicates that the action could not be processed properly due to invalid data provided', 422);
        }

        $data = $provider->getFollowersGain($request);

        return response()->json([
            'html' => view('ajax.followers', compact('data'))->render()
        ]);
    }  
    
    public function getTopProducts(DataProvider $provider, Request $request){
        if ( ! Auth::check() ) {
            return response()->json('Unprocessable entity indicates that the action could not be processed properly due to invalid data provided', 422);
        }

        $data = $provider->getTopProducts($request);

        return response()->json([
            'html' => view('ajax.products', compact('data'))->render()
        ]);
    } 

}
