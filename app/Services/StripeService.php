<?php

namespace App\Services;

use App\Models\Integration;
use Illuminate\Http\Request;
use \Stripe\Stripe;

class StripeService
{

    public function __construct()
    {
        $this->stripe = new StripeClient(
            Integration::where('name', 'Stripe')->first()->token
        );
    }


    public function createStripeConnectIntegration(Request $request, IntegrationService $service)
    {

       $service->createIntegration('Stripe', 'Stripe-Connect', 'https://connect.stripe.com/express/oauth/authorize', $request->code);

        return response()->json([
            'message' => 'Integration created successfully',
        ], 201);
    }

}
