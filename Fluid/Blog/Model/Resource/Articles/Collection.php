<?php

namespace Fluid\Blog\Model\Resource\Articles;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;


class Collection extends AbstractCollection
{
    /**
     * define module and resource model
     */

    protected function _construct()
    {
        $this->_init('Fluid\Blog\Model\Articles', 'Fluid\Blog\Model\Resource\Articles');
    }
}