<?php

namespace Fluid\Blog\Model\Resource;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Categories extends AbstractDb {

    /**
     * define main table
     */

    protected function _construct()
    {
        $this->_init('fluid_blog_categories', 'id');
    }
}