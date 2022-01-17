@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">詳細内容：{{ $pickdata->id }} / {{ $pickdata->your_name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p><span class="font-weight-bold text-primary">氏名</span><br>
                    {{$pickdata->your_name}}
                    </p>
                    <p><span class="font-weight-bold text-primary">件名</span><br>
                    {{$pickdata->title}}</p>
                    <p><span class="font-weight-bold text-primary">メールアドレス</span><br>
                    {{$pickdata->email}}</p>
                    <p><span class="font-weight-bold text-primary">ホームページ</span><br>
                    {{$pickdata->url}}</p>
                    <p><span class="font-weight-bold text-primary">性別</span><br>
                    {{$gender}}</p>
                    <p><span class="font-weight-bold text-primary">年齢</span><br>
                    {{$age}}</p>
                    <p><span class="font-weight-bold text-primary">内容</span><br>
                    {{$pickdata->contact}}</p>

                    <a class="btn btn-secondary" href="{{ route('data.index') }}">一覧に戻る</a>
                    <a class="btn btn-primary" href="{{ route('data.edit',['id' => $pickdata->id ]) }}">変更する</a>

                    <form action="{{ route('data.destroy', ['id' => $pickdata->id ]) }}" method="POST" id="form" class="mt-4">
                        @csrf
                        <a href="#" class="btn btn-danger"  onclick="deletePost(this);">削除する</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function deletePost(e) {
        if(confirm('本当に削除していいですか？')) {
            document.getElementById('form').submit();
        }
    }
    </script>
@endsection
