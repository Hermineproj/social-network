@extends('layouts.app')
@section('content')
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h1 class="page-header">Photos</h1>
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
                  <form action="{{route('upload_file')}}" method="post" enctype="multipart/form-data">
                      @csrf

                      <div class="form-group">
                          <h4>Upload Your Files</h4>
                          <input name="file" type="file" >

                      </div>

                      <button type="submit" class="btn btn-default">Upload</button>

                  </form>

              </div>
            <ul class="photos gallery-parent">
              @foreach($user->files as $photo)
              <li>
                  <a href="{{ asset('./upload/img/' .$photo->file) }}" data-hover="tooltip" data-placement="top" title="image" data-gallery="mygallery" data-parent=".gallery-parent" data-title="title" data-footer="this is a footer" data-toggle="lightbox">
                      <img src="{{ asset('./upload/img/' .$photo->file) }}" class="img-thumbnail" alt="">
                  </a>
                  <form action="{{route('delete_file',$photo->id)}}" method="post">
                      @csrf
                      @method('delete')
                      <button class="btn btn-danger" type="submit">delete</button>
                  </form>
                  <form action="{{route('profile_image',$photo->id)}}" method="post">
                      @csrf
                      <button class="btn btn-success" type="submit">add to profile</button>
                  </form>
              </li>
                @endforeach
            </ul>
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

    <script>
      $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox();
      });
      $(function () {
      $('[data-hover="tooltip"]').tooltip()
      })
    </script>
@endsection
