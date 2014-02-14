<?php

  $config = json_decode(@file_get_contents('config.json'));

  shell_exec('cd ' . $config->directory);
  if(file_exists($config->directory . ".git")) {
    shell_exec('git clone ' . $config->repository . ' .');
  }
  else {
    shell_exec('git pull');
  }

  shell_exec('git submodule sync');
  shell_exec('git submodule update');