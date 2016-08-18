<?php
namespace Fluid\Blog\Block;

class Categories extends \Magento\Framework\View\Element\Template
{
    protected $_categories;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Fluid\Blog\Model\CategoriesFactory $categories,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_categories = $categories;
    }

    public function _prepareLayout()
    {
        return parent::_prepareLayout();
    }

    public function getBlogCategories()
    {
        $blogCategoriesModel = $this->_categories->create();

        $blogCategories = $blogCategoriesModel->getCollection();

        return $blogCategories;
    }
}