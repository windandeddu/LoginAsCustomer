<?php

namespace WindAndeddu\LoginAsCustomer\Ui\Component\Listing\Column;


use \Magento\Sales\Api\OrderRepositoryInterface;
use \Magento\Framework\View\Element\UiComponent\ContextInterface;
use \Magento\Framework\View\Element\UiComponentFactory;
use \Magento\Ui\Component\Listing\Columns\Column;

class LoginAsCustomer extends \Magento\Ui\Component\Listing\Columns\Column
{

    /**
     * @var \Magento\Sales\Api\OrderRepositoryInterface
     */
    protected $_orderRepository;

    /**
     * @var \Magento\Framework\UrlInterface
     */
    protected $_urlBuilder;
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;
    protected $_context;

    public function __construct
    (
        \Magento\Framework\View\Element\UiComponent\ContextInterface $context,
        \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory,
        \Magento\Sales\Api\OrderRepositoryInterface $orderRepository,
        \Magento\Framework\UrlInterface $urlBuilder,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $components = [],
        array $data = []
    )
    {
        $this->_storeManager = $storeManager;
        $this->_urlBuilder = $urlBuilder;
        $this->_orderRepository = $orderRepository;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $item[$this->getData('name')]['login_as_customer'] = [
                    'href' => $this->_urlBuilder->getUrl('loginascustomer/customer/login', [
                        '_type' => \Magento\Framework\UrlInterface::URL_TYPE_FRONTEND_WEB,
                        '_scope' => $this->_storeManager->getStore()->getId()
                    ]),
                    'label' => __('Login As Customer'),
                    'hidden' => false,
                    '__disableTmpl' => true,
                    'target' => '_blank'
                ];
            }
        }
        return $dataSource;
    }
}
