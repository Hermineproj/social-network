@extends('layouts.app')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="groups">
                    <h1 class="page-header">Create Group</h1>
            </div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @else
                    <div class="alert alert-success">
                        {{$success}}
                    </div>
                @endif
                <form method="post" action="{{route('groups')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="grouptitle">Group title</label>
                        <input type="text" class="form-control" id="grouptitle" aria-describedby="emailHelp" placeholder="Enter Title" name="grouptitle">
                        <input type="hidden" class="form-control" id="grid" value="" name="grid">
                    </div>
                    <div class="form-group">
                        <label for="grouptitle">Description</label>
                        <textarea class="form-control" id="groupdesc" aria-describedby="emailHelp" placeholder="Description" name="groupdesc"></textarea>
                    </div>
{{--                    <div class="form-group">--}}
{{--                        <label for="addmember">Add members</label>--}}
{{--                        <input type="text" class="form-control" id="addmember" placeholder="Add Friend"  data-role="tagsinput">--}}
{{--                        <small id="emailHelp" class="form-text text-muted">Enter Name of Friend</small>--}}
{{--                    </div>--}}
                    <div class="form-group">
                        <label for="conf">Confidentiality</label>
                        <select class="form-control form-control-lg" name="conf">
                            <option value="0">Private</option>
                            <option value="1">Public</option>
                        </select>
{{--                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Add Friend"  data-role="tagsinput">--}}
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="conf">Visibility</label>
                        <select class="form-control form-control-lg" name="visibility">
                            <option value="0">Vissible</option>
                            <option value="1">Hidden</option>
                        </select>
                        {{--                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Add Friend"  data-role="tagsinput">--}}
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="groupimage">Upload Image</label>
                        <input type="file" id="groupimage" name="image">
                        <p class="help-block">Add Group Image (max 1MB)</p>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
            <div class="col-md-4">
                <div class="panel panel-default friends">
                    <div class="panel-heading">
                        <h3 class="panel-title">My Friends</h3>
                    </div>
                    <div class="panel-body">
                        <ul>
                            <li><a href="../profile.blade.php" class="thumbnail"><img src="img/user.png" alt=""></a></li>
                            <li><a href="../profile.blade.php" class="thumbnail"><img src="img/user.png" alt=""></a></li>
                            <li><a href="../profile.blade.php" class="thumbnail"><img src="img/user.png" alt=""></a></li>
                            <li><a href="../profile.blade.php" class="thumbnail"><img src="img/user.png" alt=""></a></li>
                            <li><a href="../profile.blade.php" class="thumbnail"><img src="img/user.png" alt=""></a></li>
                            <li><a href="../profile.blade.php" class="thumbnail"><img src="img/user.png" alt=""></a></li>
                            <li><a href="../profile.blade.php" class="thumbnail"><img src="img/user.png" alt=""></a></li>
                            <li><a href="../profile.blade.php" class="thumbnail"><img src="img/user.png" alt=""></a></li>
                            <li><a href="../profile.blade.php" class="thumbnail"><img src="img/user.png" alt=""></a></li>
                        </ul>
                        <div class="clearfix"></div>
                        <a class="btn btn-primary" href="#">View All Friends</a>
                    </div>
                </div>
                <div class="panel panel-default groups">
                    <div class="panel-heading">
                        <h3 class="panel-title">Latest Groups</h3>
                    </div>
                    <div class="panel-body">
                        <div class="group-item">
                            <img src="img/group.png" alt="">
                            <h4><a href="#" class="">Sample Group One</a></h4>
                            <p>This is a paragraph of intro text, or whatever I want to call it.</p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="group-item">
                            <img src="img/group.png" alt="">
                            <h4><a href="#" class="">Sample Group Two</a></h4>
                            <p>This is a paragraph of intro text, or whatever I want to call it.</p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="group-item">
                            <img src="img/group.png" alt="">
                            <h4><a href="#" class="">Sample Group Three</a></h4>
                            <p>This is a paragraph of intro text, or whatever I want to call it.</p>
                        </div>
                        <div class="clearfix"></div>
                        <a href="#" class="btn btn-primary">View All Groups</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

