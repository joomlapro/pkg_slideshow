<?php
/**
 * @package     Slideshow
 * @subpackage  com_slideshow
 * @copyright   Copyright (C) 2012 AtomTech, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

// Include the component HTML helpers.
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');

// Load the tooltip behavior.
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');

// Add stylesheet.
JHtml::stylesheet('com_slideshow/backend.css', false, true, false);

// Add JavaScript Frameworks.
JHtml::_('jquery.framework');
?>
<script type="text/javascript">
	Joomla.submitbutton = function (task) {
		if (task == 'slide.cancel' || document.formvalidator.isValid(document.id('slide-form'))) {
			<?php echo $this->form->getField('description')->save(); ?>
			Joomla.submitform(task, document.getElementById('slide-form'));
		} else {
			alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
		}
	}

	jQuery.noConflict();

	(function ($) {
		$(function () {
			// Hide video or image field if not checked.
			function checkMediaType(value) {
				if (value != 0) {
					$('#video').show();
					$('#image').hide();
				} else {
					$('#image').show();
					$('#video').hide();
				}
			}

			checkMediaType($('input:radio[name="jform[media_type]"]:checked').val());

			$('#jform_media_type').live('click', function () {
				checkMediaType($('input:radio[name="jform[media_type]"]:checked').val());
			});

			// Hide background field if not checked.
			function checkBackgroundType(value) {
				if (value == 3) {
					$('#background').show();
				} else {
					$('#background').hide();
				}
			}

			checkBackgroundType($('input:radio[name="jform[background_type]"]:checked').val());

			$('#jform_background_type').live('click', function () {
				checkBackgroundType($('input:radio[name="jform[background_type]"]:checked').val());
			});
		});
	})(jQuery);
</script>
<form action="<?php echo JRoute::_('index.php?option=com_slideshow&layout=edit&id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="slide-form" class="form-validate">
	<div class="row-fluid">
		<!-- Begin Slides -->
		<div class="span10 form-horizontal">
			<fieldset>
				<ul class="nav nav-tabs">
					<li class="active"><a href="#details" data-toggle="tab"><?php echo empty($this->item->id) ? JText::_('COM_SLIDESHOW_NEW_SLIDE') : JText::sprintf('COM_SLIDESHOW_EDIT_SLIDE', $this->item->id); ?></a></li>
					<li><a href="#publishing" data-toggle="tab"><?php echo JText::_('JGLOBAL_FIELDSET_PUBLISHING'); ?></a></li>
					<?php $fieldSets = $this->form->getFieldsets('params');
					foreach ($fieldSets as $name => $fieldSet): ?>
					<li><a href="#params-<?php echo $name; ?>" data-toggle="tab"><?php echo JText::_($fieldSet->label); ?></a></li>
					<?php endforeach; ?>
					<?php $fieldSets = $this->form->getFieldsets('metadata');
					foreach ($fieldSets as $name => $fieldSet): ?>
					<li><a href="#metadata-<?php echo $name; ?>" data-toggle="tab"><?php echo JText::_($fieldSet->label); ?></a></li>
					<?php endforeach; ?>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="details">
						<div class="row-fluid">
							<div class="span6">
								<div class="control-group">
									<div class="control-label"><?php echo $this->form->getLabel('title'); ?></div>
									<div class="controls"><?php echo $this->form->getInput('title'); ?></div>
								</div>
								<div class="control-group">
									<div class="control-label"><?php echo $this->form->getLabel('catid'); ?></div>
									<div class="controls"><?php echo $this->form->getInput('catid'); ?></div>
								</div>
								<div class="control-group">
									<div class="control-label"><?php echo $this->form->getLabel('ordering'); ?></div>
									<div class="controls"><?php echo $this->form->getInput('ordering'); ?></div>
								</div>

								<div class="control-group">
									<div class="control-label"><?php echo $this->form->getLabel('background_type'); ?></div>
									<div class="controls"><?php echo $this->form->getInput('background_type'); ?></div>
								</div>
								<div id="background">
									<div class="control-group">
										<div class="control-label"><?php echo $this->form->getLabel('background'); ?></div>
										<div class="controls"><?php echo $this->form->getInput('background'); ?></div>
									</div>
								</div>
							</div>
							<div class="span6">
								<div class="control-group">
									<div class="control-label"><?php echo $this->form->getLabel('media_type'); ?></div>
									<div class="controls"><?php echo $this->form->getInput('media_type'); ?></div>
								</div>
								<div id="image">
									<div class="control-group">
										<div class="control-label"><?php echo $this->form->getLabel('mediaimage'); ?></div>
										<div class="controls"><?php echo $this->form->getInput('mediaimage'); ?></div>
									</div>
								</div>
								<div id="video">
									<div class="control-group">
										<div class="control-label"><?php echo $this->form->getLabel('mediavideo'); ?></div>
										<div class="controls"><?php echo $this->form->getInput('mediavideo'); ?></div>
									</div>
								</div>

								<div class="control-group">
									<div class="control-label"><?php echo $this->form->getLabel('link'); ?></div>
									<div class="controls"><?php echo $this->form->getInput('link'); ?></div>
								</div>
								<div class="control-group">
									<div class="control-label"><?php echo $this->form->getLabel('button'); ?></div>
									<div class="controls"><?php echo $this->form->getInput('button'); ?></div>
								</div>
							</div>
						</div>
						<div class="control-group">
							<div class="control-label"><?php echo $this->form->getLabel('description'); ?></div>
							<div class="controls"><?php echo $this->form->getInput('description'); ?></div>
						</div>
					</div>
					<div class="tab-pane" id="publishing">
						<div class="row-fluid">
							<div class="span6">
								<div class="control-group">
									<div class="control-label"><?php echo $this->form->getLabel('alias'); ?></div>
									<div class="controls"><?php echo $this->form->getInput('alias'); ?></div>
								</div>
								<div class="control-group">
									<div class="control-label"><?php echo $this->form->getLabel('id'); ?></div>
									<div class="controls"><?php echo $this->form->getInput('id'); ?></div>
								</div>
								<div class="control-group">
									<div class="control-label"><?php echo $this->form->getLabel('created_by'); ?></div>
									<div class="controls"><?php echo $this->form->getInput('created_by'); ?></div>
								</div>
								<div class="control-group">
									<div class="control-label"><?php echo $this->form->getLabel('created_by_alias'); ?></div>
									<div class="controls"><?php echo $this->form->getInput('created_by_alias'); ?></div>
								</div>
								<div class="control-group">
									<div class="control-label"><?php echo $this->form->getLabel('created'); ?></div>
									<div class="controls"><?php echo $this->form->getInput('created'); ?></div>
								</div>
							</div>
							<div class="span6">
								<div class="control-group">
									<div class="control-label"><?php echo $this->form->getLabel('publish_up'); ?></div>
									<div class="controls"><?php echo $this->form->getInput('publish_up'); ?></div>
								</div>
								<div class="control-group">
									<div class="control-label"><?php echo $this->form->getLabel('publish_down'); ?></div>
									<div class="controls"><?php echo $this->form->getInput('publish_down'); ?></div>
								</div>
								<div class="control-group">
									<div class="control-label"><?php echo $this->form->getLabel('version'); ?></div>
									<div class="controls"><?php echo $this->form->getInput('version'); ?></div>
								</div>
								<div class="control-group">
									<div class="control-label"><?php echo $this->form->getLabel('modified_by'); ?></div>
									<div class="controls"><?php echo $this->form->getInput('modified_by'); ?></div>
								</div>
								<div class="control-group">
									<div class="control-label"><?php echo $this->form->getLabel('modified'); ?></div>
									<div class="controls"><?php echo $this->form->getInput('modified'); ?></div>
								</div>
								<?php if ($this->item->hits): ?>
									<div class="control-group">
										<div class="control-label"><?php echo $this->form->getLabel('hits'); ?></div>
										<div class="controls"><?php echo $this->form->getInput('hits'); ?></div>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<?php echo $this->loadTemplate('params'); ?>
					<?php echo $this->loadTemplate('metadata'); ?>
				</div>
			</fieldset>
			<input type="hidden" name="task" value="" />
			<?php echo JHtml::_('form.token'); ?>
		</div>
		<!-- End Slides -->
		<!-- Begin Sidebar -->
		<div class="span2">
			<h4><?php echo JText::_('JDETAILS'); ?></h4>
			<hr />
			<fieldset class="form-vertical">
				<div class="control-group">
					<div class="controls"><?php echo $this->form->getValue('title'); ?></div>
				</div>
				<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('state'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('state'); ?></div>
				</div>
				<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('access'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('access'); ?></div>
				</div>
				<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('featured'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('featured'); ?></div>
				</div>
				<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('language'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('language'); ?></div>
				</div>
			</fieldset>
		</div>
		<!-- End Sidebar -->
	</div>
</form>
