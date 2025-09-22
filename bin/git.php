<?php

require __DIR__ . "/../vendor/autoload.php";

use App\Commands\HelpCommand;
use App\Exceptions\CliException;


try{

    $option = getopt('v', ['version']);

    $args = $argv;
    array_shift($args);

    if(isset($option['v']) || isset($option['version'])){
        echo "git version 1.0.0\n";
        exit(0);
    }
    

    $command = $args[0] ?? 'help';
    $subCommand = $args[1] ?? null;
    
    $helpCommand = new HelpCommand();
    $helpCommand->run($command, $subCommand);

}catch(Exception $e){

    fwrite(STDERR, "Error: " . $e->getMessage() . "\n");
    exit(1);
}


