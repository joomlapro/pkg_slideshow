<?php
/**
 * @package     Slideshow
 * @subpackage  com_slideshow
 * @copyright   Copyright (C) 2012 AtomTech, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

/**
 * Slideshow component helper.
 *
 * @package     Slideshow
 * @subpackage  com_slideshow
 * @since       2.5
 */
class SlideshowHelper
{
	public static $extension = 'com_slideshow';

	/**
	 * Configure the Linkbar.
	 *
	 * @param   string  $vName  The name of the active view.
	 *
	 * @return  void
     *
	 * @since   2.5
	 */
	public static function addSubmenu($vName)
	{
		JSubMenuHelper::addEntry(
			JText::_('COM_SLIDESHOW_SUBMENU_SLIDES'),
			'index.php?option=com_slideshow&view=slides',
			$vName == 'slides'
		);
		JSubMenuHelper::addEntry(
			JText::_('COM_SLIDESHOW_SUBMENU_CATEGORIES'),
			'index.php?option=com_categories&extension=com_slideshow',
			$vName == 'categories'
		);
	}

	/**
	 * Gets a list of the actions that can be performed.
	 *
	 * @return	JObject
	 *
	 * @since   2.5
	 */
	public static function getActions()
	{
		$user      = JFactory::getUser();
		$result    = new JObject;
		$assetName = 'com_slideshow';

		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.state', 'core.delete'
		);

		foreach ($actions as $action)
		{
			$result->set($action, $user->authorise($action, $assetName));
		}

		return $result;
	}
}
