@extends('layouts.common')

@section('content')
    <div class="card">
        <div class="card-header"><i aria-hidden="true" class="fa fa-inbox"></i> スレッド</div>

        <div class="card-body">

            <div class="alert alert-info">
                こんにちは
            </div>

            <div class="alert alert-secondary">
                　バナーのリメイクを依頼したくご連絡しました。<br>
                つきまして、ファイルをダウンロードしていただければと思います。
                <hr>
                <i class="fas fa-save"></i> <a href="">イラストレーター.pdf</a>
            </div>

            <form action="" method="post" enctype="multipart/form-data" class="border-top pt-2">
                @csrf
                <textarea name="" id="" cols="10" rows="5" class="form-control m-1" required></textarea>
                <input type="file" name="file" id="" class="form-control m-1">
                <button type="submit" class="btn btn-primary w-100 m-1">送信</button>
            </form>
        </div>
    </div>
@endsection
