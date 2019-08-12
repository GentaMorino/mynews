@extends('layouts.profile')
<!DOCTYPE html>
@section('title','プロフィール編集')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>My プロフィール　編集</h2>
                @if (count($errors) > 0)
                    <p>入力に誤りがあります</p>
                @endif
                <table>
                    <!-- action="{{ action('Admin\ProfileController@edit') }}"     -->
                    <form action="/admin/profile/edit" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{ $profile_form->id }}">
                        <!--↓↓name↓↓-->
                        @if($errors->has('name'))
                            <tr>
                                <th></th>
                                <td>{{$errors->first('name')}}</td>
                            </tr>
                        @endif
                        <tr>
                            <th>名前</th>
                            <td><input type="text" name="name" value="{{ $profile_form->name }}"></td>
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
                                    <option value="" @if($profile_form->gender=='') selected  @endif>選択して下さい</option>
                                    <option value="male" @if($profile_form->gender=='male') selected  @endif>男性</option>
                                    <option value="female" @if($profile_form->gender=='female') selected @endif>女性</option>
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
                            <td><input type="text" name="hoby" value="{{$profile_form->hoby}}"></td>
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
                            <td> <textarea name="introduction" rows="5" cols="40">{{ $profile_form->introduction }}</textarea>　</td>
                        </tr>
                       <!--↑↑introduction↑↑-->
                       <tr>
                           <th></th>
                           <td><input type="submit" class="btn btn-primary" value="編集"></td>
                       </tr>
                    </form>
                </table>
                <h2>編集履歴</h2>
                @if($profile_form->profile_histories!=NULL)
                    <table>
                        <tr>
                            <th>編集日</th>
                            <th>名前</th>
                            <th>性別</th>
                            <th>趣味</th>
                            <th>自己紹介</th>
                        </tr>
                        @foreach($profile_form->profile_histories as $history)
                            <tr>
                                <td>{{$history->edited_at}}</td>
                                <td>{{$history->name}}</td>
                                <td>{{$history->gender}}</td>
                                <td>{{$history->hoby}}</td>
                                <td>{{$history->introduction}}</td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>
        </div>
    </div>
</html>