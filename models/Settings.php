<?php namespace Idesigning\QTicketsAPI\Models;

use Model;

class Settings extends Model
{

    public $implement = ['System.Behaviors.SettingsModel'];
    public $settingsCode = 'qticketsapi';
    public $settingsFields = 'fields.yaml';

    public function getSettingsValue($key, $default = null)
    {
        if ($key == 'openapi_url') {
            $parsed = parse_url($this->get('url'));
            return $parsed['scheme'] . '://' . $parsed['host'] . '/js/openapi';
        }

        return parent::getSettingsValue($key, $default);
    }
}