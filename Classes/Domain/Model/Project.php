<?php

/***************************************************************
*  Copyright notice
*
*  (c) 2010 Fernando H 
*  			Fernando A 
*  			
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * Project
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_F2portfolio_Domain_Model_Project extends Tx_Extbase_DomainObject_AbstractEntity {
	
	/**
	 * name
	 * @var string
	 * @validate NotEmpty
	 */
	protected $name;
	
	/**
	 * description
	 * @var string
	 */
	protected $description;
	
	/**
	 * outstanding
	 * @var boolean
	 */
	protected $outstanding;
	
	/**
	 * date
	 * @var integer
	 */
	protected $date;
	
	/**
	 * tags
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_F2portfolio_Domain_Model_Tag>
	 */
	protected $tags;
	
	/**
	 * images
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_F2portfolio_Domain_Model_images>
	 */
	protected $images;
	
	
	
	/**
	 * Setter for name
	 *
	 * @param string $name name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Getter for name
	 *
	 * @return string name
	 */
	public function getName() {
		return $this->name;
	}
	
	/**
	 * Setter for description
	 *
	 * @param string $description description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Getter for description
	 *
	 * @return string description
	 */
	public function getDescription() {
		return $this->description;
	}
	
	/**
	 * Setter for outstanding
	 *
	 * @param boolean $outstanding outstanding
	 * @return void
	 */
	public function setOutstanding($outstanding) {
		$this->outstanding = $outstanding;
	}

	/**
	 * Getter for outstanding
	 *
	 * @return boolean outstanding
	 */
	public function getOutstanding() {
		return $this->outstanding;
	}
	
	/**
	 * Returns the boolean state of outstanding
	 *
	 * @return bool The state of outstanding
	 */
	public function isOutstanding() {
		$this->getOutstanding();
	}
	
	/**
	 * Setter for date
	 *
	 * @param integer $date date
	 * @return void
	 */
	public function setDate($date) {
		$this->date = $date;
	}

	/**
	 * Getter for date
	 *
	 * @return integer date
	 */
	public function getDate() {
		return $this->date;
	}
	
	/**
	 * Setter for tags
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_F2portfolio_Domain_Model_Tag> $tags tags
	 * @return void
	 */
	public function setTags(Tx_Extbase_Persistence_ObjectStorage $tags) {
		$this->tags = $tags;
	}

	/**
	 * Getter for tags
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_F2portfolio_Domain_Model_Tag> tags
	 */
	public function getTags() {
		return $this->tags;
	}
	
	/**
	 * Adds a Tag
	 *
	 * @param Tx_F2portfolio_Domain_Model_Tag The Tag to be added
	 * @return void
	 */
	public function addTag(Tx_F2portfolio_Domain_Model_Tag $tag) {
		$this->tags->attach($tag);
	}
	
	/**
	 * Removes a Tag
	 *
	 * @param Tx_F2portfolio_Domain_Model_Tag The Tag to be removed
	 * @return void
	 */
	public function removeTag(Tx_F2portfolio_Domain_Model_Tag $tag) {
		$this->tags->detach($tag);
	}

        /**
	 * Setter for images
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_F2portfolio_Domain_Model_images> $images images
	 * @return void
	 */
	public function setImages(Tx_Extbase_Persistence_ObjectStorage $images) {
		$this->images = $images;
	}

	/**
	 * Getter for images
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_F2portfolio_Domain_Model_images> images
	 */
	public function getImages() {
		return $this->images;
	}

	/**
	 * Adds a Image
	 *
	 * @param Tx_F2portfolio_Domain_Model_images The Image to be added
	 * @return void
	 */
	public function addImage(Tx_F2portfolio_Domain_Model_images $image) {
		$this->images->attach($image);
	}

	/**
	 * Removes a Image
	 *
	 * @param Tx_F2portfolio_Domain_Model_images The Image to be removed
	 * @return void
	 */
	public function removeImage(Tx_F2portfolio_Domain_Model_Tag $image) {
		$this->image->detach($image);
	}

	
}
?>