<?php
/**
 * Created by PhpStorm.
 * User: luckys
 * Date: 10/5/16
 * Time: 11:46 AM
 */

namespace EventApp\Application\Services\Talk;


use Omnipay\Omnipay;

class PaymentTalkService extends TalkService
{

    public function execute($request = null, $id = null)
    {
        $product = $this->talk->find($id);
        $response = null;

        if($product->total_tickets == 0.00)
            abort(404);

        if($product->price > 0.00) {
            $response = $this->payment($product);
        }else {

            session(['name' => $request->fullname, 'email' => $request->email]);
            $product->update(['total_tickets' => $product->total_tickets - 1]);
            return true;
        }

        if ($response->isRedirect()) {
            $product->update(['total_tickets' => $product->total_tickets - 1]);
            $response->redirect();
        } else {
            throw new \Exception($response->getMessage());
        }
    }

    public function payment($product)
    {
        $order = [
            'event_id' => $product->id,
            'cancelUrl'     => 'http://localhost/events/cancel_order',
            'returnUrl'     => 'http://localhost/events/payment_success',
            'name'      => $product->title,
            'description'   => 'Compra de la charla '.$product->title,
            'amount'    => $product->price,
            'currency'  => 'EUR'
        ];

        session('sell', $order);

        $gateway = Omnipay::create('PayPal_Express');
        $gateway->setUsername(config('services.paypal.username'));
        $gateway->setPassword(config('services.paypal.password'));
        $gateway->setSignature(config('services.paypal.signature'));

        $gateway->setTestMode(true);

        return $gateway->purchase($order)->send();
    }
}