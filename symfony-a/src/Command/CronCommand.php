<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Service\ProcessingPhrases\ProcessAi;
use App\Service\ProcessingPhrases\ProcessTwoWordPhrases;

/**
 * Command for Cron
 * 
 * @todo split up the two execute methods and do this better way
 * 
 */
class CronCommand extends Command
{
    // set property
    private $processAi;
    private $processTwoWordPhrases;

    /**
     * Constructor
     * 
     * @param ProcessAi $processAi
     */
    public function __construct(ProcessAi $processAi, ProcessTwoWordPhrases $processTwoWordPhrases)
    {
        parent::__construct();

        $this->processAi = $processAi;
        $this->processTwoWordPhrases = $processTwoWordPhrases;
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
        $this->processTwoWordPhrases->saveToDatabase();
        $this->processAi->saveToDatabase();

        $output->writeln('Save to database successful.');

        return Command::SUCCESS;
    }
}
