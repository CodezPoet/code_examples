<?php

namespace FacadePattern\Hashing;

/**
 * Class Md5Hasher
 *
 * Implements the Hasher interface for MD5 hashing.
 */
class Md5Hasher 
{
    /**
     * @var string The value to be hashed by MD5.
     */
    private $valueToHash = 'MD5 Test';

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
     * Hash the stored value using MD5.
     *
     * @return string The MD5 hash of the stored value.
     */
    public function hashValue(): string
    {
        $valueToHash = $this->getValueToHash();
        return md5($valueToHash);
    }
}
