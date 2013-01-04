<?php
/**
 * @package     Slideshow
 * @subpackage  com_slideshow
 * @copyright   Copyright (C) 2012 AtomTech, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

// Execute the task.
$controller = JControllerLegacy::getInstance('Slideshow');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
