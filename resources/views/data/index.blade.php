@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-primary" href="{{ route('data.create') }}">新規登録</a>
                        {{-- 検索フォーム --}}
                    <form method="GET" action="{{ route('data.index') }}" class="form-inline my-2 my-lg-0">
                        <input name="search" class="form-control mr-sm-2" type="search" placeholder="検索" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索する</button>
                      </form>

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">id</th>
                            <th scope="col">名前</th>
                            <th scope="col">件名</th>
                            <th scope="col">登録日</th>
                            <th scope="col">詳細</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($dbdatas as $dbdata)
                            <tr>
                                <th>{{$dbdata->id}}</th>
                                <td>{{$dbdata->your_name}}</td>
                                <td>{{$dbdata->title}}</td>
                                <td>{{$dbdata->created_at}}</td>
                                <td><a href="">詳細を見る</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                      {{ $dbdatas->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
