<?php

namespace ElephantWithElephant\Statement\Clause;

interface ClauseInterface
{
    public function __toString(): string;
    public function getParameters(): array;
}
