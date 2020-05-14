@extends('layouts.common')

@section('content')
    <div class="card">
        <div class="card-header"><i aria-hidden="true" class="fa fa-folder-open"></i> ファイル</div>

        <div class="card-body">

            <table class="table table-bordered">
                <tr>
                    <th>ファイル名</th>
                    <th>アップロード日時</th>
                </tr>
                @foreach($fileList as $item)
                    <tr>
                        <td><a href="{{ route("threadDownload",$item->server_filename) }}">{{ $item->original_filename }}</a></td>
                        <td>{{ $item->created_at }}</td>
                    </tr>
                @endforeach
            </table>



        </div>
    </div>
@endsection
