@extends('layouts.app')
@section('content')

<section>
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h1 class="page-header">Photos</h1>
            <ul class="photos gallery-parent">
              <li><a href="img/sample1.jpg" data-hover="tooltip" data-placement="top" title="image" data-gallery="mygallery" data-parent=".gallery-parent" data-title="title" data-footer="this is a footer" data-toggle="lightbox"><img src="img/sample1.jpg" class="img-thumbnail" alt=""></a></li>
              <li><a href="img/sample2.jpg" data-hover="tooltip" data-placement="top" title="image" data-gallery="mygallery" data-parent=".gallery-parent" data-title="title" data-footer="this is a footer" data-toggle="lightbox"><img src="img/sample2.jpg" class="img-thumbnail" alt=""></a></li>
              <li><a href="img/sample3.jpg" data-hover="tooltip" data-placement="top" title="image" data-gallery="mygallery" data-parent=".gallery-parent" data-title="title" data-footer="this is a footer" data-toggle="lightbox"><img src="img/sample3.jpg" class="img-thumbnail" alt=""></a></li>
              <li><a href="img/sample4.jpg" data-hover="tooltip" data-placement="top" title="image" data-gallery="mygallery" data-parent=".gallery-parent" data-title="title" data-footer="this is a footer" data-toggle="lightbox"><img src="img/sample4.jpg" class="img-thumbnail" alt=""></a></li>
              <li><a href="img/sample5.jpg" data-hover="tooltip" data-placement="top" title="image" data-gallery="mygallery" data-parent=".gallery-parent" data-title="title" data-footer="this is a footer" data-toggle="lightbox"><img src="img/sample5.jpg" class="img-thumbnail" alt=""></a></li>
              <li><a href="img/sample6.jpg" data-hover="tooltip" data-placement="top" title="image" data-gallery="mygallery" data-parent=".gallery-parent" data-title="title" data-footer="this is a footer" data-toggle="lightbox"><img src="img/sample6.jpg" class="img-thumbnail" alt=""></a></li>
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

@endsection

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>
      $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox();
      });
      $(function () {
      $('[data-hover="tooltip"]').tooltip()
      })
    </script>

