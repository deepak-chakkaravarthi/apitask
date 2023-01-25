<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\zoho_inbound;
class productcontroller extends Controller
{
    // public function frondend(){
        
    //     return zoho_inbound::all();
    // }
    public function backend(Request $request){
         $query = zoho_inbound::query(); 
          
         $perPage = 9;
        //  $perpages = 9;
         $page = $request->input('page', 1);
        //  $numofdata = $request->input('numofdata');
         $total = $query->count();
 
         $result = $query->offset(($page - 1) * $perPage)->limit($perPage)->get();
        //  $results = $query->offset(($numofdata -9) + $perpages)->limit($perpages)->get();
        //  $result = $request->input('results');
         return [
             'data' => $result,
             'total' => $total,
             'page' => $page,
             'last_page' => ceil($total / $perPage)
         ];
    }
}
