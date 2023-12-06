<?php

namespace Geow\CommandHistory\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Geow\CommandHistory\CommandHistory
 */
class CommandHistory extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Geow\CommandHistory\CommandHistory::class;
    }
}
