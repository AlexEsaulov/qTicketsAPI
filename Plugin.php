<?php namespace Idesigning\QTicketsAPI;

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
            'name'        => 'qTicketsAPI',
            'description' => 'No description provided yet...',
            'author'      => 'idesigning',
            'icon'        => 'icon-leaf'
        ];
    }

}
