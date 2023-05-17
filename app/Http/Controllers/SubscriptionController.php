<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Website;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:accounts,user_id',
            'web_id' => 'required|exists:websites,web_id',
        ]);

        $subscription = new Subscription();
        $subscription->user_id = $validatedData['user_id'];
        $subscription->web_id = $validatedData['web_id'];
        $subscription->save();

        return response()->json(['message' => 'Subscription created successfully'], 201);
    }
}
