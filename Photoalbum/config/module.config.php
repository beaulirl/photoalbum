<?php
 return array(
     'controllers' => array(
         'invokables' => array(
             'Photoalbum\Controller\Photoalbum' => 'Photoalbum\Controller\PhotoalbumController',
             
         ),
     ),


             'router' => array(
         'routes' => array(
             'photoalbum' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/photoalbum[/:action[/:id[/:subaction]]]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[a-zA-Z0-9_-]*',
                         'subaction' => '[a-zA-Z][a-zA-Z0-9_-]*',
                     ),
                     'defaults' => array(
                         'controller' => 'Photoalbum\Controller\Photoalbum',
                         'action'     => 'index',
                     ),
                 ),
           ),
        ),
     ),

 
              
     'view_manager' => array(
        'template_path_stack' => array(
                __DIR__ . '/../view',
             ),
        ),
     'module_config' => array(
            'upload_location' => __DIR__ . '/../../../data/images',
        ),
 );
?>