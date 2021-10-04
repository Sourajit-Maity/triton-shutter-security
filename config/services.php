<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'stripe' => [
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET')
    ],

    // We need to provide default values to validate types
    'firebase' => [
        'database_url' => env('FIREBASE_DATABASE_URL', ''),
        'project_id' => env('FIREBASE_PROJECT_ID', '7719d6256d5f96e6c3c24c64fb2a8d68d4e2be13'),
        'private_key_id' => env('FIREBASE_PRIVATE_KEY_ID', ''),
        // replacement needed to get a multiline private key from .env 
        'private_key' => str_replace("\\n", "\n", env('FIREBASE_PRIVATE_KEY', '')),
        'client_email' => env('FIREBASE_CLIENT_EMAIL', 'firebase-adminsdk-qjtcs@nghbr-324911.iam.gserviceaccount.com'),
        'client_id' => env('FIREBASE_CLIENT_ID', ''),
        'client_x509_cert_url' => env('FIREBASE_CLIENT_x509_CERT_URL', ''),
    ],

];
