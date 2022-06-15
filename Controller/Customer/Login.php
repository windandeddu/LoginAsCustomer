<?php

namespace WindAndeddu\LoginAsCustomer\Controller\Customer;

class Login extends \WindAndeddu\CheckoutCom\Controller\Card\AbstractCard
{

    public function execute()
    {
        return $this->_redirectToPwa('customer/account/');
    }
//
//    protected function _isAllowed()
//    {
//        return $this->_authorization->isAllowed('WindAndeddu_InstaShop::edit');
//    }
}
