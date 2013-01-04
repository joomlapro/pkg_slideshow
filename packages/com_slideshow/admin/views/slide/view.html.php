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
 * View to edit a slide.
 *
 * @package     Slideshow
 * @subpackage  com_slideshow
 * @since       3.0
 */
class SlideshowViewSlide extends JViewLegacy
{
	protected $form;

	protected $item;

	protected $state;

	/**
	 * Method to display the view.
	 *
	 * @param   string  $tpl  A template file to load. [optional]
	 *
	 * @return  mixed  A string if successful, otherwise a JError object.
	 *
	 * @since   3.0
	 */
	public function display($tpl = null)
	{
		// Initialiase variables.
		$this->form  = $this->get('Form');
		$this->item  = $this->get('Item');
		$this->state = $this->get('State');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		$this->addToolbar();

		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @return  void
	 *
	 * @since   3.0
	 */
	protected function addToolbar()
	{
		JFactory::getApplication()->input->set('hidemainmenu', true);

		$user       = JFactory::getUser();
		$userId     = $user->get('id');
		$isNew      = ($this->item->id == 0);
		$checkedOut = !($this->item->checked_out == 0 || $this->item->checked_out == $userId);

		// Since we don't track these assets at the item level, use the category id.
		$canDo      = SlideshowHelper::getActions($this->item->catid, 0);

		JToolbarHelper::title($isNew ? JText::_('COM_SLIDESHOW_MANAGER_SLIDE_NEW') : JText::_('COM_SLIDESHOW_MANAGER_SLIDE_EDIT'), 'slide.png');

		// If not checked out, can save the item.
		if (!$checkedOut && ($canDo->get('core.edit') || (count($user->getAuthorisedCategories('com_slideshow', 'core.create')))))
		{
			JToolbarHelper::apply('slide.apply');
			JToolbarHelper::save('slide.save');
		}

		if (!$checkedOut && (count($user->getAuthorisedCategories('com_slideshow', 'core.create'))))
		{
			JToolbarHelper::save2new('slide.save2new');
		}

		// If an existing item, can save to a copy.
		if (!$isNew && (count($user->getAuthorisedCategories('com_slideshow', 'core.create')) > 0))
		{
			JToolbarHelper::save2copy('slide.save2copy');
		}

		if (empty($this->item->id))
		{
			JToolbarHelper::cancel('slide.cancel');
		}
		else
		{
			JToolbarHelper::cancel('slide.cancel', 'JTOOLBAR_CLOSE');
		}

		JToolbarHelper::divider();
		JToolBarHelper::help('slide', $com = true);
	}
}
