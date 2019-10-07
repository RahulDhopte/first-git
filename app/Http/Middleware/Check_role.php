<?php

namespace App\Http\Middleware;

use Closure;
use auth;
use App\User;

class Check_role
{
    /**
     * Handle an incoming request.//dd($getRoles);
     * //                     dd(Auth::User()->getRoles());
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //$userrole = Auth::User()->Role()->pluck('role_name');
        
        $paths =array("home"=>"view", "add/user/view"=>"create", "update/user/{id}"=>"update"
        ,"delete/user/{id}" => "delete","edit/{id}" => "update","config_list" => "view",
         "config"=>"create","edit_view/{id}" => "update","delete_config/{id}"=>"delete",
         "list_banner" => "view","banner"=>"create","edit_banner_view/{id}" => "update",
          "delete_banner/{id}"=>"delete","list_category"=>"view","category"=>"create",
          "edit_category/{id}"=>"update","delete_category/{id}"=>"delete");
      

        $permission = Auth::User()->getPermissions();
        $newUrl=array();
            $getRoles   =   Auth::User()->getRoles();
        /*foreach ($permission as $key => $value) {
            if($value)
            {
                array_push($newUrl, $key );
            }
        }*/
        $currentPath=$request->path();

        if (
            in_array($currentPath, $paths) && 
            in_array($permission, $paths[$currentPath]) && 
            !empty($paths[$currentPath][$permission]) ) {
             return redirect('/index');
        }
        
        if ( in_array('admin', $getRoles) ) {
            return $next($request);
        }

        if ( in_array('superadmin', $getRoles) ) {
            return $next($request);
        }
        
        return redirect('/index');
        
    }
}
