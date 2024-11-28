<?php

declare(strict_types=1);

namespace App\Model\VO;

final class Uid
{
    private string $value;

    public function __construct(string $value) {
        $this->value = $value;
    }

    public function getValue(): string {
        return $this->value;
    }

    /**
     * @param string $value
     * @return void
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    public static function generate(): self {
        $uuid = bin2hex(random_bytes(16));
        return new self($uuid);
    }
}