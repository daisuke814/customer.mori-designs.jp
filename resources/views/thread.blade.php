@extends('layouts.common')

@section('content')
    <div class="card">
        <div class="card-header"><i aria-hidden="true" class="fa fa-inbox"></i> スレッド</div>

        <div class="card-body">

            @foreach($data as $item)
                @if($item->sender == 1)
                    <div class="alert alert-info">
                        {!! nl2br(e($item->message)) !!}
                        @if($item->original_filename)
                            <hr>
                            <i class="fas fa-save"></i> 添付ファイル <a href="" download="{{ $item->original_filename }}">{{ $item->original_filename }}</a>
                        @endif
                    </div>
                @else
                    <div class="alert border">
                        {!! nl2br(e($item->message)) !!}
                        @if($item->original_filename)
                            <hr>
                            <i class="fas fa-save"></i> 添付ファイル <a href="{{ route("threadDownload",$item->server_filename) }}" download="{{ $item->original_filename }}">{{ $item->original_filename }}</a>
                        @endif
                    </div>
                @endif
            @endforeach

            <form action="{{ route("thread") }}" method="post" enctype="multipart/form-data" class="border-top pt-2 mt-2">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="m-0 p-0" style="list-style: none;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @csrf
                <textarea name="message" id="" cols="10" rows="5" class="form-control m-1" required></textarea>
                <input type="file" name="file" id="" class="form-control m-1">
                <button type="submit" class="btn btn-primary w-100 m-1">送信</button>
            </form>
        </div>
    </div>
@endsection
