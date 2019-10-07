<?php

namespace App\Http\Middleware;

use Closure;

class chkAddress
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (empty($request->get('bill_addr'))) {
           
           session_start();
           $request->session()->flash('message.level', 'danger');
           $request->session()->flash('message.content', 'Please select address');
           return redirect('checkout');
       }
       return $next($request);
   }
}
