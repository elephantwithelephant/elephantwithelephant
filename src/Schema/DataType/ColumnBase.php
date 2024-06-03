<?php

namespace ElephantWithElephant\Schema\DataType;

abstract class ColumnBase implements ColumnInterface
{
    const string FIELD_TYPE = '';

    public function __construct(
        protected string $columnName,
    ) {

    }

    public function dataTransformers(): array
    {
        return [];
    }

    public function __toString(): string
    {
        return $this->columnName . ' ' . static::FIELD_TYPE;
    }
}
