<?php
namespace Photoalbum\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Photoalbum\Model\Photoalbum;
use Photoalbum\Model\PhotoalbumTable;
use Photoalbum\Model\PhotoUpload;
use Photoalbum\Model\PhotoUploadTable;
use Zend\Db\ResultSet\ResultSet;



class PhotoalbumController extends AbstractActionController
{
public function indexAction()
{
	$PhotoalbumTable = $this->getServiceLocator()->get('PhotoalbumTable');
	$PhotoUploadTable = $this->getServiceLocator()->get('PhotoUploadTable');
	$viewModel = new ViewModel(array(
	'photoalbums' => $PhotoalbumTable->fetchAll(),
	'photouploads' => $PhotoUploadTable->fetchAll()));
	return $viewModel;
}
public function addAction()
{
	$form = $this->getServiceLocator()->get('PhotoalbumForm');
	$PhotoalbumTable = $this->getServiceLocator()->get('PhotoalbumTable');
	$viewModel = new ViewModel(array(
		'form' => $form,
		'photoalbums' => $PhotoalbumTable->fetchAll(),
	));
	return $viewModel;	
}
public function addphotoAction()
{
	$form = $this->getServiceLocator()->get('AddPhotoForm');
	$PhotoalbumTable = $this->getServiceLocator()->get('PhotoalbumTable');
	$viewModel = new ViewModel(array(
		'form' => $form,
		'photoalbums' => $PhotoalbumTable->fetchAll()));
	
	return $viewModel;	
}
public function addphotosAction()
{
	$form = $this->getServiceLocator()->get('AddPhotoForm');

	$viewModel = new ViewModel(array(
		'form' => $form,
		'photoalbum_id' => $this->params()->fromRoute('id')
	));
	return $viewModel;	
}

public function addphotosprocessAction()
{
	$uploadFile = $this->params()->fromFiles('fileupload');
	$form = $this->getServiceLocator()->get('AddPhotoForm');
	$form->setData($this->request->getPost());
	$PhotoalbumTable = $this->getServiceLocator()->get('PhotoalbumTable');


// Получение конфигурации из конфигурационных данных модуля
		$uploadPath = $this->getFileUploadLocation();
// Сохранение выгруженного файла
		$adapter = new \Zend\File\Transfer\Adapter\Http();
		$adapter->setDestination($uploadPath);

			if ($adapter->receive($uploadFile['name'])){
// Успешная выгрузка файла
				$exchange_data = array();
				$exchange_data['title'] = $this->request->getPost()->get('imagetitle');
				$exchange_data['filename'] = $this->generateThumbnail($uploadFile['name']);
				$exchange_data['adress'] = $this->request->getPost()->get('adress');
				$exchange_data['photoalbum_id'] = $this->params()->fromRoute('id');
				$exchange_data['data_download'] = $this->request->getPost()->get('data_download');
				$photoupload = new PhotoUpload();
				$photoupload->exchangeArray($exchange_data);
				$photouploadTable = $this->getServiceLocator()->get('PhotoUploadTable');
				$photouploadTable->savePhotoUpload($photoupload);
 	 $photoalbum = $PhotoalbumTable->getPhotoalbum($this->params()->fromRoute('id'));
	 $albArray = (array)$photoalbum;
	 $albArray['count'] = $albArray['count'] + 1;
	 $albArray['data_change'] = date("Y-m-d H:i:s");
	 $albArray['cover'] = $exchange_data['filename'];
	 $photoalbum->exchangeArray($albArray);
	 $PhotoalbumTable->savePhotoalbum($photoalbum);	
			}
  		return $this->redirect()->toRoute('photoalbum');

}
public function addphotoprocessAction()
{
	$uploadFile = $this->params()->fromFiles('fileupload');
	$PhotoalbumTable = $this->getServiceLocator()->get('PhotoalbumTable');
	$form = $this->getServiceLocator()->get('AddPhotoForm');
	$form->setData($this->request->getPost());
	//$thumbnailFileName = $this->generateThumbnail($uploadFile['name']);
	$albumName = $this->request->getPost()->get('photoalbum_choice');
	$albumId = $albumName + 1;
	$uploadPath = $this->getFileUploadLocation();
	$adapter = new \Zend\File\Transfer\Adapter\Http();
	$adapter->setDestination($uploadPath);
	if ($adapter->receive($uploadFile['name'])){
				$exchange_data = array();
				$exchange_data['title'] = $this->request->getPost()->get('imagetitle');
				$exchange_data['filename'] = $this->generateThumbnail($uploadFile['name']);
				$exchange_data['adress'] = $this->request->getPost()->get('adress');
				$exchange_data['photoalbum_id'] = $albumId;
				$exchange_data['data_download'] = $this->request->getPost()->get('data_download');
				$photoupload = new PhotoUpload();
				$photoupload->exchangeArray($exchange_data);
				$photouploadTable = $this->getServiceLocator()->get('PhotoUploadTable');
				$photouploadTable->savePhotoUpload($photoupload);
	 $photoalbum = $PhotoalbumTable->getPhotoalbum($albumId);
	 $albArray = (array)$photoalbum;
	 $albArray['count'] = $albArray['count'] + 1;
	 $albArray['data_change'] = date("Y-m-d H:i:s");
	 $albArray['cover'] = $exchange_data['filename'];
	 $photoalbum->exchangeArray($albArray);
	 $PhotoalbumTable->savePhotoalbum($photoalbum);		
	}
  return $this->redirect()->toRoute('photoalbum');

}
public function generateThumbnail($imageFileName)
{
	$path = $this->getFileUploadLocation();
	$sourceImageFileName = $path . '/' . $imageFileName;
	$thumbnailFileName = 'tn_' . $imageFileName;
	$imageThumb = $this->getServiceLocator()->get('WebinoImageThumb');
	$thumb = $imageThumb->create($sourceImageFileName,
	$options = array());
	$thumb->resize(250, 250);
	$thumb->save($path . '/' . $thumbnailFileName);
	return $thumbnailFileName;
}
public function getFileUploadLocation()
{
// Получение конфигурации из конфигурационных данных модуля
$config = $this->getServiceLocator()->get('config');
return $config['module_config']['upload_location'];
}

public function addprocessAction()
{
if (!$this->request->isPost()) {
return $this->redirect()->toRoute(NULL ,
array( 'controller' => 'Photoalbum',
'action' => 'index'
));
}
$post = $this->request->getPost();
$form = $this->getServiceLocator()->get('PhotoalbumForm');
$form->setData($post);
if (!$form->isValid()) {
$model = new ViewModel(array(
'error' => true,
'form' => $form,
));
$model->setTemplate('photoalbum/photoalbum/add');
return $model;
}
$data = array();
$data['name'] = $this->request->getPost()->get('name');
$data['describes'] = $this->request->getPost()->get('describes');
$data['ph_name'] = $this->request->getPost()->get('ph_name');
$data['email'] = $this->request->getPost()->get('email');
$data['data_download'] = $this->request->getPost()->get('data_download');
$data['data_change'] = $this->request->getPost()->get('data_change');
$data['data_change'] = $this->request->getPost()->get('data_change');
$data['count'] = $this->request->getPost()->get('count');
$data['cover'] = $this->request->getPost()->get('cover');
$this->createPhotoalbum($form->getData());
return $this->redirect()->toRoute(NULL , array(
'controller' => 'Photoalbum',
'action' => 'index'
));
}
protected function createPhotoalbum(array $data)
{

$photoalbum = new Photoalbum();
$photoalbum->exchangeArray($data);
$PhotoalbumTable = $this->getServiceLocator()->get('PhotoalbumTable');
$PhotoalbumTable->savePhotoalbum($photoalbum);
return true;

}
public function editAction()
{
	$PhotoalbumTable = $this->getServiceLocator()->get('PhotoalbumTable');
	$photoalbum = $PhotoalbumTable->getPhotoalbum($this->params()->fromRoute('id'));
	$form = $this->getServiceLocator()->get('PhotoalbumForm');
	$form->bind($photoalbum);
	$viewModel = new ViewModel(array(
		'form' => $form,
	'photoalbum_id' => $this->params()->fromRoute('id'),
	'photoalbum' => $PhotoalbumTable->getPhotoalbum($this->params()->fromRoute('id')),
	));
	return $viewModel;
}
public function processAction()
{
	
	$post = $this->request->getPost();
	$PhotoalbumTable = $this->getServiceLocator()->get('PhotoalbumTable');
// Загрузка сущности User
	$photoalbum = $PhotoalbumTable->getPhotoalbum($this->params()->fromRoute('id'));
	$photoalbum->exchangeArray($post);
// Сохранение пользователя
	$this->getServiceLocator()->get('PhotoalbumTable')->savePhotoalbum($photoalbum);
	return $this->redirect()->toRoute(NULL , array(
	'controller' => 'Photoalbum',
	'action' => 'index'
	));
	
}

public function showImageAction()
{
	$uploadId = $this->params()->fromRoute('id');
	$uploadTable = $this->getServiceLocator()->get('PhotoUploadTable');
	$upload = $uploadTable->getPhotoUpload($uploadId);
// Выборка конфигурации из модуля
	$uploadPath = $this->getFileUploadLocation();
	if ($this->params()->fromRoute('subaction') == 'thumb')
		{
			$filename = $uploadPath ."/" . $upload->thumbnail;
		} else {
			$filename = $uploadPath ."/" . $upload->filename;
			}
	$file = file_get_contents($filename);
// Прямой возврат ответа
	$response = $this->getEvent()->getResponse();
	$response->getHeaders()->addHeaders(array(
		'Content-Type' => 'application/octet-stream',
		'Content-Disposition' => 'attachment;filename="'.$upload->filename . '"',));
	$response->setContent($file);
	return $response;
}
public function showCoverAction()
{
	$albumId = $this->params()->fromRoute('id');
	$PhotoalbumTable = $this->getServiceLocator()->get('PhotoalbumTable');
	$photoalbum = $PhotoalbumTable->getPhotoalbum($albumId);
	$uploadPath = $this->getFileUploadLocation();
	$filename = $uploadPath ."/" . $photoalbum->cover;
	$file = file_get_contents($filename);
	$response = $this->getEvent()->getResponse();
	$response->getHeaders()->addHeaders(array(
		'Content-Type' => 'application/octet-stream',
		'Content-Disposition' => 'attachment;filename="'.$photoalbum->cover . '"',));
	$response->setContent($file);
	return $response;
}
public function mediaAction()
{
	$PhotoUploadTable = $this->getServiceLocator()->get('PhotoUploadTable');
	$photoalbumId = $this->params()->fromRoute('id');
	if(isset($photoalbumId)){
		$viewModel = new ViewModel(array(
	'photouploads' => $PhotoUploadTable->getPhotoByAlbum($photoalbumId)));
	return $viewModel;
	}
	else {
	$viewModel = new ViewModel(array(
	'photouploads' => $PhotoUploadTable->fetchAll()));
	return $viewModel;
	}
}

public function deleteAction()
{
     $this->getServiceLocator()->get('PhotoalbumTable')->deletePhotoalbum($this->params()->fromRoute('id'));
     return $this->redirect()->toRoute('photoalbum');           			
}
public function deletephotoAction()
{
     $this->getServiceLocator()->get('PhotoUploadTable')->deletePhotoUpload($this->params()->fromRoute('id'));
     return $this->redirect()->toRoute('photoalbum');           			
}



}