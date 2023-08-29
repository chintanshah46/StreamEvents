<?php 

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DataProvider {

    private $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function getRevenues($data){

        $user_id = $this->auth::user()->id;

        $viewResult = DB::table('revenue_view');
        $viewResult->where('user_id','=',$user_id);
        $viewResult->groupBy(['type','cur']);
        $viewResult->select('type','cur', DB::raw('SUM(amount) as total_amount'));
        $viewData = $viewResult->get();

        $finalData = [];
        foreach ( $viewData as $d ){
            $curKey = $d->cur;
            if ( ! isset($d->cur) || empty($d->cur) )
                $curKey = 'USD';

            if ( isset($finalData[$d->type]) ){
                $finalData[$d->type][$curKey] = $d->total_amount;
            } else {
                $finalData[$d->type] = [$curKey => $d->total_amount];
            }
        }

        return $finalData;
    }

    public function getFollowersGain($data){

        $user_id = $this->auth::user()->id;

        $data = DB::table('followers')
                    ->join('event_users','event_users.id','=','followers.event_user_id')
                    ->whereNull(['event_users.deleted_at','followers.deleted_at'])
                    ->where('event_users.user_id','=',$user_id)
                    ->where('followers.created_at','>=',now()->subDays(30))
                    ->groupBy('event_users.user_id')
                    ->selectRaw('event_users.user_id, count(followers.id) as number_of_followers')
                    ->get();
                    
        if ( count($data) > 0 )
            return $data[0]->number_of_followers;
        else 
            return null;
    }

    public function getTopProducts($data){

        $user_id = $this->auth::user()->id;

        $data = DB::table('merchandise_sales')
                    ->join('merchandises','merchandises.id','=','merchandise_sales.merchandise_id')
                    ->join('event_users','event_users.id','=','merchandise_sales.event_user_id')
                    ->whereNull(['event_users.deleted_at','merchandises.deleted_at','merchandise_sales.deleted_at'])
                    ->where('event_users.user_id','=',$user_id)
                    ->where('merchandises.is_active','=',1)
                    ->where('merchandise_sales.created_at','>=',now()->subDays(30))
                    ->groupByRaw('merchandise_sales.merchandise_id, merchandises.name')
                    ->selectRaw('merchandise_sales.merchandise_id, merchandises.name, COUNT(merchandise_sales.id) AS total_quantity_sold')
                    ->orderByRaw('total_quantity_sold DESC')
                    ->limit(3)
                    ->get();

            return $data;
    }
}