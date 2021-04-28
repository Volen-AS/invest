<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
</head>
<body>

<div class="your_statistic_cabinet">
        <table>
          <tr>
            <td colspan="3">Статистичні дані</td>
          </tr>
          <tr>
            <td colspan="3"></td>
          </tr>
          <tr>
            <td>Вільні кошти (відображаються у вибраній валюті) (незадіяні в аукціоні)</td>
            <td></td>
            <td>{{ $statistics->total_balance }}</td>
          </tr> 
          <tr>
            <td>Кошти, задіяні в аукціоні в ставках на покупку токенів</td>
            <td></td>
            <td>{{ $statistics->auction_balance }}</td>
          </tr>
          <tr>
            <td>Інвестиційна винагорода (нараховані дивіденди)</td>
            <td></td>
            <td>{{ $statistics->investment_reward }}</td>
          </tr>
          <tr>
            <td>Реферальна винагорода (нараховані кошти від транзакцій купівлі-продажу токенів всередині власної реферальної команди)</td>
            <td></td>
            <td>{{ $statistics->referral_reward }}</td>
          </tr>
          <tr>
            <td>Відсоток власних токенів (від загальної кількості випущених)</td>
            <td></td>
            <td>{{ $statistics->percent_of_tokens }} %</td>
          </tr>
          <tr>
            <td>Загальна кількість власних токенів</td>
            <td></td>
            <td>{{ $statistics->total_token }}</td>
          </tr>
          <tr>
            <td>Кількість токенів, виставлених на продаж</td>
            <td></td>
            <td>{{ $statistics->token_in_auktion }}</td>
          </tr>
        </table>
      </div>
        
</body>
</html>