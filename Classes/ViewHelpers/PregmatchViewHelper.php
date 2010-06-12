<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * iterates through them and gets each tag as a percentage of the total number of pieces of content.
 * I'm rounding to the nearest 10 because I think 10 different font-sizes in a tag-cloud is more than enough
 */
class Tx_F2portfolio_ViewHelpers_PregmatchViewHelper extends Tx_Fluid_Core_ViewHelper_TagBasedViewHelper {


	/**
	 * Initialize arguments
	 *
	 * @return void
	 */
	public function initializeArguments() {
		parent::initializeArguments();

		$this->registerUniversalTagAttributes();
	}

        /**
         *
         * @param string $subject
         * @param string $pattern
         * @return integer
         */
	public function render($subject,$pattern) {
		return preg_match($pattern,$subject);
	}
}
?>
