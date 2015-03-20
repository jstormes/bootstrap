<?php
namespace JStormes\Bootstrap;

use Zend\Log\Filter\Priority;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Log\Logger as ZendLogger;

class Module
{
    /**
     * @param MvcEvent $e
     */
    public function onBootstrap(MvcEvent $e)
    {
        // You may not need to do this if you're doing it elsewhere in your
        // application
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        
        $application = $e->getApplication();
        $config = $application->getConfig();
        
        if (array_key_exists('jstormes',$config)) {
                if (isset($config['jstormes']['bootstrap']['menu']['enabled'])) {
                    
                // get navigation plugin from service manager
                $viewManager = $application->getServiceManager()->get('viewmanager');
                $navigation = $viewManager->getRenderer()->plugin('navigation');
                
                // overwrite default menu plugin
                $navigation->getPluginManager()->setInvokableClass(
                    'menu', 'JStormes\Bootstrap\View\Helper\Navigation\Menu', true
                );
            }
        }
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src',
                ),
            ),
        );
    }

}
