<?php namespace Idesigning\QTicketsAPI\Models;

use Model;

class Settings extends Model
{

    public $implement = ['System.Behaviors.SettingsModel'];
    public $settingsCode = 'qticketsapi';
    public $settingsFields = 'fields.yaml';

}