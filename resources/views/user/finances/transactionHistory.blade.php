@extends('layouts.app')

@section('content')

  <div id="primery_window">
  <div class="for_position_top_line"></div>
  <div class="position_prim_action">
    <div class="row">
      <div class="col-lg-8 col-md-12 col-sm-12">
        <h2 class="name_title_transactionHistory">Історія проведених власних транзакцій з поповнення та виводу валюти</h2>

        <div class="transactionHistory">
          <table class="transactionHistory_table">
            <tr>
              <td colspan="9">Купівля нових токенів</td>
            </tr>
            <tr>
              <td></td>
            </tr>
            <tr>
              <td>Дата, час</td>
              <td></td>
              <td>№ транзанкії</td>
              <td></td>
              <td>Емісійна вартість</td>
              <td></td>
              <td>Кількість токенів, шт</td>
              <td></td>
              <td>Сума, $</td>
              <td></td>
            </tr>
              @if(count($bouth_new_tokens))

                  @foreach($bouth_new_tokens as $bouth_new_token)
                      <tr>
                          <td>{{ $bouth_new_token->created_at->format('d-m-Y') }}</td>
                          <td></td>
                          <td>{{ $bouth_new_token->transaction }}</td>
                          <td></td>
                          <td>{{ $bouth_new_token->rate }}</td>
                          <td></td>
                          <td>{{ $bouth_new_token->new_token }}</td>
                          <td></td>
                          <td>{{ $bouth_new_token->in_cash }}</td>
                          <td></td>
                      </tr>
                  @endforeach
              @else
                  <tr>
                      <td colspan="2">не має провелених операцій</td>
                  </tr>
            @endif
          </table>
        </div>

          <div class="transactionHistory">
              <table class="transactionHistory_table">
                  <tr>
                      <td colspan="8">Продажа токенів</td>
                  </tr>
                  <tr>
                      <td></td>
                  </tr>
                  <tr>
                      <td>Дата, час</td>
                      <td></td>
                      <td>№ транзанкії</td>
                      <td></td>
                      <td>Кількість токенів, шт</td>
                      <td></td>
                      <td>Сума, $</td>
                      <td></td>

                  </tr>

              </table>
              не має провелених операцій

              </table>
          </div>


          <div class="transactionHistory">
              <table class="transactionHistory_table">
                  <tr>
                      <td colspan="8">Поповнення рахунку </td>
                  </tr>
                  <tr>
                      <td></td>
                  </tr>
                  <tr>
                      <td>Дата, час</td>
                      <td></td>
                      <td>№ транзанкії</td>
                      <td></td>
                      <td>Кількість токенів, шт</td>
                      <td></td>
                      <td>Сума, $</td>
                      <td></td>

                  </tr>

              </table>
              не має провелених операцій

              </table>
          </div>

          <div class="transactionHistory">
              <table class="transactionHistory_table">
                  <tr>
                      <td colspan="8">Виведення валюти</td>
                  </tr>
                  <tr>
                      <td></td>
                  </tr>
                  <tr>
                      <td>Дата, час</td>
                      <td></td>
                      <td>№ транзанкії</td>
                      <td></td>
                      <td>Кількість токенів, шт</td>
                      <td></td>
                      <td>Сума, $</td>
                      <td></td>

                  </tr>

              </table>
              не має провелених операцій

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
