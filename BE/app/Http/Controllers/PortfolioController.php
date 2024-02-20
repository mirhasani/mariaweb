<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
     return $request->user()->portfolios;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $portfolio = new Portfolio;
        $portfolio->title = $request->title;
        $portfolio->user_id = $request->user()->id;
        $portfolio->caption = $request->caption;
        $portfolio->save();
        if ($portfolio){
            return response()->json(['status'=>true ], 201);
        }else{
            return response()->json(['status'=>false ] , 204);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        //
    }
}
