<?php namespace Idesigning\QTicketsAPI;

use Backend;
use Idesigning\QTicketsAPI\Models\Settings;
use System\Classes\PluginBase;

/**
 * qTicketsAPI Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name' => 'qTicketsAPI',
            'description' => 'No description provided yet...',
            'author' => 'idesigning',
            'icon' => 'icon-leaf'
        ];
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label' => 'Settings',
                'description' => '',
                'category' => 'qTickets API',
                'icon' => 'icon-ticket',
                'class' => Settings::class,
                'order' => 500,
                'keywords' => 'qtickets api',
                'permissions' => ['idesigning.qtickets.admin']
            ]
        ];
    }
}

