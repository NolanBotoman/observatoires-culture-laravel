<?php

namespace App\Http\Controllers\API;

use App\Models\News;
use App\Models\OCSubscription;
use App\Models\User;
use App\Mail\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class APIController extends Controller
{
	public function getAll(Request $request)
    {
    	return response()->json([
			'news' => News::all();
		], 201);
    }

    public function getById(Request $request, $id)
    {
        $news = News::find($id);

        if (empty($news)) {
            return response()->json([
				'errors' => 'Provided news id not found.'
			], 404);
        }

        return response()->json([
			$news
		], 200);
    }

    public function sendContact(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
        	return response()->json([
			    'errors' => $validator->errors()->first()
			], 422);
        }

       	Mail::to($request->email)->send(new ContactForm($request->email, $request->message));

        return response()->json([
		    'answer' => 'Contact form sent.'
		], 200);
    }

    public function getPlans(Request $request)
    {
    	return response()->json([
			'plans' => OCSubscription::all();
		], 201);
    }

    public function subscribe(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'name' => 'required',
            'plan' => 'required',
            'coupon' => 'required',
        ]);

        if ($validator->fails()) {
        	return response()->json([
			    'errors' => $validator->errors()->first()
			], 422);
        }

        $subscription = OCSubscription::find($request->plan);

        if (empty($subscription)) {
            return response()->json([
				'errors' => 'Provided plan id not found.'
			], 422);
        }

        try {
            $request->user()->newSubscription('default', $subscription->stripe_id)
            	->withCoupon($request->coupon)
            	->create($request->token);

            return response()->json([
                "answer" => "Subscription success."
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
				'errors' => 'Coupon not valid.'
			], 422);
        }
    }
}