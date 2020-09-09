<?php

namespace SonLeu\Barrier\Console;

use Illuminate\Console\GeneratorCommand;

class BarrierMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:barrier';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Barrier class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Barrier';

    /**
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/barrier.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Barriers';
    }
}
