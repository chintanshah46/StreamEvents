<?php

namespace App\Http\Controllers;

use App\DataProvider;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    protected $allowedProviders;

    protected $allowedResponses;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->allowedProviders = ['donations', 'followers', 'sales', 'subscribers'];
        $this->allowedResponses = ['html', 'json'];
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

        $validator = Validator::make($request->all(), [
            'resp' => ['required',Rule::in($this->allowedResponses)]
        ]);
         
        if ($validator->fails()) {
            return response()->json('Bad request. The standard option for requests that fail to pass validation.', 400);
        }

        $resp = $request->input('resp');

        $data = $provider->getRevenues();

        if ($resp == 'html'){
            return response()->json([
                'status' => 'success',
                'html' => view('ajax.revenues', compact('data'))->render()
            ]);
        }

        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);

    }

    public function getFollowersGain(DataProvider $provider, Request $request){
        if ( ! Auth::check() ) {
            return response()->json('Unprocessable entity indicates that the action could not be processed properly due to invalid data provided', 422);
        }

        $validator = Validator::make($request->all(), [
            'resp' => ['required',Rule::in($this->allowedResponses)]
        ]);
         
        if ($validator->fails()) {
            return response()->json('Bad request. The standard option for requests that fail to pass validation.', 400);
        }

        $resp = $request->input('resp');

        $data = $provider->getFollowersGain();

        if ($resp == 'html'){
            return response()->json([
                'status' => 'success',
                'html' => view('ajax.followers', compact('data'))->render()
            ]);
        }

        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);

    }  
    
    public function getTopProducts(DataProvider $provider, Request $request){
        if ( ! Auth::check() ) {
            return response()->json('Unprocessable entity indicates that the action could not be processed properly due to invalid data provided', 422);
        }

        $validator = Validator::make($request->all(), [
            'resp' => ['required',Rule::in($this->allowedResponses)]
        ]);
         
        if ($validator->fails()) {
            return response()->json('Bad request. The standard option for requests that fail to pass validation.', 400);
        }

        $resp = $request->input('resp');

        $data = $provider->getTopProducts();

        if ($resp == 'html'){
            return response()->json([
                'status' => 'success',
                'html' => view('ajax.products', compact('data'))->render()
            ]);
        }

        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);

    } 
    
    public function getEvents(DataProvider $provider, Request $request){
        if ( ! Auth::check() ) {
            return response()->json('Unprocessable entity indicates that the action could not be processed properly due to invalid data provided', 422);
        }

        $validator = Validator::make($request->all(), [
            'page' => 'required|integer',
            'resp' => ['required',Rule::in($this->allowedResponses)]
        ]);
         
        if ($validator->fails()) {
            return response()->json('Bad request. The standard option for requests that fail to pass validation.', 400);
        }

        $resp = $request->input('resp');
        $page = $request->input('page');

        $data = $provider->getEvents($page);

        if ($resp == 'html'){
            return response()->json([
                'status' => 'success',
                'html' => view('ajax.events', compact('data', 'page'))->render()
            ]);
        }

        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);

    }

    public function updateProvider(DataProvider $provider, Request $request){
        if ( ! Auth::check() ) {
            return response()->json('Unprocessable entity indicates that the action could not be processed properly due to invalid data provided', 422);
        }

        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
            'type' => ['required',Rule::in($this->allowedProviders)]
        ]);
         
        if ($validator->fails()) {
            return response()->json('Bad request. The standard option for requests that fail to pass validation.', 400);
        }

        $id = $request->input('id');
        $type = $request->input('type');

        return response()->json([
            'status' => 'success',
            'data' => $provider->updateHasRead($id, $type)
        ]);


    }
}
