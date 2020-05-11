@extends('layouts.common')

@section('content')
    <div class="card">
        <div class="card-header"><i aria-hidden="true" class="fa fa-inbox"></i> お支払い</div>

        <div class="card-body">

            <h2 class="border-bottom p-1">請求金額</h2>


            <h2 class="border-bottom p-1">PayPal</h2>

            <form action="https://www.paypal.com/j1/cgi-bin/webscr" method="post">
                <input type="hidden" name="cmd" value="_cart">
                <input type="hidden" name="business" value="daisuke814@outlook.com">
                <input type="hidden" name="currency_code" value="JPY">
                <input type="hidden" name="lc" value="JP">
                <input type="hidden" name="upload" value="1">
                <input type="hidden" name="charset" value="utf-8">
                <input type="hidden" name="item_name_1" value="ノート">
                <input type="hidden" name="amount_1" value="250">
                <input type="hidden" name="quantity_1" value="1">
                <button type="submit" name="PayPal" class="btn btn-warning">PayPalでお支払い</button>
            </form>

            <img src="https://www.paypalobjects.com/digitalassets/c/website/marketing/apac/jp/developer/203x80_b.png" border="0" alt="ペイパル - あなたのカード情報、守ります。｜Mastercard,VISA,American Express,JCB">

            <h2 class="border-bottom p-1">銀行振込</h2>
            <div class="d-flex row">
                <img src="{{ asset("images/smbc-light.svg") }}" alt="三井住友銀行" class="col-4">
                <div class="col-8">
                    <table class="table table-bordered">
                        <tr>
                            <th class="table-info">銀行名</th>
                            <td>三井住友銀行</td>
                        </tr>
                        <tr>
                            <th class="table-info">支店名</th>
                            <td>調布駅前支店</td>
                        </tr>
                        <tr>
                            <th class="table-info">支店番号</th>
                            <td>916</td>
                        </tr>
                        <tr>
                            <th class="table-info">口座番号</th>
                            <td>1361700</td>
                        </tr>
                    </table>
                    <span class="text-danger">一般に公開していないので取り扱いに注意してください</span>
                </div>

            </div>

        </div>

    </div>
@endsection
