<?php

// Config::get('APP_ENV');
return [
  'APP_ENV' => 'dev',
  'TEMPLATES_PATH' => dirname(__DIR__) . '/templates',
  'JS_PATH' => 'http://' . $_SERVER['HTTP_HOST'] . str_replace($_SERVER['DOCUMENT_ROOT'], '', '/js/'),
];
