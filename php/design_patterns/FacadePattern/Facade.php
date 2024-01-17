<?php

namespace FacadePattern;

use FacadePattern\Hashing\Md5Hasher;
use FacadePattern\Hashing\Sha1Hasher;

/**
 * Class Facade
 *
 * @package FacadePattern
 */
class Facade
{
    /**
     * @var Md5Hasher The MD5 hasher instance.
     */
    protected $md5Hasher;

    /**
     * @var Sha1Hasher The SHA-1 hasher instance.
     */
    protected $sha1Hasher;

    /**
     * Facade constructor.
     *
     * @param Md5Hasher|null $md5Hasher The MD5 hasher instance.
     * @param Sha1Hasher|null $sha1Hasher The SHA-1 hasher instance.
     */
    public function __construct(
        Md5Hasher $md5Hasher = null,
        Sha1Hasher $sha1Hasher = null
    ) {
        // Check if $md5Hasher is provided, otherwise use a new instance of Md5Hasher
        if ($md5Hasher !== null) {
            $this->md5Hasher = $md5Hasher;
        } else {
            $this->md5Hasher = new Md5Hasher;
        }

        // Check if $sha1Hasher is provided, otherwise use a new instance of Sha1Hasher
        if ($sha1Hasher !== null) {
            $this->sha1Hasher = $sha1Hasher;
        } else {
            $this->sha1Hasher = new Sha1Hasher;
        }
    }

    /**
     * Perform an operation using the initialized subsystems.
     *
     * @return string The result of the operation.
     */
    public function operation(): string
    {
        $result = '<p>Facade initialize subsystems:</p>';
        $result .= $this->md5Hasher->getValueToHash();
        $result .= $this->sha1Hasher->getValueToHash();
        $result .= '<p>Facade Orders subsystems to perform the action:</p>';
        $result .= $this->md5Hasher->hashValue();
        $result .= $this->sha1Hasher->hashValue();

        return $result;
    }
}
