@extends('layouts.app')
@section('content')

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="profile">
              <h1 class="page-header">{{$user->name}}</h1>
              <div class="row">
                <div class="col-md-4">
                    @if(file_exists('./upload/img/'.$profile->image))
                  <img src="./upload/img/{{$profile->image}}" class="img-thumbnail" alt="">
                        @else
                        <img src="" class="img-thumbnail" alt="">

                    @endif
                </div>
                <div class="col-md-8">
                  <ul>
                    <li><strong>Name:</strong>{{$user->name}}</li>
                    <li><strong>Email:</strong>{{$user->email}}</li>
                    <li><strong>Country:</strong>{{$profile->country}}</li>
                    <li><strong>Gender:</strong>{{$profile->gender}}</li>
                    <li><strong>DOB:</strong>{{$profile->dob}}</li>
                  </ul>
                </div>
              </div><br><br>
                <div class="form-group">

                    <form action="{{route('delete_profile_image',$profile->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">X</button>
                    </form>
                </div>
{{--                <div class="form-group">--}}
{{--                    <p>select profile image</p>--}}
{{--                    <input name="image" type="file" >--}}

{{--                </div>--}}

              <div class="row">
                <div class="col-md-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title">Profile Wall</h3>
                    </div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                       <form action="{{route('edit_profile')}}" method="post" enctype="multipart/form-data">
                           @csrf
                           <div class="form-group">
                            <p>Country</p>
                          <input class="form-control" placeholder="{{$profile->country}}" name="country" type="string" value="{{$profile->country}}">
                        </div>
                           <div class="form-group">
                            <p>gender</p>
                          <input class="form-control" placeholder="{{$profile->gender}}" name="gender" type="string" value="{{$profile->gender}}">
                        </div>
                           <div class="form-group">
                            <p>DOB</p>
                          <input class="form-control" placeholder="{{$profile->dob}}" name="dob" type="date" value="{{$profile->dob}}">
                          <input name="id" type="hidden" value="{{$profile->id}}">
                        </div>

                           <div class="form-group">
                               <p>select profile image</p>
                               <input name="image" type="file" >

                           </div>


                         <button type="submit" class="btn btn-default">Submit</button>

                        </form>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="panel panel-default friends">
              <div class="panel-heading">
                <h3 class="panel-title">My Friends</h3>
              </div>
              <div class="panel-body">
                <ul>
                  <li><a href="profile.blade.php" class="thumbnail"><img src="img/user.png" alt=""></a></li>
                  <li><a href="profile.blade.php" class="thumbnail"><img src="img/user.png" alt=""></a></li>
                  <li><a href="profile.blade.php" class="thumbnail"><img src="img/user.png" alt=""></a></li>
                  <li><a href="profile.blade.php" class="thumbnail"><img src="img/user.png" alt=""></a></li>
                  <li><a href="profile.blade.php" class="thumbnail"><img src="img/user.png" alt=""></a></li>
                  <li><a href="profile.blade.php" class="thumbnail"><img src="img/user.png" alt=""></a></li>
                  <li><a href="profile.blade.php" class="thumbnail"><img src="img/user.png" alt=""></a></li>
                  <li><a href="profile.blade.php" class="thumbnail"><img src="img/user.png" alt=""></a></li>
                  <li><a href="profile.blade.php" class="thumbnail"><img src="img/user.png" alt=""></a></li>
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
