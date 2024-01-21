<?php

declare(strict_types=1);

/**
 * Important: These code examples are not for production use
 * and meant as demos to show understanding of design principles, 
 * These examples may not include things such as sanitation, because a demo
 * The principles are shown in single files, not MVC folder structure, for ease of reading for example
 * For MVC please see my other code examples
 */

/** 
 * Example of Single Responsibility Class
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
     * Returns a string representation of the journal entries
     * 
     * @return string
     */
    public function __toString(): string
    {
        return implode(PHP_EOL, $this->entries);
    }
}

/**
 * The demo code class
 */
class Demo
{
    public static function main(): void
    {
        $journalObject = new Journal();
        $journalObject->addEntry("I squashed a bug today");
        $journalObject->addEntry("I had a cookie today");
        echo $journalObject;
        $journalObject->removeEntry(2);
        echo $journalObject;
    }
}

// Call the main method
Demo::main();
