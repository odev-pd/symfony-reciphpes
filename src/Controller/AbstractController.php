<?php


namespace App\Controller;


use App\Document\Registry;
use Doctrine\ODM\MongoDB\DocumentManager;

abstract class AbstractController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    public static function getSubscribedServices() {
        return parent::getSubscribedServices() + [
                'doctrine_mongodb.odm.document_manager' => 'Doctrine\ODM\MongoDB\DocumentManager',
                'router' => 'Symfony\Component\Routing\Generator\UrlGeneratorInterface',
                'session' => 'Symfony\Component\HttpFoundation\Session\Session',
                'document_registry' => 'App\Document\Registry'
            ];
    }

    /**
     * @return DocumentManager
     */
    protected function getDocumentManager() {
        return $this->get('doctrine_mongodb.odm.document_manager');
    }

    /**
     * @return Registry
     */
    protected function getDocumentRegistry() {
        return $this->get('document_registry');
    }
}
