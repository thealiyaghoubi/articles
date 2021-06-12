@extends('main')
@section('content')
    <form method="post">
        {{csrf_field()}}

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group">
            <label for="exampleFormControlInput1">Title</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{old('title', $post->title)}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Content</label>
            <textarea name="body" class="form-control" id="exampleFormControlTextarea1"></textarea>
        </div>
        <div>
            <p> </p>
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
    <script>
        document.getElementById("exampleFormControlTextarea1").innerHTML = "{{old('title', $post->body)}}"
    </script>

@endsection

