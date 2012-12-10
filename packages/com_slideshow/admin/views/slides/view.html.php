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
 * View class for a list of slides.
 *
 * @package     Slideshow
 * @subpackage  com_slideshow
 * @since       2.5
 */
class SlideshowViewSlides extends JView
{
	protected $items;

	protected $pagination;

	protected $state;

	/**
	 * Method to display the view.
	 *
	 * @param   string  $tpl  A template file to load. [optional]
	 *
	 * @return  mixed  A string if successful, otherwise a JError object.
	 *
	 * @since   2.5
	 */
	public function display($tpl = null)
	{
		// Initialise variables.
		$this->items      = $this->get('Items');
		$this->pagination = $this->get('Pagination');
		$this->state      = $this->get('State');

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
	 * Add the page title and toolbar.
	 *
	 * @return  void
	 *
	 * @since   2.5
	 */
	protected function addToolbar()
	{
		require_once JPATH_COMPONENT . '/helpers/slideshow.php';

		$state = $this->get('State');
		$canDo = SlideshowHelper::getActions($state->get('filter.category_id'));
		$user  = JFactory::getUser();

		JToolBarHelper::title(JText::_('COM_SLIDESHOW_MANAGER_SLIDES'), 'slides.png');

		if (count($user->getAuthorisedCategories('com_slideshow', 'core.create')) > 0)
		{
			JToolBarHelper::addNew('slide.add');
		}

		if (($canDo->get('core.edit')))
		{
			JToolBarHelper::editList('slide.edit');
		}

		if ($canDo->get('core.edit.state'))
		{
			if ($state->get('filter.published') != 2)
			{
				JToolBarHelper::divider();
				JToolBarHelper::publish('slides.publish', 'JTOOLBAR_PUBLISH', true);
				JToolBarHelper::unpublish('slides.unpublish', 'JTOOLBAR_UNPUBLISH', true);
			}

			if ($state->get('filter.published') != -1)
			{
				JToolBarHelper::divider();
				if ($state->get('filter.published') != 2)
				{
					JToolBarHelper::archiveList('slides.archive');
				}
				elseif ($state->get('filter.published') == 2)
				{
					JToolBarHelper::unarchiveList('slides.publish');
				}
			}
		}

		if ($canDo->get('core.edit.state'))
		{
			JToolBarHelper::checkin('slides.checkin');
		}

		if ($state->get('filter.published') == -2 && $canDo->get('core.delete'))
		{
			JToolBarHelper::deleteList('', 'slides.delete', 'JTOOLBAR_EMPTY_TRASH');
			JToolBarHelper::divider();
		}
		elseif ($canDo->get('core.edit.state'))
		{
			JToolBarHelper::trash('slides.trash');
			JToolBarHelper::divider();
		}

		if ($canDo->get('core.admin'))
		{
			JToolBarHelper::preferences('com_slideshow');
			JToolBarHelper::divider();
		}

		JToolBarHelper::help('slides', $com = true);
	}
}
