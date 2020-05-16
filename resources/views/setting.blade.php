@extends('layouts.common')

@section('content')
    <div class="card">
        <div class="card-header"><i aria-hidden="true" class="fas fa-cogs"></i> 設定</div>

        <div class="card-body">

            <div class="row">
                <div class="col-9">
                    <h4>メールの受信</h4>
                    <hr class="mt-0 mb-1">
                    <p>メッセージが送信されると同時にお客様へメールを送信します。</p>
                </div>
                <div class="col-3">
                    <form action="" method="post">
                        <input type="checkbox" name="" id="" class="form-control">
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
