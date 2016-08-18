<?php

namespace Fluid\Blog\Block\Adminhtml;

use Magento\Backend\Block\Widget\Grid\Container;

class Categories extends Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_categories';
        $this->_blockGroup = 'Fliud_Blog';
        $this->_headerText = __('Manage Blog Categories');
        $this->_addButtonLabel = __('Add Blog Category');
        parent::_construct();
    }
}