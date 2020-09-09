<?php

namespace SonLeu\Barrier;

/**
 * Interface BarrierInterface
 * @package SonLeu\Barrier
 */
interface BarrierInterface
{
    /**
     * @return bool
     */
    public function passes(): bool;

    /**
     * @return string
     */
    public function message(): string;
}
