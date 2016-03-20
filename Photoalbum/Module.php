<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Photoalbum;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Photoalbum\Model\Photoalbum;
use Photoalbum\Model\PhotoalbumTable;
use Photoalbum\Model\PhotoUpload;
use Photoalbum\Model\PhotoUploadTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable as DbTableAuthAdapter;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    public function getServiceConfig()
    {
        return array(
        'abstract_factories' => array(),
        'aliases' => array(),
        'factories' => array(
        // база данных
        'PhotoalbumTable' => function($sm) {
         $tableGateway = $sm->get('PhotoalbumTableGateway');
         $table = new PhotoalbumTable($tableGateway);
         return $table;
            },
        'PhotoUploadTable' => function($sm) {
         $tableGateway = $sm->get('PhotoUploadTableGateway');
         $table = new PhotoUploadTable($tableGateway);
         return $table;
            },
        'PhotoUploadTableGateway' => function ($sm) {
            $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
            $resultSetPrototype = new ResultSet();
            $resultSetPrototype->setArrayObjectPrototype(new PhotoUpload());
            return new TableGateway('photo_uploads', $dbAdapter, null,
        $resultSetPrototype);
         },
        'PhotoalbumTableGateway' => function ($sm) {
            $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
            $resultSetPrototype = new ResultSet();
            $resultSetPrototype->setArrayObjectPrototype(new Photoalbum());
            return new TableGateway('photoalbum', $dbAdapter, null,
        $resultSetPrototype);
         },
         'AuthService' => function($sm){
            $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
            $dbTableAuthAdapter = new DbTableAuthAdapter(
            $dbAdapter,'user','email','password', 'MD5(?)');
            $authService = new AuthenticationService();
            return $authService->setAdapter($dbTableAuthAdapter);

         },
    // Формы
    
        'PhotoalbumForm' => function ($sm) {
        $form = new \Photoalbum\Form\PhotoalbumForm();
        $form->setInputFilter($sm->get('PhotoalbumFilter'));
        return $form;
        },
         'AddPhotoForm' => function ($sm) {
        $form = new \Photoalbum\Form\AddPhotoForm();
        $form->setInputFilter($sm->get('AddPhotoFilter'));
        return $form;
        },
        // Фильтры
      
        'PhotoalbumFilter' => function ($sm) {
        return new \Photoalbum\Form\PhotoalbumFilter();
        },
        'AddPhotoFilter' => function ($sm) {
        return new \Photoalbum\Form\AddPhotoFilter();
        },
        ),
        'invokables' => array(),
        'services' => array(),
        'shared' => array(),
        );
    }
}
?>