<?php
/**
 * @package     Slideshow
 * @subpackage  com_slideshow
 * @copyright   Copyright (C) 2012 AtomTech, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * View to edit a slide.
 *
 * @package     Slideshow
 * @subpackage  com_slideshow
 * @since       2.5
 */
class SlideshowViewSlide extends JView
{
	protected $form;

	protected $item;

	protected $state;

	/**
	 * Execute and display a template script.
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  mixed  A string if successful, otherwise a JError object.
	 *
	 * @since   2.5
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

		// Load CSS
		JHtml::stylesheet('com_slideshow/backend.css', false, true, false);

		$this->addToolbar();

		parent::display($tpl);
	}

	/**
	 * Adds the page title and toolbar
	 *
	 * @return  void
	 *
	 * @since	2.5
	 */
	protected function addToolbar()
	{
		JRequest::setVar('hidemainmenu', true);

		$user	= JFactory::getUser();
		$userId	= $user->get('id');
		$isNew	= ($this->item->id == 0);
		$checkedOut = !($this->item->checked_out == 0 || $this->item->checked_out == $userId);

		// Since we don't track these assets at the item level, use the category id.
		$canDo	= SlideshowHelper::getActions($this->item->catid, 0);

		JToolBarHelper::title($isNew ? JText::_('COM_SLIDESHOW_SLIDE_ADD') : JText::_('COM_SLIDESHOW_SLIDE_EDIT'), 'slide.png');

		// If not checked out, can save the item.
		if (!$checkedOut && ($canDo->get('core.edit') || count($user->getAuthorisedCategories('com_slideshow', 'core.create')) > 0))
		{
			JToolBarHelper::apply('slide.apply');
			JToolBarHelper::save('slide.save');

			if ($canDo->get('core.create'))
			{
				JToolBarHelper::save2new('slide.save2new');
			}
		}

		// If an existing item, can save to a copy.
		if (!$isNew && $canDo->get('core.create'))
		{
			JToolBarHelper::save2copy('slide.save2copy');
		}

		if (empty($this->item->id))
		{
			JToolBarHelper::cancel('slide.cancel');
		}
		else
		{
			JToolBarHelper::cancel('slide.cancel', 'JTOOLBAR_CLOSE');
		}

		JToolBarHelper::divider();
		JToolBarHelper::help('slide', $com = true);
	}
}
