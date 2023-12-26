<?php

namespace App\Command;

use App\Service\ProcessingPhrases\ProcessAi;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CronCommand extends Command
{
    // set property
    private $processAi;

    /**
     * Constructor
     * 
     * @param ProcessAi $processAi
     */
    public function __construct(ProcessAi $processAi)
    {
        parent::__construct();

        $this->processAi = $processAi;
    }

    /**
     * Configure the current command
     * 
     * @return void
     */
    protected function configure()
    {
        $this
            ->setName('app:cron')
            ->setDescription('Run the cron job');
    }

    /**
     * Cron execute  
     * In console run: php bin/console app:cron
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * 
     * @return int The return code (0 for success, 1 for failure)
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->processAi->saveToDatabase();
    
        $output->writeln('Save to database successful.');
    
        return Command::SUCCESS;
    }
    

}
