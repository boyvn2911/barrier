<?php

namespace SonLeu\Barrier;

use SonLeu\Barrier\Exceptions\BarrierNotPassedException;

/**
 * Trait HasBarrier
 * @package SonLeu\Barrier
 */
trait HasBarrier
{
    /**
     * @param BarrierInterface[] $objectives
     * @throws \Exception
     */
    public function barrier($objectives)
    {
        $objectives = is_array($objectives) ? $objectives : [$objectives];

        collect($objectives)->each(function (BarrierInterface $objective) {
            if (!$objective->passes()) {
                throw new BarrierNotPassedException($objective->message());
            }
        });
    }
}
