<?php
/**
 * @package     Slideshow
 * @subpackage  com_slideshow
 * @copyright   Copyright (C) 2012 AtomTech, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

// Include the component HTML helpers.
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');

// Load the tooltip behavior.
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');

// Initialise variables.
$canDo = SlideshowHelper::getActions();
?>
<script type="text/javascript">
	Joomla.submitbutton = function(task)
	{
		if (task == 'slide.cancel' || document.formvalidator.isValid(document.id('slide-form'))) {
			<?php echo $this->form->getField('description')->save(); ?>
			Joomla.submitform(task, document.getElementById('slide-form'));
		}
		else {
			alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
		}
	}
	window.addEvent('domready', function() {
		document.id('jform_type0').addEvent('click', function(e){
			document.id('video').setStyle('display', 'block');
			document.id('image').setStyle('display', 'none');
			document.id('link').setStyle('display', 'none');
			document.id('align').setStyle('display', 'none');
		});
		document.id('jform_type1').addEvent('click', function(e){
			document.id('video').setStyle('display', 'none');
			document.id('image').setStyle('display', 'block');
			document.id('link').setStyle('display', 'block');
			document.id('align').setStyle('display', 'block');
		});
		document.id('jform_type2').addEvent('click', function(e){
			document.id('video').setStyle('display', 'none');
			document.id('image').setStyle('display', 'block');
			document.id('link').setStyle('display', 'block');
			document.id('align').setStyle('display', 'block');
		});
		if (document.id('jform_type0').checked == true) {
			document.id('jform_type0').fireEvent('click');
		}
		else if (document.id('jform_type1').checked == true) {
			document.id('jform_type1').fireEvent('click');
		}
		else {
			document.id('jform_type2').fireEvent('click');
		}
	});
</script>
<form action="<?php echo JRoute::_('index.php?option=com_slideshow&layout=edit&id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="slide-form" class="form-validate">
	<div class="width-60 fltlft">
		<fieldset class="adminform">
			<legend><?php echo empty($this->item->id) ? JText::_('COM_SLIDESHOW_SLIDE_ADD') : JText::sprintf('COM_SLIDESHOW_SLIDE_EDIT', $this->item->id); ?></legend>
			<ul class="adminformlist">
				<li><?php echo $this->form->getLabel('title'); ?>
				<?php echo $this->form->getInput('title'); ?></li>
				<li><?php echo $this->form->getLabel('alias'); ?>
				<?php echo $this->form->getInput('alias'); ?></li>
				<li><?php echo $this->form->getLabel('catid'); ?>
				<?php echo $this->form->getInput('catid'); ?></li>

				<li><?php echo $this->form->getLabel('type'); ?>
				<?php echo $this->form->getInput('type'); ?></li>

				<li><div id="video"><?php echo $this->form->getLabel('video'); ?>
				<?php echo $this->form->getInput('video'); ?></div></li>
				<li><div id="image"><?php echo $this->form->getLabel('image'); ?>
				<?php echo $this->form->getInput('image'); ?></div></li>
				<li><div id="link"><?php echo $this->form->getLabel('link'); ?>
				<?php echo $this->form->getInput('link'); ?></div></li>
				<li><div id="align"><?php echo $this->form->getLabel('align'); ?>
				<?php echo $this->form->getInput('align'); ?></div></li>

				<?php if ($canDo->get('core.edit.state')) : ?>
					<li><?php echo $this->form->getLabel('published'); ?>
					<?php echo $this->form->getInput('published'); ?></li>
				<?php endif; ?>

				<li><?php echo $this->form->getLabel('access'); ?>
				<?php echo $this->form->getInput('access'); ?></li>
				<li><?php echo $this->form->getLabel('language'); ?>
				<?php echo $this->form->getInput('language'); ?></li>

				<?php if ($this->item->id) : ?>
					<li><?php echo $this->form->getLabel('id'); ?>
					<?php echo $this->form->getInput('id'); ?></li>
				<?php endif; ?>
			</ul>
			<div>
				<?php echo $this->form->getLabel('description'); ?>
				<div class="clr"></div>
				<?php echo $this->form->getInput('description'); ?>
			</div>
		</fieldset>
	</div>
	<div class="width-40 fltrt">
		<?php echo JHtml::_('sliders.start', 'slide-sliders-' . $this->item->id, array('useCookie' => 1)); ?>
		<?php echo JHtml::_('sliders.panel', JText::_('JGLOBAL_FIELDSET_PUBLISHING'), 'publishing-details'); ?>
		<fieldset class="panelform">
			<ul class="adminformlist">
				<li><?php echo $this->form->getLabel('created_by'); ?>
				<?php echo $this->form->getInput('created_by'); ?></li>
				<li><?php echo $this->form->getLabel('created_by_alias'); ?>
				<?php echo $this->form->getInput('created_by_alias'); ?></li>
				<li><?php echo $this->form->getLabel('created'); ?>
				<?php echo $this->form->getInput('created'); ?></li>
				<li><?php echo $this->form->getLabel('publish_up'); ?>
				<?php echo $this->form->getInput('publish_up'); ?></li>
				<li><?php echo $this->form->getLabel('publish_down'); ?>
				<?php echo $this->form->getInput('publish_down'); ?></li>

				<?php if ($this->item->modified_by) : ?>
					<li><?php echo $this->form->getLabel('modified_by'); ?>
					<?php echo $this->form->getInput('modified_by'); ?></li>

					<li><?php echo $this->form->getLabel('modified'); ?>
					<?php echo $this->form->getInput('modified'); ?></li>
				<?php endif; ?>

				<?php if ($this->item->hits) : ?>
					<li><?php echo $this->form->getLabel('hits'); ?>
					<?php echo $this->form->getInput('hits'); ?></li>
				<?php endif; ?>
			</ul>
		</fieldset>
		<?php echo $this->loadTemplate('params'); ?>
		<?php echo $this->loadTemplate('metadata'); ?>
		<?php echo JHtml::_('sliders.end'); ?>
	</div>
	<div>
		<input type="hidden" name="task" value="" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
	<div class="clr"></div>
</form>
