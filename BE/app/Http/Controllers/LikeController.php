<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    function setLike ($portfolioId , Request $request){
        $portfolio = Portfolio::find($portfolioId);
        $likes = $portfolio->likes;
        $userId = $request->user()->id;
        function newLike($id , $userId){
            $newLike = new Like;
            $newLike ->portfolio_id = $id;
            $newLike->user_id = $userId;
            $newLike->save();
        }
        if ($likes->count() > 0){
            foreach ($Likes as $like){
                if ($like->user_id == $request->user()->id){
                    $like->delete();
                    return response()->json([
                        'liked'=>false ,
                    ]);
                }else{
                    newLike($portfolioId , $userId );
                    return response()->json([
                        'liked'=>true ,
                    ]);
                }
            }
        } else {
            newLike($portfolioId , $userId );
            return response()->json([
                'liked'=>true ,
            ]);
        }
    }


    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Like $like)
    {
        //
    }
}
