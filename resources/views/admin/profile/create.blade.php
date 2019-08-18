@extends('layouts.profile')
@section('title','プロフィール')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>My プロフィール</h2>
                @if (count($errors) > 0)
                    <p>入力に誤りがあります</p>
                @endif
                <table>
                    <!-- action="{{ action('Admin\ProfileController@create') }}"     -->
                    <form action="/admin/profile/create" method="post">
                        {{csrf_field()}}
                        <!--↓↓name↓↓-->
                        @if($errors->has('name'))
                            <tr>
                                <th></th>
                                <td>{{$errors->first('name')}}</td>
                            </tr>
                        @endif
                        <tr>
                            <th>名前</th>
                            <td><input type="text" name="name" value="{{ old('name') }}"></td>
                        </tr>
                       <!--↑↑name↑↑-->
                       <!--↓↓gender↓↓-->
                        @if($errors->has('gender'))
                            <tr>
                                <th></th>
                                <td>{{ $errors->first('gender') }}</td>
                            </tr>
                        @endif
                        <tr>
                            <th>性別</th>
                            <td>
                                <select name="gender">
                                    <option value="" @if(old('gender')=='') selected  @endif>選択して下さい</option>
                                    <option value="male" @if(old('gender')=='male') selected  @endif>男性</option>
                                    <option value="female" @if(old('gender')=='female') selected @endif>女性</option>
                                </select>
                            </td>
                        </tr>
                       <!--↑↑gender↑↑-->
                       <!--↓↓hoby↓↓-->
                        @if($errors->has('hoby'))
                            <tr>
                                <th></th>
                                <td>{{$errors->first('hoby')}}</td>
                            </tr>
                        @endif
                        <tr>
                            <th>趣味</th>
                            <td><input type="text" name="hoby" value="{{old('hoby')}}"></td>
                        </tr>
                       <!--↑↑hoby↑↑-->
                       <!--↓↓introduction↓↓-->
                        @if($errors->has('introduction'))
                            <tr>
                                <th></th>
                                <td>{{$errors->first('introduction')}}</td>
                            </tr>
                        @endif
                        <tr>
                            <th>自己紹介</th>
                            <td> <textarea name="introduction" rows="5" cols="40">{{ old('introduction') }}</textarea>　</td>
                        </tr>
                       <!--↑↑introduction↑↑-->
                       <tr>
                           <th></th>
                           <td><input type="submit" class="btn btn-primary" value="新規作成"></td>
                       </tr>
                    </form>
                </table>
            </div>
        </div>
    </div>
@endsection

