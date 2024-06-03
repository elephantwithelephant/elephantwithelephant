<?php

namespace ElephantWithElephant\Schema;

class Schema
{
    public function __construct(
        public readonly string $tableName,
        public readonly array $fields,
    ) {}
}
