<?php
/**
 * @link http://buildwithcraft.com/
 * @copyright Copyright (c) 2013 Pixel & Tonic, Inc.
 * @license http://buildwithcraft.com/license
 */

namespace craft\app\variables;

use craft\app\base\ElementInterface;

/**
 * Class Elements variable.
 *
 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since 3.0
 */
class Elements
{
	// Public Methods
	// =========================================================================

	/**
	 * Returns an element type.
	 *
	 * @param ElementInterface $class
	 *
	 * @return ElementInterface|null
	 */
	public function getElementInstance($class)
	{
		return new $class;
	}
}