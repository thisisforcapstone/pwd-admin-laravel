<?php

return [

    // Other configurations...

    'middlewareGroups' => [
        'web' => [
            // Web middleware group
            // You can add other web-related middlewares here
        ],

        'api' => [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class, // Ensure API requests are stateful
            'throttle:api',  // Throttle rate-limiting for API
            \Illuminate\Routing\Middleware\SubstituteBindings::class, // Parameter binding for routes
        ],
    ],

    // Other configurations...
];
