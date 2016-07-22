<?php
namespace Album\Controller;

 use Zend\Mvc\Controller\AbstractActionController;
 use Zend\View\Model\ViewModel;
 use Album\Model\Album;
 //use Album\Model\AlbumTable;   // <-- Add this import
 use Album\Form\AlbumForm;       // <-- Add this import

 class AlbumController extends AbstractActionController
 {
	  protected $albumTable;
	      
		 public function indexAction()
     {
		 //echo 'hehe'. getcwd(); exit;
         return new ViewModel(array(
             'albums' => $this->getAlbumTable()->fetchAll(),
         ));
     }
     
    // Add content to this method:
     public function addAction()
     {
         $form = new AlbumForm();
         $form->get('submit')->setValue('Add');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $album = new Album();
             $form->setInputFilter($album->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $album->exchangeArray($form->getData());
                 $this->getAlbumTable()->saveAlbum($album);

                 // Redirect to list of albums. How to redirect back to form??????
                 return $this->redirect()->toRoute('album');
             }
         }
         return array('form' => $form);
     }

     public function editAction()
     {
		 
     }

     public function deleteAction()
     {
		$arr= $this->getAlbumTable();
		//print_r($arr);exit; //mba ngerageza tu
		  $this->getAlbumTable()->deleteAlbum();
		
     }
	 
	 // module/Album/src/Album/Controller/AlbumController.php:
     public function getAlbumTable()
     {
         if (!$this->albumTable) {
             $sm = $this->getServiceLocator();
             $this->albumTable = $sm->get('Album\Model\AlbumTable');
         }
         return $this->albumTable;
     }
	 
 }
 ?>