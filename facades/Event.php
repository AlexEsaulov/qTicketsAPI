<?php namespace Idesigning\QTicketsAPI\Facades;

use Idesigning\QTicketsAPI\Models\Event as EventModel;
use Illuminate\Support\Facades\Facade;

class Event extends Facade
{
    protected static function getFacadeAccessor()
    {
        return EventModel::class;
    }

}