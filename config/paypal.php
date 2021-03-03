<?php
return array(


    'client_id' => env('PAYPAL_CLIENT_ID_LIVE', ''),
    'secret'    => env('PAYPAL_SECRET_LIVE', ''),

    //'client_id' => env('PAYPAL_CLIENT_ID_SANDBOX', ''),
    //'secret'    => env('PAYPAL_SECRET_SANDBOX', ''),

    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'live',
        //'mode' => 'sandbox',

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,

        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,

        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',

        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);