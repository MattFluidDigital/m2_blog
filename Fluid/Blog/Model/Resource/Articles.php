<?php

namespace Fluid\Blog\Model\Resource;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Articles extends AbstractDb {

    /**
     * define main table
     */

    protected function _construct()
    {
        $this->_init('fluid_blog_articles', 'id');
    }
}