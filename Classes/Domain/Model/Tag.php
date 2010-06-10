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
 * Tag
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_F2portfolio_Domain_Model_Tag extends Tx_Extbase_DomainObject_AbstractEntity {
	
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
	 * projects
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_F2portfolio_Domain_Model_Project>
	 */
	protected $projects;
	
	
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
	 * Setter for projects
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_F2portfolio_Domain_Model_Project> $projects projects
	 * @return void
	 */
	public function setProjects(Tx_Extbase_Persistence_ObjectStorage $projects) {
		$this->projects = $projects;
	}

	/**
	 * Getter for projects
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_F2portfolio_Domain_Model_Project> projects
	 */
	public function getProjects() {
		return $this->projects;
	}

	/**
	 * Adds a Project
	 *
	 * @param Tx_F2portfolio_Domain_Model_Project The Project to be added
	 * @return void
	 */
	public function addProject(Tx_F2portfolio_Domain_Model_Project $project) {
		$this->project->attach($project);
	}

	/**
	 * Removes a Project
	 *
	 * @param Tx_F2portfolio_Domain_Model_Project The Project to be removed
	 * @return void
	 */
	public function removeTag(Tx_F2portfolio_Domain_Model_Project $project) {
		$this->projects->detach($project);
	}
	
}
?>