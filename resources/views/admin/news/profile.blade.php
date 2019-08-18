@extends('layouts.front')

@section('content')
   <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="id">
                                    {{ $post->id }}
                                </div>
                                <div class="name">
                                    {{ str_limit($post->name, 20) }}
                                </div>
                                <div class="gender">
                                    {{ $post->gender }}
                                </div>
                                <div class="hoby">
                                    {{ str_limit($post->hoby, 30) }}
                                </div>
                                <div class="intoroduction">
                                    {{ str_limit($post->introduction, 100) }}
                                </div>
                                <div class="created_at">
                                    {{ $post->created_at->format('Y年m月d日') }}
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
@endsection