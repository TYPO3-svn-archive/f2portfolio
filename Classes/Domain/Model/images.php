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
 * images
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_F2portfolio_Domain_Model_images extends Tx_Extbase_DomainObject_AbstractValueObject {
	
	/**
	 * name
	 * @var string
	 * @validate NotEmpty
	 */
	protected $name;
	
	/**
	 * file
	 * @var string
	 * @validate NotEmpty
	 */
	protected $file;
	
	/**
	 * alttext
	 * @var string
	 */
	protected $alttext;
	
	/**
	 * longdesc
	 * @var string
	 */
	protected $longdesc;
	
	/**
	 * description
	 * @var string
	 */
	protected $description;
	
	
	
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
	 * Setter for file
	 *
	 * @param string $file file
	 * @return void
	 */
	public function setFile($file) {
		$this->file = $file;
	}

	/**
	 * Getter for file
	 *
	 * @return string file
	 */
	public function getFile() {
		return $this->file;
	}
	
	/**
	 * Setter for alttext
	 *
	 * @param string $alttext alttext
	 * @return void
	 */
	public function setAlttext($alttext) {
		$this->alttext = $alttext;
	}

	/**
	 * Getter for alttext
	 *
	 * @return string alttext
	 */
	public function getAlttext() {
		return $this->alttext;
	}
	
	/**
	 * Setter for longdesc
	 *
	 * @param string $longdesc longdesc
	 * @return void
	 */
	public function setLongdesc($longdesc) {
		$this->longdesc = $longdesc;
	}

	/**
	 * Getter for longdesc
	 *
	 * @return string longdesc
	 */
	public function getLongdesc() {
		return $this->longdesc;
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
	
}
?>