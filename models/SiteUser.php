<?php namespace Idesigning\QTicketsAPI\Models;


use Idesigning\QTicketsAPI\Services\Model;

class SiteUser extends Model
{
    public $relations = [
        'site' => [Site::class]
    ];
}