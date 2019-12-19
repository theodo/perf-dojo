<?php

// This file is the production settings.
// It should not be commited but for eaier dojo implementation, I chose to commit it
// It may need some improvements

return array(
  'APP_ENV' => 'prod',
  'APP_SECRET' => '30e4a78adc9db703975064eb4261517a',
  'DATABASE_URL' => 'postgresql://db_user:db_password@127.0.0.1:5432/db_name?serverVersion=11&charset=utf8',
  'TRUSTED_HOSTS'=> '^catbook\.local$',
  'TRUSTED_PROXIES' => '127.0.0.0/8,10.0.0.0/8,172.16.0.0/12,192.168.0.0/16',
  'APP_DEBUG' => '1'
);
