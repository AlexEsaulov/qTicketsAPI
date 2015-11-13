<?php namespace Idesigning\QTicketsAPI\Facades;

use Idesigning\QTicketsAPI\Models\Order as OrderModel;
use Illuminate\Support\Facades\Facade;

class Order extends Facade
{
    protected static function getFacadeAccessor()
    {
        return OrderModel::class;
    }

}