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
        $this->url = $uriBuilder->uriFor('list',array('selectedTag'=>$tag));
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

            $this->addStylesheet();

            //BEGIN TagCloud
            $tagcloudItems =array();
            foreach($tags as $tag){
                $tagcloudItems[] = new TagcloudItem($tag,$this->uriBuilder);
            }
            $this->view->assign('tagcloudItems', $tagcloudItems);
            //END TagCloud

            //BEGIN Outstanding projects list
            $outstandingProjects = $this->projectRepository->findOutstandings();
            if(count($outstandingProjects)<$this->settings['main']['projectsList']['maxProjects']){
                $outstandingProjects = array_merge($outstandingProjects,$this->projectRepository->findLatests($this->settings['main']['projectsList']['maxProjects']-count($outstandingProjects),$findOutstandings='no'));
            }
            $this->view->assign('outstandignProjects',$outstandingProjects);
            //END Outstanding projects list

        }

        /**
         * @return string rendered rss action
         */
        public function rssAction(){
            $latestsProjects = $this->projectRepository->findLatests($this->settings['rss']['maxProjects']);
            $this->view->assign('projects',$latestsProjects);
        }

        /**
         * @param Tx_F2portfolio_Domain_Model_Tag $selectedTag Tag to filter by
         * @return string rendered view of projects by tag
         */
        public function listAction(Tx_F2portfolio_Domain_Model_Tag $selectedTag = NULL){
            $this->addStylesheet();
            $this->view->assign('projects', $selectedTag->getProjects());
            $this->view->assign('numProjects', $selectedTag->getProjects()->count());
            $this->view->assign('tag', $selectedTag);
        }

        /**
         *
         * @param Tx_F2portfolio_Domain_Model_Project $selectedProject The project to display
         * @return string rendered view of the selected project
         */
        public function showAction(Tx_F2portfolio_Domain_Model_Project $selectedProject = NULL){
            $this->addStylesheet();
            $this->view->assign('selectedProject', $selectedProject);
        }

        /**
         * Adds a CSS file if configured for that view if TypoScript
         */
	private function addStylesheet(){
            $stylesheet = $this->settings[$this->request->getControllerActionName()]['stylesheet'];
            // "EXT:" shortcut replaced with the extension path
            $stylesheet = str_replace('EXT:', t3lib_extMgm::siteRelPath('f2portfolio'), $stylesheet);

            //different solution to add the css if the action is cached or uncached
            if($this->request->isCached()){
                $GLOBALS['TSFE']->getPageRenderer()->addCssFile($stylesheet);
            }else{

                $this->response->addAdditionalHeaderData('<link rel="stylesheet" type="text/css" href="'.
                        $stylesheet.'" media="all" />');
            }
        }
}
?>