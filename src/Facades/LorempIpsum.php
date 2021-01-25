<?php


namespace Lemyskaman\LorempIpsum\Facades;

use Lemyskaman\LorempIpsum\LorempIpsum as LorempIpsumKernel;


class LorempIpsum extends \Illuminate\Support\Facades\Facade
{

    protected static function getFacadeAccessor()
    {
        return LorempIpsumKernel::class;
    }
}