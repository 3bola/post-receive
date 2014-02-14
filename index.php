<?php

  $config = json_decode(@file_get_contents('config.json'));

  $log = file_get_contents('post-receive.log');
  $log .= print_r(@getallheaders(), true) . "\n" . @file_get_contents('php://input') . "\n==========\n";
  file_put_contents('post-receive.log', $log);