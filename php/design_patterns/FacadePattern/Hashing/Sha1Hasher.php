<?php

namespace FacadePattern\Hashing;

/**
 * Class Sha1Hasher
 *
 * Implements the Hasher interface for SHA-1 hashing.
 */
class Sha1Hasher
{
    /**
     * @var string The value to be hashed by SHA-1.
     */
    private $valueToHash = 'SHA1 Test';

    /**
     * Get the value to be hashed.
     *
     * @return string The value to be hashed.
     */
    public function getValueToHash(): string
    {
        return $this->valueToHash;
    }

    /**
     * Hash the stored value using SHA-1.
     *
     * @return string The SHA-1 hash of the stored value.
     */
    public function hashValue(): string
    {
        $valueToHash = $this->getValueToHash();
        return sha1($valueToHash);
    }
}
