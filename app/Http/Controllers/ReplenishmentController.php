<?php

namespace App\Http\Controllers;

class ReplenishmentController extends Controller
{

	public function index()
	{
		 return view('payment.paymentSistem');
	}

	public function setPayment($pms){

		if($pms == 'paypal'){
			return view('payment.paypal.PayPalForm');
		}

		if($pms == 'yarcode'){
			return "456";
		}

		else {
			return "not ready";
		}
	}




}
