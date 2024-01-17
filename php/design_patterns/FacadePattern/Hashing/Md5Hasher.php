<?php

namespace FacadePattern\Hashing;

/**
 * Class Md5Hasher
 *
 * Implements the Hasher interface for MD5 hashing.
 */
class Md5Hasher implements Hasher
{
    /**
     * Generate an MD5 hash for the given value.
     *
     * @param string $value The input value to hash.
     *
     * @return string The MD5 hash.
     */
    public function make(string $value): string
    {
        return md5($value);
    }
}
