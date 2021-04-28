@extends('layouts.app')

@section('content')

  <div id="primery_window">
  <div class="for_position_top_line"></div>
  <div class="position_prim_action">
    <div class="row">
      <div class="col-lg-8 col-md-12 col-sm-12">
        <h2 class="name_title_transactionHistory">Рахунки власних електронних гаманців</h2>

        <div class="numbers_of_purses_accountsWallet">
        	<a href="">Електронний гаманець</a>
        	<a href="">Карта</a>
        	<table>
        		<tr>
        			<td colspan="5"></td>
        		</tr>
        		<tr>
        			<td></td>
        		</tr>
        		<tr>
        			<td>Платіжна система</td>
        			<td></td>
        			<td>№ рахунку гаманця (картки)</td>
        			<td></td>
        			<td>Валюта</td>
        		</tr>
        		<tr>
        			<td>Payeer</td>
        			<td></td>
        			<td>0000000000000</td>
        			<td></td>
        			<td>USD</td>
        		</tr>
        		<tr>
        			<td>Payeer</td>
        			<td></td>
        			<td>0000000000000</td>
        			<td></td>
        			<td>USD</td>
        		</tr>
        		<tr>
        			<td>Payeer</td>
        			<td></td>
        			<td>0000000000000</td>
        			<td></td>
        			<td>USD</td>
        		</tr>
        		<tr>
        			<td>Payeer</td>
        			<td></td>
        			<td>0000000000000</td>
        			<td></td>
        			<td>USD</td>
        		</tr>
        		<tr>
        			<td>Payeer</td>
        			<td></td>
        			<td>0000000000000</td>
        			<td></td>
        			<td>USD</td>
        		</tr>
        		<tr>
        			<td>Payeer</td>
        			<td></td>
        			<td>0000000000000</td>
        			<td></td>
        			<td>USD</td>
        		</tr>
        	</table>
        </div>
        
        


      </div>

      <div class="col-lg-4 col-md-12 col-sm-12">
        <div>
          @include('layouts.chat')
        </div>
      </div>

    </div>    
  </div>
  <div class="for_position_bottom_line"></div>
  </div>

  <div id="footer">
  @include('layouts.footer')
  </div>
@endsection
