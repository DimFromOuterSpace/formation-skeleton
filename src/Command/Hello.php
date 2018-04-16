<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Hello extends Command {

    protected function configure() {
        $this
                // the name of the command (the part after "bin/console")
                ->setName('app:say-hello')

                // the short description shown while running "php bin/console list"
                ->setDescription('Displays Hello')

                // the full command description shown when running the command with
                // the "--help" option
                ->setHelp('This command allows you to display hello...')
                ->addArgument('username', InputArgument::REQUIRED, 'test');
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $username = $input->getArgument('username');
        echo "Hello " . $username;
    }

}
