@extends('layouts.app')

@section('content')

  <div id="primery_window">
  <div class="for_position_top_line"></div>
  <div class="primery_windon_welc">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-12" style="min-height: 800px">
			<form action="" method="">  

        <!-- {{ url('payment/???')}} for action pay route --> 

    <p><strong>Вибрати платыжну систему </strong><br/></p>
    {{ csrf_field() }}
    <select onchange="" name="pms" required>   <!--onchange="window.location.href='/payment/' + this.value;" -->
      <option ></option>
      <option value="paypal">paypal</option>
      <option value="yarcode">yarcode</option>
      <option value="solid_trust_pay">solid trust pay</option>
      <option value="grandmasterx/neteller">grandmasterx/neteller</option>
      <option value="omnipay_skrill">omnipay skrill</option>
      <option value="yii_dream_team/payeer">yii dream team/payeer</option>
      <option value="epayment">epayment</option>
      <option value="qiwi">qiwi</option>
    </select>
 
      </div>

      <div class="col-lg-4 col-md-4 col-sm-12 ">
        @include('layouts.sidebar')
      </div>
    </div>
	</div>
</div>


  <div id="footer">
  @include('layouts.footer')
  </div>
@endsection
