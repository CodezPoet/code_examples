<?php

namespace FacadePattern;

use FacadePattern\Facade;
use FacadePattern\Hashing\Md5Hasher;
use FacadePattern\Hashing\Sha1Hasher;

/**
 * Client Code
 *
 * @param Facade $facade
 * 
 * @return string
 */
function clientCode(Facade $facade): string
{
    return $facade->operation();
}

/**
 * Run example
 */
$md5Hasher = new Md5Hasher();
$sha1Hasher = new Sha1Hasher();
$facade = new Facade($md5Hasher, $sha1Hasher);
echo clientCode($facade);