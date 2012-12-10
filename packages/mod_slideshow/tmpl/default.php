<?php
/**
 * @package     Slideshow
 * @subpackage  mod_slideshow
 * @copyright   Copyright (C) 2012 AtomTech, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

JHtml::_('stylesheet', 'mod_slideshow/template.css', array(), true);
JHtml::_('script', 'mod_slideshow/jquery.flexslider.js', array(), true);
?>
<div id="slider">
	<div id="slider-nav">
		<div class="slider-nav-btn slider-nav-prev"><i class="icon-chevron-left icon-white"></i></div>
		<div class="slider-nav-btn slider-nav-next"><i class="icon-chevron-right icon-white"></i></div>
	</div>
	<div class="container">
		<div class="slider-wrapper">
			<div class="main-slider">
				<ul class="slides">
					<?php foreach ($list as $item) : ?>
					<li class="type<?php echo $item->type; ?>">
						<?php require JModuleHelper::getLayoutPath('mod_slideshow', 'default_type' . $item->type); ?>
					</li>
					<?php endforeach ?>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
