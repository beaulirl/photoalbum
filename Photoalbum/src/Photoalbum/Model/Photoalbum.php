<?php
namespace Photoalbum\Model;
class Photoalbum
{
public $id;
public $name;
public $describes;
public $ph_name;
public $email;
public $phone;
public $data_download;
public $data_change;
public $count;
public $cover;

function exchangeArray($data)
{
$this->id   = (isset($data['id'])) ? $data['id'] : null;
$this->name = (isset($data['name'])) ? $data['name'] : null;
$this->describes = (isset($data['describes'])) ? $data['describes'] : null;
$this->ph_name = (isset($data['ph_name'])) ? $data['ph_name'] : null;
$this->email = (isset($data['email'])) ? $data['email'] : null;
$this->phone = (isset($data['phone'])) ? $data['phone'] : null;
$this->data_download = (isset($data['data_download'])) ? $data['data_download'] : null;
$this->data_change = (isset($data['data_change'])) ? $data['data_change'] : null;
$this->count = (isset($data['count'])) ? $data['count'] : null;
$this->cover = (isset($data['cover'])) ? $data['cover'] : null;

}
 public function getArrayCopy()
     {
         return get_object_vars($this);
     }
}
