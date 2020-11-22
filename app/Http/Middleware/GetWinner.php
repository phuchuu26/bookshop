<?php

namespace App\Http\Middleware;
use App\Models\Auction_book;
use Closure;

class GetWinner
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
        return $next($request);
    }
    public function terminate($request, $response)
    {
        // $id = $request->route()->parameter();
        // $sanphamdaugia = Auction_book::find($id);

        // $currentDateTime = date('Y-m-d H:i:s');
        // $$currentDateTime1 = strtotime("now");

    }
}
