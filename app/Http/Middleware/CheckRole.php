<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Employee;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
{

    $id = Auth::id();
    if($id){
    $i = Employee::query()->where('id','=',$id)->first();
        
        if ($i->role_id == 1) {
            return $next($request);
        }
    return redirect()->back();
}
return redirect()->route('login');

}
}

//dd(session()->all());