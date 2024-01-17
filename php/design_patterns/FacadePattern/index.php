<?php

namespace FacadePattern;

use FacadePattern\Hashing\Md5Hasher;
use FacadePattern\Hashing\Sha1Hasher;

// Create instances of Hashers
$md5Hasher = new Md5Hasher();
$sha1Hasher = new Sha1Hasher();

// Create the HashFacade with the desired Hasher
$hashFacadeMd5 = new HashFacade($md5Hasher);
$hashFacadeSha1 = new HashFacade($sha1Hasher);

// Use the Facade to hash values
$hashedMd5 = $hashFacadeMd5->md5('test');
$hashedSha1 = $hashFacadeSha1->sha1('test');

// Output the results
echo "MD5 Hash: $hashedMd5\n";
echo "SHA1 Hash: $hashedSha1\n";
