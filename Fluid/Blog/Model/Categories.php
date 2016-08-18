<?php

namespace Fluid\Blog\Model;

use Magento\Framework\Model\AbstractModel;

class Categories extends AbstractModel
{

    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;


    /**
     * define resource model
     */

    protected function _construct()
    {
        $this->_init('Fluid\Blog\Model\Resource\Categories');
    }

    public function getAvailableStatuses()
    {
        return [self::STATUS_ENABLED => __('Enabled'), self::STATUS_DISABLED => __('Disabled')];
    }
}