<?php
namespace Photoalbum\Form;

 use Zend\Form\Form;

 class AddPhotoForm extends Form
 {
     public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('photoalbum');


         $this->add(array(
             'name' => 'id',
             'type' => 'Hidden',
         ));

         	 $this->add(array(
             'name' => 'imagetitle',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Image Title',
             ),
         ));
         	  $this->add(array(
             'name' => 'adress',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Place of Photo',
             ),
         ));
         	  $this->add(array(
             'type' => 'Zend\Form\Element\Select',
             'name' => 'photoalbum_choice',
             'options' => array(
                     'label' => 'Choose Album:',
                    
             )
     ));
			$this->add(array(
			'name' => 'fileupload',
			'attributes' => array(
			'type' => 'file',
			),
			'options' => array(
			'label' => 'Image Upload',
            
			),
		));
			$this->add(array(
             'name' => 'data_download',
             'type' => 'Hidden',
         ));
			$this->add(array(
			'name' => 'submit',
			'attributes' => array(
			'type' => 'submit',
			'value' => 'Add Photo',
			),
		));
		}
	}