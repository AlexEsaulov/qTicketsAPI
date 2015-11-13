<?php namespace Idesigning\QTicketsAPI\Models;


use Idesigning\QTicketsAPI\Services\Model;

class Event extends Model
{
    public $relations = [
        'currency' => [Currency::class]
    ];
}