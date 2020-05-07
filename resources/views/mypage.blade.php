@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">メニュー</div>

                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action"><i class="fa fa-inbox" aria-hidden="true"></i> スレッド</a>
                        <a href="#" class="list-group-item list-group-item-action"><i class="fa fa-folder-open" aria-hidden="true"></i> ファイル</a>
                        <a href="#" class="list-group-item list-group-item-action"><i class="fa fa-shopping-cart" aria-hidden="true"></i> お支払い</a>
                    </div>

                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
