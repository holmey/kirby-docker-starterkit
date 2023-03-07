<?php

return [
  'debug' => true,
  'email' => [
    'transport' => [
      'type' => 'smtp',
      'host' => 'mailhog',
      'port' => 1025,
      'security' => false
    ]
  ],
];
