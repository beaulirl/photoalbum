<?php
namespace Photoalbum\Model;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Sql\Select;
class PhotoalbumTable
{
protected $tableGateway;
public function __construct(TableGateway $tableGateway)
{
$this->tableGateway = $tableGateway;
}
public function savePhotoalbum(Photoalbum $photoalbum)
  {  $data = array(
            'describes' => $photoalbum->describes,
            'email' => $photoalbum->email,
            'name' => $photoalbum->name,
            'ph_name' => $photoalbum->ph_name,
            'phone' => $photoalbum->phone,
            'data_download' => $photoalbum->data_download,
            'data_change' => $photoalbum->data_change,
            'count' => $photoalbum->count,
            'cover' => $photoalbum->cover,
            );
     $id = (int)$photoalbum->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
        if ($this->getPhotoalbum($id)) {
            $this->tableGateway->update($data, array('id' => $id));
            } else {
        throw new \Exception('User ID does not exist');
    }
}
}

public function fetchAll()
{
$resultSet = $this->tableGateway->select();
return $resultSet;
}
public function getPhotoalbum($id)
{
$id = (int) $id;
$rowset = $this->tableGateway->select(array('id' => $id));
$row = $rowset->current();
if (!$row) {
throw new \Exception("Could not find row $id");
}
return $row;
}
public function getAlbumIdByName($name)
{
$rowset = $this->tableGateway->select(array('name' => $name));
$rowsetArray = $rowset->toArray();
return $rowsetArray;
}

public function deletePhotoalbum($id)
{
$this->tableGateway->delete(array('id' => $id));
}

}