<?php

namespace SonLeu\Barrier;

use Illuminate\Support\ServiceProvider;
use SonLeu\Barrier\Console\BarrierMakeCommand;

class BarrierServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $commands = [
        BarrierMakeCommand::class
    ];

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands($this->commands);
        }
    }

    public function register()
    {
        $this->commands($this->commands);
    }

    public function provides()
    {
        return $this->commands;
    }
}
