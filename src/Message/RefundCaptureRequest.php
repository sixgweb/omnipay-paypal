<?php

/**
 * PayPal REST Refund Captured Payment Request
 */

namespace Omnipay\PayPal\Message;

/**
 * PayPal REST Refund Captured Payment Request
 *
 * Use this call to refund a captured payment.
 *
 * @link https://developer.paypal.com/docs/api/#refund-a-captured-payment
 * @see RestAuthorizeRequest
 * @see RestCaptureRequest
 */
class RefundCaptureRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('transactionReference');

        return array(
            'amount' => array(
                'currency_code' => $this->getCurrency(),
                'value' => $this->getAmount(),
            ),
            'note_to_payer' => $this->getDescription(),
        );
    }

    public function getEndpoint()
    {
        return parent::getEndpoint() . '/payments/captures/' . $this->getTransactionReference() . '/refund';
    }
}
