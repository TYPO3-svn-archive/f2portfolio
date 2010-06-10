<?php
require_once t3lib_extMgm::extPath('f2portfolio').'Classes/Util/ITagCloudItem.php';
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

/**
 * Class to map Tag object into objects that implements the interface ITagCloudItem
 */
class TagcloudItem implements ITagCloudItem{
    private $name;
    private $url;
    private $weight;

    public function  __construct(Tx_F2portfolio_Domain_Model_Tag $tag, Tx_Extbase_MVC_Web_Routing_UriBuilder $uriBuilder) {
        $this->name = $tag->getName();
        $this->weight = $tag->getProjects()->count();
        $this->url = $uriBuilder->uriFor('listByTag',array($tag));
    }

    public function getName() {
        return $this->name;
    }
    public function getUrl() {
        return $this->url;
    }
    public function getWeight() {
        return $this->weight;
    }
}


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

	

	
        /**
         * @return string rendered main action
         */
        public function mainAction(){
            $tags = $this->tagRepository->findAll();
            $projects = $this->projectRepository->findAll();

            //BEGIN TagCloud
            $tagcloudItems =array();
            foreach($tags as $tag){
                $tagcloudItems[] = new TagcloudItem($tag,$this->uriBuilder);
            }
            $this->view->assign('tagcloudItems', $tagcloudItems);
            //END TagCloud

            //BEGIN Outstanding projects list
            var_dump($this->projectRepository->findOutstandings(2));
            var_dump($this->projectRepository->findLatests());
            //TODO: poner un parametro por configuracion que indique el numero minimo de proyectos a motrar en portada y si no se llenan con los destacados rellenarlos con los ultimos prooyectos
            //END Outstanding projects list

        }

        /**
         * @param Tx_F2portfolio_Domain_Model_Tag $selectedTag Tag to filter by
         * @return string rendered view of projects by tag
         */
        public function listByTagAction(Tx_F2portfolio_Domain_Model_Tag $selectedTag = NULL){
            $this->view->assign('projects', $selectedTag->getProjects());
            $this->view->assign('tag', $selectedTag);
        }

        /**
         *
         * @param Tx_F2portfolio_Domain_Model_Project $selectedProject The project to display
         * @return string rendered view of the selected project
         */
        public function showAction(Tx_F2portfolio_Domain_Model_Project $selectedProject = NULL){
            $this->view->assign('selectedProject', $selectedProject);
        }


	
}
?>