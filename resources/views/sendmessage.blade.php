@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
<h2>Write to {{$friend->name}} jan!</h2>

<form method="post" action="/message" enctype="multipart/form-data">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{ csrf_field() }}
    <div class="form-group">
        <label for="titlem">title</label>
        <input type="text" class="form-control" id="titlem" name='title' placeholder="Enter Title">
        <input type="hidden" class="form-control" id="hidid" name='receiver_id' value="{{$friend->id}}">
    </div>
    <div class="form-group">
        <label for="textm">Text</label>
        <textarea class="form-control" rows="3" id="textm" name="body" ></textarea>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>
@endsection
</div>
