<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'title' => 'required|max:50'
        ]);

        $review = new Review();
        $review->content = $request->input('content');
        $review->title = $request->input('title');
        $review->product_id = $request->input('product_id');
        $review->user_id = Auth::user()->id;
        $review->save();

        return back();
    }
}