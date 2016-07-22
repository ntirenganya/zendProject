<?php
namespace Blog;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;//igufasha gukoresha getAutoloaderConfig()
use Zend\ModuleManager\Feature\ConfigProviderInterface;//igufasha gukoresha getConfig()

class Module implements AutoloaderProviderInterface,ConfigProviderInterface
{
	
	/**
      * Return an array for passing to Zend\Loader\AutoloaderFactory.
      *
      * @return array
      */
     public function getAutoloaderConfig()
     {
         return array(
             'Zend\Loader\StandardAutoloader' => array(
                 'namespaces' => array(
                     // Autoload all classes from namespace 'Blog' from '/module/Blog/src/Blog'
                     __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                 )
             )
         );
     }

	public function getConfig()
	{
		return include __DIR__ . '/config/module.config.php';
	}
}