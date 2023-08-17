<?php

namespace App\Http\Controllers;

use App\Models\review;
use App\Http\Resources\ReviewResource;
use App\Http\Requests\StorereviewRequest;
use App\Http\Requests\UpdatereviewRequest;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all reviews from the database
        $reviews = Review::all();

        // Return a collection of reviews as a JSON response
        return ReviewResource::collection($reviews);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return a view for creating a new review
        return view('reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorereviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorereviewRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'menuid' => 'required|exists:menus,id',
            'customerid' => 'required|exists:customers,id',
            'product_name' => 'required|string',
            'product_description' => 'required|string',
            'product_image' => 'required|string',
            'rating_value' => 'required|numeric|min:1|max:5',
            'rating_best' => 'required|numeric|min:1|max:5',
            'rating_worst' => 'required|numeric|min:1|max:5',
            'author_name' => 'required|string',
            'date_published' => 'required|date',
            'review_body' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
    
        $newReview = Review::create($request->all());
    
        //return response()->json($newReview, 201);

        // Return the newly created review using the ReviewResource
        return new ReviewResource($newReview);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(review $review)
    {
        // Find the review by ID
        $review = Review::findOrFail($id);

        // Return the review as a JSON response
        return new ReviewResource($review);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(review $review)
    {
        // Find the review by ID
        $review = Review::findOrFail($id);

        // Return a view for editing the review
        return view('reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatereviewRequest  $request
     * @param  \App\Models\review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatereviewRequest $request, review $review)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'menuid' => 'required|exists:menus,id',
            'customerid' => 'required|exists:customers,id',
            'product_name' => 'required|string',
            'product_description' => 'required|string',
            'product_image' => 'required|string',
            'rating_value' => 'required|numeric|min:1|max:5',
            'rating_best' => 'required|numeric|min:1|max:5',
            'rating_worst' => 'required|numeric|min:1|max:5',
            'author_name' => 'required|string',
            'date_published' => 'required|date',
            'review_body' => 'required|string',
        ]);

        // Find the review by ID
        $review = Review::findOrFail($id);

        // Update the review using the validated data
        $review->update($validatedData);

        // Redirect or return a response as needed
        return redirect()->route('reviews.show', $review->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(review $review)
    {
        // Find the review by ID
        $review = Review::findOrFail($id);

        // Delete the review
        $review->delete();

        // Redirect or return a response as needed
        return redirect()->route('reviews.index');
    }
}
