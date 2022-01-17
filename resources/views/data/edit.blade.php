@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">変更：{{ $pickdata->id }} / {{ $pickdata->your_name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        {{-- バリデーションエラー --}}
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ( $errors->all() as $error )
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    <form method="POST" action="{{route('data.update',['id' => $pickdata->id ])}}">
                        @csrf
                        <label for="your_name" class="font-weight-bold text-primary"><span>*</span>氏名</label><br>
                        <input type="text" class="d-block w-100 p-2" id="your_name" name="your_name" value="{{$pickdata->your_name}}" required>
                        <br>
                        <label for="title" class="font-weight-bold text-primary"><span>*</span>件名</label>
                        <input type="text" class="d-block w-100 p-2" id="title" name="title" value="{{$pickdata->title}}" required>
                        <br>
                        <label for="email" class="font-weight-bold text-primary"><span>*</span>メールアドレス</label>
                        <input type="email" class="d-block w-100 p-2" id="email" name="email" value="{{$pickdata->email}}" required>
                        <br>
                        <label for="url" class="font-weight-bold text-primary">ホームページ</label>
                        <input type="url" class="d-block w-100 p-2" id="url" name="url" value="{{$pickdata->url}}">
                        <br>
                        <label for="" class="font-weight-bold text-primary"><span>*</span>性別</label>
                        <div>
                            <input type="radio" id="man" name="gender"  value="0" @if ($pickdata->gender === 0) checked  @endif><label for="man">男性</label>
                            <input type="radio" id="woman" name="gender" value="1" @if ($pickdata->gender === 1) checked  @endif><label for="woman">女性</label>
                        </div>
                        <br>
                        <label for="" class="font-weight-bold text-primary"><span>*</span>年齢</label>
                        <select name="age" id="" class="d-block w-100 p-2">
                            <option value="">選択してください</option>
                            <option value="1" @if ($pickdata->age === 1) selected  @endif>〜19歳</option>
                            <option value="2" @if ($pickdata->age === 2) selected  @endif>20〜29歳</option>
                            <option value="3" @if ($pickdata->age === 3) selected  @endif>30〜39歳</option>
                            <option value="4" @if ($pickdata->age === 4) selected  @endif>40〜49歳</option>
                            <option value="5" @if ($pickdata->age === 5) selected  @endif>50〜59歳</option>
                            <option value="6" @if ($pickdata->age === 6) selected  @endif>60歳〜</option>
                        </select>
                        <br>
                        <label for="contact" class="font-weight-bold text-primary"><span>*</span>内容</label>
                        <textarea id="contact" class="d-block w-100 p-2" style="height: 200px;"  name="contact" required>{{$pickdata->contact}}</textarea>
                        <br>

                        <br>
                        <a class="btn btn-warning" href="{{ route('data.index') }}">一覧へ</a>
                        <a class="btn btn-secondary" href="{{ route('data.show',['id' => $pickdata->id ]) }}">詳細に戻る</a>
                        <input type="submit" class="btn btn-info" value="更新する">
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
