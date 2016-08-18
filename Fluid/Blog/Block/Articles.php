<?php
namespace Fluid\Blog\Block;

class Articles extends \Magento\Framework\View\Element\Template
{
    protected $_articles;
    protected $_registry;
    protected $_categories;
    protected $_users;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Fluid\Blog\Model\ArticlesFactory $articles,
        \Fluid\Blog\Model\CategoriesFactory $categories,
        \Magento\Framework\Registry $registry,
        \Magento\User\Model\User $users,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_registry   = $registry;
        $this->_articles   = $articles;
        $this->_categories = $categories;
        $this->_users      = $users;
    }

    public function _prepareLayout()
    {
        $this->setMetaDetails();
        return parent::_prepareLayout();
    }

    public function setMetaDetails()
    {

        if ($this->getBlogArticleUrl()) {
            $articleDetails = $this->getArticle($this->getBlogArticleUrl());
            $this->pageConfig->getTitle()->set(__($articleDetails->getMetaTitle()));
            $this->pageConfig->setKeywords($articleDetails->getMetaKeywords());
            $this->pageConfig->setDescription($articleDetails->getMetaDescription());
        } elseif ($this->getBlogCategoryUrl()) {
            $categoryDetails = $this->getBlogCategoryFromUrl($this->getBlogCategoryUrl());
            $this->pageConfig->getTitle()->set(__($categoryDetails->getMetaTitle()));
            $this->pageConfig->setKeywords($categoryDetails->getMetaKeywords());
            $this->pageConfig->setDescription($categoryDetails->getMetaDescription());
        } else {
            $this->pageConfig->getTitle()->set(__('Blog'));
            $this->pageConfig->setKeywords('Blog');
            $this->pageConfig->setDescription('Blog');
        }
    }

    public function getLatestPosts($limit = null, $catId = null)
    {
        $blogArticlesModel = $this->_articles->create();

        $blogArticles = $blogArticlesModel->getCollection()
            ->addFieldToFilter('status', 1)
            ->setOrder('created_at', 'DESC')
            ->setPageSize($limit)
        ;

        if ($catId != null) {
            $blogArticles->addFieldToFilter('cat_id', $catId);
        }

        return $blogArticles;
    }

    public function getBlogCategoryUrl()
    {
        return $this->_registry->registry('blogCategory');
    }

    public function getBlogArticleUrl()
    {
        return $this->_registry->registry('blogArticle');
    }

    public function getBlogCategoryFromUrl($categoryUrl)
    {
        $blogCategoryModel = $this->_categories->create();
        $blogCategory        = $blogCategoryModel->getCollection()
            ->addFieldToFilter('url', $categoryUrl)
            ->getFirstItem();

        if ($blogCategory->getData()) {
            return $blogCategory;
        } else {
            return false;
        }

    }

    public function getArticleCategory($catId)
    {
        $blogCategoryModel = $this->_categories->create();
        $blogCategory      = $blogCategoryModel->getCollection()
            ->addFieldToFilter('id', $catId)
            ->getFirstItem();
        if ($blogCategory->getData()) {
            return $blogCategory;
        } else {
            return false;
        }
    }

    public function getArticle($articleUrl)
    {
        $blogArticlesModel = $this->_articles->create();

        $blogArticle = $blogArticlesModel->getCollection()
            ->addFieldToFilter('status', 1)
            ->addFieldToFilter('url', $articleUrl)
            ->getFirstItem()
        ;

        if ($blogArticle->getData()) {
            return $blogArticle;
        } else {
            return false;
        }
    }

    public function getAuthor($userId)
    {
        if ($user = $this->_users->load($userId)) {
            return $user->getFirstName() . ' ' . $user->getLastName();
        } else {
            return false;
        }
    }
}