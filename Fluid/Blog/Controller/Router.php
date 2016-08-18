<?php
namespace Fluid\Blog\Controller;

/**
 * Fluid Blog router Controller Router
 *
 * @package Fluid\Blog\Controller
 */
class Router implements \Magento\Framework\App\RouterInterface
{
    /**
     * @var \Magento\Framework\App\ActionFactory
     */
    protected $actionFactory;

    /**
     * Response
     *
     * @var \Magento\Framework\App\ResponseInterface
     */
    protected $_response;

    /**
     * @param \Magento\Framework\App\ActionFactory $actionFactory
     * @param \Magento\Framework\App\ResponseInterface $response
     */
    public function __construct(
        \Magento\Framework\App\ActionFactory $actionFactory,
        \Magento\Framework\App\ResponseInterface $response
    ) {
        $this->actionFactory = $actionFactory;
        $this->_response = $response;
    }

    /**
     * Validate and Match
     *
     * @param \Magento\Framework\App\RequestInterface $request
     * @return bool
     */
    public function match(\Magento\Framework\App\RequestInterface $request)
    {
        /*
         * We will search “blog” and if article is found
         * will set front name to blog, controller path to index and action to article
         * if no article found and category is found
         * will set front name to blog, controller path to index and action to category
         * else
         * will set front name to blog, controller path to index and action to index
         */
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $identifier    = trim($request->getPathInfo(), '/');
        $urlParts      = explode('/', $identifier);

        if(strpos($identifier, 'blog') !== false && count($urlParts) == 1) {
            /* blog landing page */
            $request->setModuleName('blog')->setControllerName('index')->setActionName('index');//->setParam('page_id', 5);
        } elseif(strpos($identifier, 'blog') !== false && count($urlParts) == 2) {
            /* must be a category */

            $objectManager->get('Magento\Framework\Registry')->register('blogCategory', $urlParts[1]);
            $request->setModuleName('blog')->setControllerName('category')->setActionName('name');

        } elseif(strpos($identifier, 'blog') !== false && count($urlParts) >= 3 ) {
            /* must be an article */
            $objectManager->get('Magento\Framework\Registry')->register('blogCategory', $urlParts[1]);
            $objectManager->get('Magento\Framework\Registry')->register('blogArticle', $urlParts[2]);
           $request->setModuleName('blog')->setControllerName('article')->setActionName('view');//->setParam('page_id', 5);
        } else {
            //There is no match
            return;
        }

        /*
         * We have match and now we will forward action
         */
        return $this->actionFactory->create(
            'Magento\Framework\App\Action\Forward',
            ['request' => $request]
        );
    }
}