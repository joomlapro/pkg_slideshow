<?php
/**
 * @package     Slideshow
 * @subpackage  com_slideshow
 * @copyright   Copyright (C) 2012 AtomTech, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controller');

/**
 * Slideshow Component Controller
 *
 * @package     Slideshow
 * @subpackage  com_slideshow
 * @since       2.5
 */
class SlideshowController extends JController
{
	/**
	 * @var		string	The default view.
	 * @since	2.5
	 */
	protected $default_view = 'slides';

	/**
	 * Method to display a view.
	 *
	 * @param   boolean  $cachable   If true, the view output will be cached.
	 * @param   array    $urlparams  An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
	 *
	 * @return  JController  This object to support chaining.
     *
	 * @since   2.5
	 */
	public function display($cachable = false, $urlparams = false)
	{
		require_once JPATH_COMPONENT . '/helpers/slideshow.php';

		// Load the submenu.
		SlideshowHelper::addSubmenu(JRequest::getCmd('view', 'slides'));

		$view   = JRequest::getCmd('view', 'slides');
		$layout = JRequest::getCmd('layout', 'default');
		$id     = JRequest::getInt('id');

		parent::display();

		return $this;
	}
}
