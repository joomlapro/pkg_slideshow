<?php
/**
 * @package     Slideshow
 * @subpackage  mod_slideshow
 * @copyright   Copyright (C) 2012 AtomTech, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

/**
 * Slideshow module helper.
 *
 * @package     Products
 * @subpackage  mod_slideshow
 * @since       2.5
 */
abstract class ModSlideshowHelper
{
	/**
	 * Get a list of the slide items.
	 *
	 * @param   JRegistry  &$params  The module options.
	 *
	 * @return  array
	 *
	 * @since   2.5
	 */
	public static function getList(&$params)
	{
		// Initialiase variables.
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		// Prepare query.
		$query->select('a.*');
		$query->from('#__slideshow AS a');
		$query->where('a.published = 1');
		$query->order('a.ordering ASC');

		// Inject the query and load the items.
		$db->setQuery($query);
		$items = $db->loadObjectList();

		// Check for a database error.
		if ($db->getErrorNum())
		{
			JError::raiseWarning(500, $db->getErrorMsg());
			return null;
		}

		return $items;
	}
}
