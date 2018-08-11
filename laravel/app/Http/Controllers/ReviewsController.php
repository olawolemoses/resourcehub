<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->only(['store']);
    }
    
    public function store(Request $request)
    {
        $this->validate(request(), [
            'content' => 'required',
            'svx_id' => 'required',
        ]);
        
        $review = new Review;
        $review->service_id = $request->svx_id;
		$review->user_id = auth()->id();
		$review->title = "Thank you for your support";
		$review->content = $request->content;
        $review->ratings_score = 3;
        $review->save();

        return redirect()->route('profile',["user"=>$review->service->user->id, "service" => $review->service_id]);
    }
}
