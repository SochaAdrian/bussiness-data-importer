<?php

namespace App\Services;

use App\Models\Integration;
use Illuminate\Http\JsonResponse;

class IntegrationService
{

    /**
     * @param string $name - Name of integration - for example Stripe
     * @param string $type - Type of integration - for example stripe-connect
     * @param string $url - Url of integration - for example https://connect.stripe.com/express/oauth/authorize
     * @param string $token - Token that lets you access the integration
     * @return JsonResponse
     */
    public function createIntegration(string $name, string $type, string $url, string $token): \Illuminate\Http\JsonResponse
    {
        $integration = new Integration();
        $integration->name = $name;
        $integration->type = $type;
        $integration->url = $url;
        $integration->token = $token;
        $integration->save();

        return response()->json([
            'message' => 'Integration created successfully',
        ], 201);
    }


}
