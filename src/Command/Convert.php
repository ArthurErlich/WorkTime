<?php

declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(name: 'cli:convert')]
class Convert extends Command
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input,$output);
        $format = $input->getOption('format');

        $io->title("Work Time converter");
        if($format == null){
           return self::INVALID;
        }
        //check for format. Simple for now
        $format = strtolower($format);
        if($format !== "awork"){
            return self::INVALID;
        }
        $io->note('Selected Format: '.$format);

        return Command::SUCCESS;
    }

    protected function configure(): void
    {
        $this
            // the command description shown when running "php bin/console list"
            ->setDescription('calculats working time from diffrent formats.')
            // the command help shown when running the command with the "--help" option
            ->setHelp("Suported formats are: \n- Awork")
            ->addOption('format','f',InputOption::VALUE_OPTIONAL,'Select input format of the csv file', null)
        ;
    }
}
