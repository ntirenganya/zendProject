<?php
// Filename: /module/Blog/config/module.config.php

return array(
	//default settings ziri muri /config/autoload/global.php. Usabwe either comment it cyangwa se use same settings
	 'db' => array(
			 'driver'         => 'Pdo',
			 'username'       => 'root',  //edit this
			 'password'       => '',  //edit this
			 'dsn'            => 'mysql:dbname=blog;host=localhost',
			 'driver_options' => array(
				 \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
			 )
	 ),
	 
	 //default settings ziri muri /config/autoload/global.php. Usabwe either comment it cyangwa se use same settings
	  'service_manager' => array(
         'factories' => array(
			 'Blog\Mapper\PostMapperInterface'   => 'Blog\Factory\ZendDbSqlMapperFactory',
             'Blog\Service\PostServiceInterface' => 'Blog\Factory\PostServiceFactory',
			 'Zend\Db\Adapter\Adapter'           => 'Zend\Db\Adapter\AdapterServiceFactory'
         )
     ),
	 'view_manager' => array(
         'template_path_stack' => array(
             'blog' => __DIR__ . '/../view',
         ),
     ),
	 'controllers' => array(
		'factories' => array(
			'Blog\Controller\List' => 'Blog\Factory\ListControllerFactory',
         ),
     ),
	 
	// This lines opens the configuration for the RouteManager
     'router' => array(
         // Open configuration for all possible routes
         'routes' => array(
             // Define a new route called "post"
             'post' => array(
                 // Define the routes type to be "Zend\Mvc\Router\Http\Literal", which is basically just a string
                 'type' => 'literal',
                 // Configure the route itself
                 'options' => array(
                     // Listen to "/blog" as uri
                     'route'    => '/blog',
                     // Define default controller and action to be called when this route is matched
                     'defaults' => array(
                         'controller' => 'Blog\Controller\List',
                         'action'     => 'index',
                     ),
                 ),
             ),
         ),
     ),
);
 
 ?>