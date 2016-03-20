<?php
namespace Photoalbum\Form;
use Zend\InputFilter\InputFilter;
class PhotoalbumFilter extends InputFilter
{
public function __construct()
{
	$this->add(array(
'name' => 'name',
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
'name' => 'describes',
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
	$this->add(array(
'name' => 'ph_name',
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
'name' => 'email',
'validators' => array(
array(
'name' => 'EmailAddress',
'options' => array(
'domain' => true,
),
),
),
));
	$this->add(array(
'name' => 'phone',
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
'min' => 10,
'max' => 50,
),
),
),
));
}
}