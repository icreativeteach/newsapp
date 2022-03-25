<?php

namespace App\Service;

use Illuminate\Http\Request;


class RouteService
{
	public function shopDetails(Request $request)
    {
    	$requestDataLink = '';
        foreach($request->all() as $key => $requestData){
            $requestDataLink .= $key.'='.$requestData.'&';
        }
        //dd($requestDataLink);
     	return $requestDataLink;
    }

}