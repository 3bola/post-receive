<?php

  $config = json_decode(@file_get_contents('config.json'));

  chdir($config->directory);
  $commands = array(
    file_exists($config->directory . ".git") ? "git pull" : "git clone --depth=1 --branch $config->branch $config->repository $config->directory",
    "git submodule update --init --recursive"
  );

  foreach ($commands as $command) {
    echo "Running command: `$command`...\n";
    echo shell_exec($command) . "\n";
  }
  echo "Done.";

  exit;