<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * iterates through them and gets each tag as a percentage of the total number of pieces of content.
 * I'm rounding to the nearest 10 because I think 10 different font-sizes in a tag-cloud is more than enough
 */
class Tx_F2portfolio_ViewHelpers_TagcloudViewHelper extends Tx_Fluid_Core_ViewHelper_TagBasedViewHelper {

	/**
	 * @var string
	 */
	protected $tagName = 'ul';

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
	 * Render the gravatar image
	 *
	 * @param Array ITagcloudItem $tagcloudItems Array of objects that implemens ITagcloudItem
	 * @return string The rendered image tag
	 */
	public function render($tagcloudItems) {
		$tagContent = '';
                $totalWeight = 0;

                foreach($tagcloudItems as $tag){
                    $totalWeight += $tag->getWeight();
                }

                foreach($tagcloudItems as $tag){
                    //get the number-of-tag-occurances as a percentage of the overall number
                    $tagRelativeWeight = (100/$totalWeight) * $tag->getWeight();
                    //round the number to the nearest 10
                    $tagRelativeWeight = round($tagRelativeWeight,-1);
                    $tagContent .= '<li class="clouditem-'.$tagRelativeWeight.'"><a href="'.$tag->getUrl().'">'.$tag->getName().'</a></li>';
                }
                $this->tag->addAttribute('class', 'tagcloud');
		$this->tag->setContent($tagContent);
		return $this->tag->render();
	}
}
?>
