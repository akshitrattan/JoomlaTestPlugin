<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  System.test
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die();

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Factory;
use Joomla\CMS\Uri\Uri;

class PlgSystemTest extends CMSPlugin
{


    protected $displayText;
    

    public function __construct(&$subject, $config)
	{
		parent::__construct($subject, $config);
        $this->displayText = $this->params->get('plugin_text');

	}


    public function onBeforeCompileHead()
    {
        $url = Uri::base() . 'plugins/system/test/test.js';
        $document = Factory::getDocument();
        $document->addScriptOptions('plg_system_test', array(
            'displaytext' => $this->displayText
        ));
        $document->addScript($url);
    }
}
