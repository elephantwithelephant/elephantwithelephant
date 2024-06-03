<?php

namespace ElephantWithElephant\Schema\DataType;

interface ColumnInterface
{
    public function dataTransformers(): array;
    public function __toString(): string;
}
