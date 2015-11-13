<?php namespace Idesigning\QTicketsAPI\Models;


use Idesigning\QTicketsAPI\Services\Model;

class Order extends Model
{
    public $relations = [
        'event' => [Event::class],
        'date' => [Date::class],
        'site_user' => [SiteUser::class],
        'payment' => [Payment::class],
    ];
}