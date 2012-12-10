<?php
/**
 * @package     Slideshow
 * @subpackage  com_slideshow
 * @copyright   Copyright (C) 2012 AtomTech, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controlleradmin');

/**
 * Slides list controller class.
 *
 * @package     Slideshow
 * @subpackage  com_slideshow
 * @since       2.5
 */
class SlideshowControllerSlides extends JControllerAdmin
{
	/**
	 * @var		string	The prefix to use with controller messages.
	 * @since	2.5
	 */
	protected $text_prefix = 'COM_SLIDESHOW_SLIDES';

	/**
	 * Constructor.
	 *
	 * @param   array  $config  An optional associative array of configuration settings.
     *
	 * @see     JController
	 * @since   2.5
	 */
	public function __construct($config = array())
	{
		parent::__construct($config);
	}

	/**
	 * Proxy for getModel.
     *
	 * @param   string  $name    The model name. Optional.
	 * @param   string  $prefix  The class prefix. Optional.
	 * @param   array   $config  Configuration array for model. Optional.
     *
	 * @return  object  The model.
     *
	 * @since	2.5
	 */
	public function getModel($name = 'Slide', $prefix = 'SlideshowModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);

		return $model;
	}
}
