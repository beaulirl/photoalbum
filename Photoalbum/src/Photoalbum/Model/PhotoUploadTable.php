<?php
namespace Photoalbum\Model;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Sql\Select;
class PhotoUploadTable
{
protected $tableGateway;
public function __construct(TableGateway $tableGateway)
{
$this->tableGateway = $tableGateway;
}
public function savePhotoUpload(PhotoUpload $photoupload)
  {  $data = array(
            'title' => $photoupload->title,
            'filename' => $photoupload->filename,
            'adress' => $photoupload->adress,
            'photoalbum_id' => $photoupload->photoalbum_id,
            'data_download' => $photoupload->data_download,
            );
     $id = (int)$photoupload->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
        if ($this->getPhotoUpload($id)) {
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
public function getPhotoUpload($id)
{
$id = (int) $id;
$rowset = $this->tableGateway->select(array('id' => $id));
$row = $rowset->current();
if (!$row) {
throw new \Exception("Could not find row $id");
}
return $row;
}
public function getPhotoByAlbum($albumId)
{
$rowset = $this->tableGateway->select(array('photoalbum_id' => $albumId));
//$row = $rowset->current();

return $rowset;
}

public function deletePhotoUpload($id)
{
$this->tableGateway->delete(array('id' => $id));
}

}