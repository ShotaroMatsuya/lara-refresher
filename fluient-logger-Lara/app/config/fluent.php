<?php
return [

    'host' => env('FLUENTD_HOST', '127.0.0.1'),

    'port' => env('FLUENTD_PORT', 24224),

    /** @see https://github.com/fluent/fluent-logger-php/blob/master/src/FluentLogger.php */
    'options' => [],

    /** @see https://github.com/fluent/fluent-logger-php/blob/master/src/PackerInterface.php */
    // specified class name
    'packer' => null,

    // optionally override Ytake\LaravelFluent\FluentHandler class to customize behaviour
    'handler' => null,

    'processors' => [],

    'tagFormat' => '{{channel}}.{{level_name}}',
];
