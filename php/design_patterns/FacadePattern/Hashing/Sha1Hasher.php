<?php

namespace FacadePattern\Hashing;

/**
 * Class Sha1Hasher
 *
 * Implements the Hasher interface for SHA-1 hashing.
 */
class Sha1Hasher implements Hasher
{
    /**
     * Generate a SHA-1 hash for the given value.
     *
     * @param string $value The input value to hash.
     *
     * @return string The SHA-1 hash.
     */
    public function make(string $value): string
    {
        return sha1($value);
    }
}
