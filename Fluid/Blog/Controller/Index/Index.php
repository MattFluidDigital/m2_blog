<?php
namespace Fluid\Blog\Controller\Index;


class Index extends \Magento\Framework\App\Action\Action {
    /** @var  \Magento\Framework\View\Result\Page */
    protected $resultPageFactory;
//    protected $request;
    /**      * @param \Magento\Framework\App\Action\Context $context      */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
//        \Magento\Framework\App\RequestInterface $request
    ) {
        $this->resultPageFactory = $resultPageFactory;
//        $this->request = $request;
        parent::__construct($context);
    }

    /**
     *
     * @return \Magento\Framework\View\Result\PageFactory
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }

}

//use Magento\Framework\App\Action\Action;
//use Magento\Framework\App\Action\Context;
//use Magento\Framework\View\Result\PageFactory;
//use Fluid\Blog\Model\CategoriesFactory;
//
//class Index extends Action {
//
//    /** @var \Fluid\Blog\Model\CategoriesFactory */
//    protected $_modelCategoriesFactory;
//
//    /** @var  \Magento\Framework\View\Result\Page */
//    protected $resultPageFactory;
//
//    /** @var  @var Magento\Framework\View\Result\PageFactory */
//    protected $context;
//
//
//    /**
//     * @param Context $context
//     * @param CategoriesFactory $modelCategoriesFactory
//     */
//
//    /*public function __construct(Context $context, CategoriesFactory $modelCategoriesFactory, PageFactory $resultPageFactory)
//    {
//        $this->resultPageFactory = $resultPageFactory;
//        $this->_modelCategoriesFactory = $modelCategoriesFactory;
//        parent::__construct($context);
//    }*/
//
//
//    public function __construct(
//        \Magento\Framework\App\Action\Context $context,
//        \Magento\Framework\View\Result\PageFactory $resultPageFactory
//    ) {
//        $this->resultPageFactory = $resultPageFactory;
//        parent::__construct($context);
//    }
//
//    public function execute()
//    {
//        /**
//         * When Magento gets your model, it will generate a Factory class
//         * for your model at var/generaton folder and we can get your
//         * model by this way
//         */
//
//        /*echo 'test';
//
//        $blogCategoriesModel = $this->_modelCategoriesFactory->create();
//
//
//        $cat = $blogCategoriesModel->load(1);
//        var_dump($cat->getData());
//
//        // Get blog categories collection
//        $blogCategories = $blogCategoriesModel->getCollection();
//        var_dump($blogCategories->getData());
//        /*
//        // Load all data of collection
//        foreach ($blogCategories as $blogCategory) {
//            var_dump($blogCategory->getData());
//        }*/
//
//        $resultPage = $this->resultPageFactory->create();
//        $resultPage->getConfig()->getTitle()->prepend(__('Blog'));
//        return $resultPage;
//
//    }
//}