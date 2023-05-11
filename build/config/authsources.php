<?php

$config = [
  // This is a authentication source which handles admin authentication.
  'admin' => [
      // The default is to use core:AdminPassword, but it can be replaced with
      // any authentication source.
      'core:AdminPassword',
  ],
  'example-userpass' => [
    'exampleauth:UserPass',
    'user1:user1pass' => [
      'telephoneNumber' => '1 555 123 4567',
      'mail' => 'user1@example.com',
      'uid' => 'user1',
      'eduPersonScopedAffiliation' => [
        'group1',
        'group2',
      ],
      'l' => 'Somewhere',
      'eduPersonPrincipalName' => 'user1@example.com',
      'sn' => 'One',
      'givenName' => 'User',
      'title' => 'Sampler',
    ]
  ],
];
