<?php

declare(strict_types=1);

namespace Tests\Firevel\Firequent;

use Firevel\Firequent\FirequentServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
    /**
     * Get package providers.
     * @param  \Illuminate\Foundation\Application  $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            FirequentServiceProvider::class
        ];
    }

    /**
     * Define environment setup.
     * @param  \Illuminate\Foundation\Application   $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // TODO
    }
}
