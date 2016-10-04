<?php
/**
 * Created by PhpStorm.
 * User: luckys
 * Date: 10/4/16
 * Time: 12:13 PM
 */

namespace EventApp\Application\Services\Event;

use Omnipay\Omnipay;

class PaymentEventService extends EventService
{

    public function execute($request = null, $id = null)
    {
        $product = $this->event->find($id);

        $order = [
            'cancelUrl'     => 'http://localhost/events/cancel_order',
            'returnUrl'     => 'http://localhost/events/payment_success',
            'name'      => $product->name,
            'description'   => 'Compra del evento '.$product->name,
            'amount'    => $product->price,
            'currency'  => 'EUR'
        ];
        
        //session('sell', $order);

        $gateway = Omnipay::create('PayPal_Express');
        $gateway->setUsername(config('services.paypal.username'));
        $gateway->setPassword(config('services.paypal.password'));
        $gateway->setSignature(config('services.paypal.signature'));

        $gateway->setTestMode(true);

        $response = $gateway->purchase($order)->send();

        if ($response->isRedirect()) {
            $response->redirect();
        } else {
            throw new \Exception($response->getMessage());
        }
    }
}