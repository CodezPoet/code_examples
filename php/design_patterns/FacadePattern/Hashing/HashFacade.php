<?php

namespace FacadePattern;

use FacadePattern\Hashing\Hasher;

/**
 * Class HashFacade
 *
 * @package FacadePattern
 */
class HashFacade
{
    /**
     * HashFacade constructor.
     *
     * @param Hasher $hasher
     */
    public function __construct(
        private Hasher $hasher
        )
    { }

    /**
     * Generate an MD5 hash for the given value.
     *
     * @param string $value The input value to hash.
     *
     * @return string The MD5 hash.
     */
    public function md5(string $value): string
    {
        return $this->hasher->make($value);
    }

    /**
     * Generate a SHA-1 hash for the given value.
     *
     * @param string $value The input value to hash.
     *
     * @return string The SHA-1 hash.
     */
    public function sha1(string $value): string
    {
        return $this->hasher->make($value);
    }
}
