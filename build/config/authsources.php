<?php

$userset = getenv('SIMPLESAMLPHP_USERSET');
$config = [
  // This is a authentication source which handles admin authentication.
  'admin' => [
      // The default is to use core:AdminPassword, but it can be replaced with
      // any authentication source.
      'core:AdminPassword',
  ],
  'example-userpass' => array_merge(
    ['exampleauth:UserPass'],
    json_decode(file_get_contents(__DIR__ . "/users/$userset.json"), TRUE)
  ),
];