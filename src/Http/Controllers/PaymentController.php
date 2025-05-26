<?php

namespace TrodevIT\Trodevpay\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Controller;
use TrodevIT\Trodevpay\Helpers\BkashClinet;

class PaymentController extends Controller
{
    public function grantToken()
    {
        $bkash = new BkashClinet();
        $response = $bkash->getToken();

        return Response::json($response);
    }
}
