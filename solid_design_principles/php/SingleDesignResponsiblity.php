<?php

declare(strict_types=1);

/**
 * Important: These code examples are not for production use
 * and meant as demos of Design Principles only to show understanding of design principles, 
 * These examples may not include things such as sanitation, and error logging, because a demo and focusing on the principles, for brevity reasons
 * The principles are shown in single files, not MVC folder structure, for ease of reading for example
 * For MVC or sanitation please see my other code examples
 */

/**
 * Journal Class 
 *  
 * Example of a Single Responsibility Class
 */
class Journal
{
    /**
     * @var array
     */
    private array $entries = [];

    /**
     * @var int
     */
    private static int $count = 0;

    /**
     * Adds a new entry to the journal
     * 
     * @param string $text
     * 
     * @return int
     */
    public function addEntry(string $text = ''): int
    {
        if (!empty($text)) {
            $this->entries[++self::$count] =  $text;
        }

        return self::$count;
    }

    /**
     * Removes an entry from the journal based on the provided index
     * 
     * @param int $index
     * 
     * @return void
     */
    public function removeEntry(int $index): void
    {
        if (array_key_exists($index, $this->entries)) {
            unset($this->entries[$index]);
        }
    }

    /**
     * Show the entries
     * 
     * @return array
     */
    public function getEntries(): array
    {
        return $this->entries;
    }
}

/**
 * Data Formatter Class
 * 
 * Example of another Single Responsibility Class
 * 
 * @note: in the original C# course this used a __toString method
 * in the Journal class. From what I understand both ways can be valid
 * Just, if we are following SRP, I would feel more comfortable handling
 * conversion in here. Also it is common practice in PHP
 * to use JSON when storing Array data in a file for example
 * If we put the json_encode in the Persistance class, that could
 * violate SRP maybe, moreover lock that method into having to use JSON, instead 
 * of any string (e.g. implode array), now stuff is more reusable, 
 * which is more OOP train of thought
 */
class DataConverter
{
    /**
     * Convert an Array to JSON
     * 
     * @return string
     */
    public static function arraytoJson(array $data = []): string
    {
        if (!empty($data)) {
            return json_encode($data);
        }
    }
}

/**
 * Persistance Class
 * 
 * Example of another Single Responsbility Class 
 * 
 * */
class Persistence
{
    /**
     * Set directory allowed to store data
     * 
     * @var string
     */
    private string $allowedDirectory = __DIR__ . '/data/';

    /**
     * Save a string to a given file location
     * 
     * @param string $dataToStore
     * @param string $file
     * 
     * @return void
     */
    public function saveToFile(string $dataToStore = '', string $fileName = ''): void
    {
       $allowedDirectory = $this->allowedDirectory;
        if (empty($dataToStore) || empty($fileName) || empty($allowedDirectory)) {
            return;
        }

        $fileToStore = $allowedDirectory  . $fileName;
        file_put_contents($fileToStore, $dataToStore, LOCK_EX);
    }
}

/**
 * The demo code class
 */
class Demo
{
    /**
     * Method with demo code 
     * 
     * @return void
     */
    public static function main(): void
    {
        // Add and remove entries
        $journalObject = new Journal();
        $journalObject->addEntry("I squashed a bug today");
        $journalObject->addEntry("I had a cookie today");
        $journalObject->removeEntry(2);

        // Convert to Json 
        $dataConverterObject = new DataConverter;
        $jsonDataToStore = $dataConverterObject->arraytoJson($journalObject->getEntries());

        // Save to file
        $fileName = 'journal.txt';
        $persistanceObject = new Persistence;
        $persistanceObject->saveToFile($jsonDataToStore, $fileName);
    }
}

// Call the main method
Demo::main();
