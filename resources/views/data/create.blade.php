@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">登録フォーム</div>

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
                    <form method="POST" action="{{route('data.store')}}">
                        @csrf <span></span>
                        <label for="your_name" class="font-weight-bold text-primary"><span>*</span>氏名</label><br>
                        <input type="text" class="d-block w-100 p-2" id="your_name" name="your_name" value="{{ old('your_name') }}" placeholder="山田　太郎" required>
                        <br>
                        <label for="title" class="font-weight-bold text-primary"><span>*</span>件名</label>
                        <input type="text" class="d-block w-100 p-2" id="title" name="title" value="{{ old('title') }}" placeholder="〇〇について"  required>
                        <br>
                        <label for="email" class="font-weight-bold text-primary"><span>*</span>メールアドレス</label>
                        <input type="email" class="d-block w-100 p-2" id="email" name="email" value="{{ old('email') }}" placeholder="example@example.com"  required>
                        <br>
                        <label for="url" class="font-weight-bold text-primary">ホームページ</label>
                        <input type="url" class="d-block w-100 p-2" id="url" name="url" value="{{ old('url') }}" placeholder="https://marumaru.com">
                        <br>
                        <label for="" class="font-weight-bold text-primary"><span>*</span>性別</label>
                        <div>
                            <input type="radio" id="man" name="gender" value="0" {{ old('gender') === '0' ? 'checked' : '' }}><label for="man">男性</label>
                            <input type="radio" id="woman" name="gender" value="1" {{ old('gender') === '1' ? 'checked' : '' }}><label for="woman">女性</label>
                        </div>
                        <br>
                        <label for="" class="font-weight-bold text-primary"><span>*</span>年齢</label>
                        <select name="age" id="" class="d-block w-100 p-2">
                            <option value="">選択してください</option>
                            <option value="1" {{ old('age') === '1' ? 'selected' : '' }}>〜19歳</option>
                            <option value="2" {{ old('age') === '2' ? 'selected' : '' }}>20〜29歳</option>
                            <option value="3" {{ old('age') === '3' ? 'selected' : '' }}>30〜39歳</option>
                            <option value="4" {{ old('age') === '4' ? 'selected' : '' }}>40〜49歳</option>
                            <option value="5" {{ old('age') === '5' ? 'selected' : '' }}>50〜59歳</option>
                            <option value="6" {{ old('age') === '6' ? 'selected' : '' }}>60歳〜</option>
                        </select>
                        <br>
                        <label for="contact" class="font-weight-bold text-primary"><span>*</span>内容</label>
                        <textarea id="contact" class="d-block w-100 p-2" style="height: 200px;"  name="contact" placeholder="内容をご記入ください" required>{{ old('contact') }}</textarea>
                        <br>

                        {{-- <input type="checkbox" name="caution" value="1">注意事項に同意する                        <br> --}}
                        <br>
                        <a class="btn btn-secondary" href="{{ route('data.index') }}">一覧に戻る</a>
                        <input type="submit" class="btn btn-info" value="登録する">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
