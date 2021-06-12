@extends('main')
@section('content')
    <form method="post">
        {{csrf_field()}}
        <div class="form-group col-md-4 mb-3">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group col-md-4 mb-3">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div>
            <p> </p>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('user.registration')}}"><button type="button" class="btn btn-info">if you dont have any account create one...</button></a>
    </form>
@endsection
