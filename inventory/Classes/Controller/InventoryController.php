<?php
namespace MyVendor\Inventory\Controller;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use MyVendor\Inventory\Domain\Repository\ProductRepository;


class InventoryController extends ActionController {

    public function listAction() {
        $productRepository = GeneralUtility::makeInstance(ProductRepository::class, $this->objectManager);
        $persistence = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager');
        $productRepository->injectPersistenceManager($persistence);
        $products = $productRepository->findAll();
        $this->view->assign('products', $products);
    }
}