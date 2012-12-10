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
<img src="<?php echo $item->image; ?>" alt="<?php echo htmlspecialchars($item->title); ?>" style="width: 100%;" />
<a class="caption<?php echo $item->align ? ' right' : ''; ?>" href="<?php echo $item->link; ?>"><?php echo htmlspecialchars($item->title); ?></a>
