<?php

return [
    // appID for registration
    'appid' => env('FREEBOXPHP_APPID', 'net.madpilot.freeboxphp'),

    // Application name for display
    'appname' => env('APP_NAME', 'FreeBoxPHP'),

    // Device name for display
    'devicename' => env('FREEBOXPHP_DEVICENAME', 'Unknown'),

    // Authorization token
    'token' => env('FREEBOXPHP_TOKEN', null),

    // Hostname of your freebox, if custom
    'hostname' => env('FREEBOXPHP_HOSTNAME', 'mafreebox.freebox.fr'),

    // If accessing locally or via the internet
    'localaccess' => env('FREEBOXPHP_LOCALACCESS', true),

    // If using https (false not really supported at present)
    'https' => env('FREEBOXPHP_HTTPS', true),

    // Certificate file for custom TLS certificates
    'certfile' => env('FREEBOXPHP_CERTFILE', ''),

    // Type of your box, one of ['FreeBox', 'IliadBox']
    'boxtype' => env('FREEBOXPHP_BOXTYPE', 'FreeBox'),

    // Timeout for requests
    'timeout' => env('FREEBOXPHP_TIMEOUT', 30),

    // Custom channel to log to
    'logchannel' => env('FREEBOXPHP_LOGCHANNEL', 'null'),
];
