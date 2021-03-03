<?php

namespace App\Http\Controllers;


use App\Anualidad;
use Illuminate\Support\Facades\Input;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use PayPal\Exception\PayPalConnectionException;


class PaypalController extends Controller
{
    private $_api_context;

    public function __construct() {

        $this->middleware('auth');
        $this->middleware('check.status.user');

        $paypal_conf = config('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }


    public function mi_cuenta_payWithPaypal($idUsuario,$idAnualidad) {

        $anualidad = Anualidad::find($idAnualidad);

        $descriptionTransaction = "PAGO ANUALIDAD SMACVE";

        $name           = "ANUALIDAD ".$anualidad->anualidad;
        $description    = "Pago Anualidad ".$anualidad->anualidad;
        $currency       = "MXN";
        $price          = $anualidad->costo;

        $nameComision           = "COMISIÓN PAYPAL";
        $descriptionComision    = "Costo de Comisión por pago Vía Paypal";
        $porcentajeComision     = 0.0458;
        $cargoComision          = round(($price * $porcentajeComision) / (1-$porcentajeComision),2) ;

        $total = $price + $cargoComision;

        /* CLIENTE Y METODO DE PAGO*/
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $items = array();

        $item = new Item();
        $item->setName($name);
        $item->setCurrency($currency);
        $item->setDescription($description);
        $item->setQuantity(1);
        $item->setPrice($price);

        $items[] = $item;


        $item_c = new Item();
        $item_c->setName($nameComision);
        $item_c->setCurrency($currency);
        $item_c->setDescription($descriptionComision);
        $item_c->setQuantity(1);
        $item_c->setPrice($cargoComision);

        $items[] = $item_c;

        $item_list = new ItemList();
        $item_list->setItems($items);

        /*
        $details = new Details();
        $details->setSubtotal($pedido->subtotal)
            ->setShipping($pedido->envio)
            ->setTax($pedido->iva);
        */

        $amount = new Amount();
        $amount->setCurrency($currency);
        $amount->setTotal($total);


        $transaction = new Transaction();
        $transaction->setAmount($amount);
        $transaction->setItemList($item_list);
        $transaction->setDescription($descriptionTransaction);


        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl( route('mi_cuenta_payment.status'));
        $redirect_urls->setCancelUrl(route('mi_cuenta_payment.status'));


        $payment = new Payment();
        $payment->setIntent('Sale');
        $payment->setPayer($payer);
        $payment->setRedirectUrls($redirect_urls);
        $payment->setTransactions(array($transaction));

        try
        {
            $payment->create($this->_api_context);
        }

        catch (PayPalConnectionException $e) {
            $msj    = $e->getMessage();

            return redirect('mi_cuenta/pago_paypal_no_aprobado_cancelado_error/exception/'.$msj);
        }

        $redirect_url = "";
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        session(['paypal_idUsuario' => $idUsuario,'paypal_idAnualidad' => $idAnualidad,'paypal_payment_id'=>$payment->getId()]);

        if(!empty($redirect_url))
        {
            return \redirect()->away($redirect_url);
        }
        else
        {
            $mjs = "Whoops!, lo sentimos no se pudo conectar con el servidor de Paypal";
            return redirect('mi_cuenta/pago_paypal_no_aprobado_cancelado_error/exception/'.$mjs);

        }
    }

    public function mi_cuenta_getPaymentStatus(){

        $payment_id     = Input::get('paymentId');
        $payerId        = Input::get('PayerID');
        $token          = Input::get('token');

        $idAnualidad    = session('paypal_idAnualidad');
        $idUsuario      = session('paypal_idUsuario');

        session()->forget('paypal_idAnualidad');
        session()->forget('paypal_idUsuario');
        session()->forget('paypal_payment_id');


        if(!empty($payerId) && !empty($token)){

            $payment = Payment::get($payment_id,$this->_api_context);

            $execution = new PaymentExecution();
            $execution->setPayerId($payerId);

            $result = $payment->execute($execution,$this->_api_context);

            if($result->getState() == 'approved'){

                return redirect('mi_cuenta/pago_paypal_aprobado/usuario/'.$idUsuario.'/anualidad/'.$idAnualidad);
            }
            else
            {
                $mjs="";
                return redirect('mi_cuenta/pago_paypal_no_aprobado_cancelado_error/no_approval/'.$mjs);
            }
        }
        else
        {
            $mjs="";
            return redirect('mi_cuenta/pago_paypal_no_aprobado_cancelado_error/cancel/'.$mjs);
        }



    }

}
