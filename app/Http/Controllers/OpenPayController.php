<?php

namespace App\Http\Controllers;

use App\Mail\SendAvisoPagoMail;
use App\MetodoPago;
use App\Notifications\PagoEjecutadoNotification;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Openpay;
use Exception;
use OpenpayApiError;
use OpenpayApiAuthError;
use OpenpayApiRequestError;
use OpenpayApiConnectionError;
use OpenpayApiTransactionError;
use Illuminate\Http\JsonResponse;

use App\Anualidad;
use App\Pago;

class OpenPayController extends Controller
{

    public function paymentForm($idAnualidad)
    {
        $usuario = Auth::user();
        return view('mi_cuenta.open_pay.form_payment',compact('usuario','idAnualidad'));
    }

    public function payment(Request $request,$idAnualidad)
    {

        $usuario = User::findOrFail(Auth::user()->idUsuario);

        $anualidad = Anualidad::find($idAnualidad);

        try {

            $openpay = Openpay::getInstance(env('OPENPAY_ID'), env('OPENPAY_SK'));

            Openpay::setProductionMode(env('OPENPAY_PRODUCTION_MODE'));

            $customer = array(
                'name' => $usuario->nombre,
                'last_name' => $usuario->apellidoPaterno.' '.$usuario->apellidoMaterno,
                'email' => $usuario->email
            );

            // create object charge
            $chargeRequest =  array(
                'method' => 'card',
                'source_id' => $request->inputTokenHidden,
                'amount' => 3600,
                'currency' => 'MXN',
                'description' => 'Pago anualidad 2021',
                'device_session_id' => $request->inputDeviceSessionIdHidden,
                'customer' => $customer
            );

            $charge = $openpay->charges->create($chargeRequest);

            //open pay
            $metodoPago = MetodoPago::findOrFail(2);

            $pay = Pago::create([
                'idUsuario'=>$usuario->idUsuario,
                'idAnualidad'=>$anualidad->idAnualidad,
                'idStatusPago'=>4,
                'monto'=>$anualidad->costo,
                'observaciones'=>'openpay, ID TRANSACCION: '.$charge->id,
                'comprobantePago'=>'sin-comprobante-pago.jpg',
                'idMetodoPago'=>$metodoPago->idMetodoPago
            ]);

            //enviar correo electronico
            $usuario->notify(new PagoEjecutadoNotification($usuario,$pay,$anualidad,$metodoPago));

            Mail::to(['danielalvarez@bht.mx','atencionalsocio@smacve.org.mx'])->send(new SendAvisoPagoMail($usuario,$pay,$anualidad,$metodoPago));

            return redirect('mi_cuenta/anualidades')->with('status_success', "Hemos recibido la notificación de tu pago, muchas gracias por contribuir con el beneficio de esta sociedad, por favor se paciente, en breve nos estaremos comunicando contigo, para confirmarte que tu pago ha sido aprobado.");

        } catch (OpenpayApiTransactionError $e) {
            return response()->json([
                'error' => [
                    'category' => $e->getCategory(),
                    'error_code' => $e->getErrorCode(),
                    'description' => $e->getMessage(),
                    'http_code' => $e->getHttpCode(),
                    'request_id' => $e->getRequestId()
                ]
            ]);
        }catch (OpenpayApiRequestError $e) {
            return response()->json([
                'error' => [
                    'category' => $e->getCategory(),
                    'error_code' => $e->getErrorCode(),
                    'description' => $e->getMessage(),
                    'http_code' => $e->getHttpCode(),
                    'request_id' => $e->getRequestId()
                ]
            ]);
        } catch (OpenpayApiConnectionError $e) {
            return response()->json([
                'error' => [
                    'category' => $e->getCategory(),
                    'error_code' => $e->getErrorCode(),
                    'description' => $e->getMessage(),
                    'http_code' => $e->getHttpCode(),
                    'request_id' => $e->getRequestId()
                ]
            ]);
        } catch (OpenpayApiAuthError $e) {
            return response()->json([
                'error' => [
                    'category' => $e->getCategory(),
                    'error_code' => $e->getErrorCode(),
                    'description' => $e->getMessage(),
                    'http_code' => $e->getHttpCode(),
                    'request_id' => $e->getRequestId()
                ]
            ]);
        } catch (OpenpayApiError $e) {
            return response()->json([
                'error' => [
                    'category' => $e->getCategory(),
                    'error_code' => $e->getErrorCode(),
                    'description' => $e->getMessage(),
                    'http_code' => $e->getHttpCode(),
                    'request_id' => $e->getRequestId()
                ]
            ]);
        } catch (Exception $e) {
            dd($e);
        }

    }

}
