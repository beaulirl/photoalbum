<?php
namespace Photoalbum\Form;
use Zend\InputFilter\InputFilter;
use Zend\Validators\File\Image;
class AddPhotoFilter extends InputFilter
{
public function __construct()
{
	$this->add(array(
'name' => 'imagetitle',
'required' => true,
'filters' => array(
array(
'name' => 'StripTags',
),
),
'validators' => array(
array(
'name' => 'StringLength',
'options' => array(
'encoding' => 'UTF-8',
'min' => 2,
'max' => 50,
),
),
),
));
	$this->add(array(
'name' => 'adress',
'required' => true,
'filters' => array(
array(
'name' => 'StripTags',
),
),
'validators' => array(
array(
'name' => 'StringLength',
'options' => array(
'encoding' => 'UTF-8',
'min' => 2,
'max' => 200,
),
),
),
));
	
}
}