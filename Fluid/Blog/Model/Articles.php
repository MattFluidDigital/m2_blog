<?php

namespace Fluid\Blog\Model;

use Magento\Framework\Model\AbstractModel;

class Articles extends AbstractModel
{
    /**
     * define resource model
     */

    protected function _construct()
    {
        $this->_init('Fluid\Blog\Model\Resource\Articles');
    }
}