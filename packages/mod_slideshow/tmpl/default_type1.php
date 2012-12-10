<?php
/**
 * @package     Slideshow
 * @subpackage  mod_slideshow
 * @copyright   Copyright (C) 2012 AtomTech, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;
?>
<div class="row">
	<div class="span7 <?php echo $item->align ? 'right' : 'left'; ?>">
		<img src="<?php echo $item->image; ?>" alt="<?php echo htmlspecialchars($item->title); ?>" />
	</div>
	<div class="caption span5 <?php echo $item->align ? 'left' : 'right'; ?>">
		<h2><?php echo htmlspecialchars($item->title); ?></h2>
		<?php echo $item->description; ?>
		<?php if ($item->link) : ?>
		<p><a href="<?php echo $item->link; ?>" class="btn btn-info"><?php echo JText::_('MOD_SLIDESHOW_READ_MORE'); ?></a></p>
		<?php endif; ?>
	</div>
</div>
