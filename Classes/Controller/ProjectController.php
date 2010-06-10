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
 * Controller for the Project object
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */

// TODO: As your extension matures, you should use Tx_Extbase_MVC_Controller_ActionController as base class, instead of the ScaffoldingController used below.
class Tx_F2portfolio_Controller_ProjectController extends Tx_Extbase_MVC_Controller_ActionController {
	
	/**
	 * @var Tx_F2portfolio_Domain_Repository_ProjectRepository
	 */
	protected $projectRepository;

        /**
	 * @var Tx_F2portfolio_Domain_Repository_TagRepository
	 */
	protected $tagRepository;


	/**
	 * Initializes the current action
	 *
	 * @return void
	 */
	protected function initializeAction() {
		$this->projectRepository = t3lib_div::makeInstance('Tx_F2portfolio_Domain_Repository_ProjectRepository');
                $this->tagRepository = t3lib_div::makeInstance('Tx_F2portfolio_Domain_Repository_TagRepository');
	}
	##TOKEN FOR SCAFFOLDING. Will be replaced by the necessary actions for Create, Read, Update and Delete queries by the kickstarter, when using scaffold2file.
	# DO NOT REMOVE THIS TOKEN!##
	

	
        /**
         * @return string rendered main action
         */
        public function mainAction(){
            $tags = $this->tagRepository->findAll();


        }

        /**
         * @param Tx_F2portfolio_Domain_Model_Tag $selectedTag Tag to filter by
         * @return string rendered view of projects by tag
         */
        public function listByTagAction(Tx_F2portfolio_Domain_Model_Tag $selectedTag = NULL){

        }

        /**
         *
         * @param Tx_F2portfolio_Domain_Model_Project $selectedProject The project to display
         * @return string rendered view of the selected project
         */
        public function showAction(Tx_F2portfolio_Domain_Model_Project $selectedProject = NULL){

        }


	
}
?>