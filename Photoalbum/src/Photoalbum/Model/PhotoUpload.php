<?php
namespace Photoalbum\Model;
class PhotoUpload
{
public $id;
public $title;
public $filename;
public $adress;
public $photoalbum_id;
public $data_download;

function exchangeArray($data)
{
$this->id   = (isset($data['id'])) ? $data['id'] : null;
$this->title = (isset($data['title'])) ? $data['title'] : null;
$this->filename = (isset($data['filename'])) ? $data['filename'] : null;
$this->adress = (isset($data['adress'])) ? $data['adress'] : null;
$this->photoalbum_id = (isset($data['photoalbum_id'])) ? $data['photoalbum_id'] : null;
$this->data_download = (isset($data['data_download'])) ? $data['data_download'] : null;
}
 public function getArrayCopy()
     {
         return get_object_vars($this);
     }
}
