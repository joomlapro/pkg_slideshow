<?php
/**
 * @package     Slideshow
 * @subpackage  com_slideshow
 * @copyright   Copyright (C) 2012 AtomTech, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

/**
 * Slideshow helper.
 *
 * @package     Slideshow
 * @subpackage  com_slideshow
 * @since       3.0
 */
class SlideshowHelper
{
	/**
	 * Configure the Linkbar.
	 *
	 * @param   string  $vName  The name of the active view.
	 *
	 * @return  void
	 *
	 * @since   3.0
	 */
	public static function addSubmenu($vName = 'slides')
	{
		JHtmlSidebar::addEntry(
			JText::_('COM_SLIDESHOW_SUBMENU_SLIDES'),
			'index.php?option=com_slideshow&view=slides',
			$vName == 'slides'
		);

		JHtmlSidebar::addEntry(
			JText::_('COM_SLIDESHOW_SUBMENU_CATEGORIES'),
			'index.php?option=com_categories&extension=com_slideshow',
			$vName == 'categories'
		);

		if ($vName == 'categories')
		{
			JToolbarHelper::title(
				JText::sprintf('COM_CATEGORIES_CATEGORIES_TITLE', JText::_('com_slideshow')),
				'slideshow-categories');
		}
	}

	/**
	 * Gets a list of the actions that can be performed.
	 *
	 * @param   int  $categoryId  The category ID.
	 *
	 * @return  JObject  A JObject containing the allowed actions.
	 *
	 * @since   3.0
	 */
	public static function getActions($categoryId = 0)
	{
		$user   = JFactory::getUser();
		$result = new JObject;

		if (empty($categoryId))
		{
			$assetName = 'com_slideshow';
			$level = 'component';
		}
		else
		{
			$assetName = 'com_slideshow.category.' . (int) $categoryId;
			$level = 'category';
		}

		$actions = JAccess::getActions('com_slideshow', $level);

		foreach ($actions as $action)
		{
			$result->set($action->name, $user->authorise($action->name, $assetName));
		}

		return $result;
	}
}
