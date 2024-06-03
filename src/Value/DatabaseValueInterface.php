<?php

namespace Sarue\Pgal\Value;

interface DatabaseValueInterface
{
    public function toDatabase(): string;
}
