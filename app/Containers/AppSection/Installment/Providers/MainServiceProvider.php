<?php

namespace App\Containers\AppSection\Installment\Providers;

use App\Ship\Parents\Providers\MainServiceProvider as ParentMainServiceProvider;

/**
 * The Main Service Provider of this container.
 * It will be automatically registered by the framework.
 */
class MainServiceProvider extends ParentMainServiceProvider
{
    public array $serviceProviders = [];

    public array $aliases = [];
}
