@extends('main')
@section('content')
        <div class="container" sty
             le="border: 3px solid black">
            @foreach($posts as $post)
                    <table class="table" style="border: 1px solid black">
                    <tr class="table">
                        <th class="table">{{$post->title}} <a href="{{route('user.posts.delete', $post->id)}}">delete</a>
                            <a href="{{route('user.posts.update', $post->id)}}">edit</a>
                        </th>

                    </tr>
                    <tr class="table" style="">
                        <td class="table">{{$post->body}}</td>
                    </tr>
                    </table>
            @endforeach
        </div>

@endsection
