@extends('layouts.app')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">User</th>
                            <th scope="col">Action</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @for($n=0; $n<count($senders); $n++)
                        <tr>
                            <td> {{$senders[$n]->name}}</td>
                            <td><a href="{{route('acceptrequest',['id'=>$senders[$n]->id])}}" class="btn btn-success"><i class="fa fa-plus"></i> Accept</a></td>
                            <td><a href="{{route('denyrequest',['id'=>$senders[$n]->id])}}" class="btn btn-danger"><i class="fa fa-remove"></i> Deny</a></td>
                        </tr>
                        @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>,
    </section>
@endsection
