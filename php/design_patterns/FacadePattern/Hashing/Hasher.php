<?php

namespace FacadePattern\Hashing;

interface Hasher
{
    public function make(string $value): string;
}
