<?php

namespace App\commands;

use App\Utils\Formatter;

class HelpCommand{

    public function run(string $command, ?string $subCommand) {

        if($command !== 'help'){
            throw new \App\Exceptions\CliException("Unknown command '$command'. Run 'git help' for usage.");
        }

        if($subCommand){
            $this->showCommandHelp($subCommand);
        }else{
            $this->showGeneralHelp();
        }
    }

    private function showGeneralHelp(){
        echo "git help\n";
        echo "Usage:\n";
        echo "  git <Command> [--help]\n\n";
        echo "Common Commands:\n";
        echo "  clone  Clone a repository\n";
        echo "  init    Create a new Git repository\n";
        echo "Run 'git help <command>' for more details.\n";

        
    }

    private function showCommandHelp(string $command): void{
        $commands = [
            'clone' => 'Clone a repository into a new directory.',
            'init' => 'Create an empty Git repository.',
            'status' => 'Show the current status of the working directory.',
        ];

        if(!isset($commands[$command])){
            throw new \App\Exceptions\CliException("No help found for '$command'.");
        }

        echo "\ngit $command: $commands[$command]\n";
        echo "git " . Formatter::highlight($command) . "\n\n";
    }
}