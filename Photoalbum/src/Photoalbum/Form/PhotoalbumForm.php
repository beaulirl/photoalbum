<?php
namespace Photoalbum\Form;

 use Zend\Form\Form;

 class PhotoalbumForm extends Form
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
             'name' => 'name',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Title',
             ),
         ));
            $this->add(array(
             'name' => 'describes',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Describe',
             ),
         ));
         $this->add(array(
             'name' => 'ph_name',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Photographer',
             ),
         ));
           $this->add(array(
             'name' => 'email',
             'type' => 'email',
             'options' => array(
                 'label' => 'Email',
             ),
         ));
              $this->add(array(
             'name' => 'phone',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Phone
                 Format: +7(xxx)xxx-xx-xx
                 ',
             ),
             'attributes'=>array(
                    'pattern'=>'^[+][7-9][(][0-9]{3}[)][0-9]{3}[-][0-9]{2}[-][0-9]{2}$',
                ),
         ));
         $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                 'value' => 'Add',
                 'id' => 'submitbutton',
             ),
         ));
         $this->add(array(
             'name' => 'data_download',
             'type' => 'Hidden',
         ));
          $this->add(array(
             'name' => 'data_change',
             'type' => 'Hidden',
         ));
         $this->add(array(
             'name' => 'count',
             'type' => 'Hidden',
         ));
             $this->add(array(
             'name' => 'cover',
             'type' => 'Hidden',
         ));
     }
 }
?>