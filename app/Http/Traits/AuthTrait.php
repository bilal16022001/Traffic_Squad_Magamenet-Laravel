<?php

namespace App\Http\Traits;
use App\Providers\RouteServiceProvider; 

trait AuthTrait
{
     public function checkguard($request)
     {
        if($request->type == 'police'){
            $guardName= 'police';
        }
        elseif ($request->type == 'offense'){
            $guardName= 'offense';
        }
        else{
            $guardName= 'web';
        }
        return $guardName;

     }

     public function redirect($request){
        if($request->type == 'police'){
            return redirect()->intended(RouteServiceProvider::POLICE);
        }
        elseif ($request->type == 'offense'){
            return redirect()->intended(RouteServiceProvider::OFFENSE);

        }
        else{
            return redirect()->intended(RouteServiceProvider::HOME);
        }
     }
}
