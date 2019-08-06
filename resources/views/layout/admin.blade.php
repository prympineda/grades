<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  --}}
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/all.css') }}">
    {{--  <link rel="stylesheet" href="{{ URL::asset('css/mobile-style.css') }}"> --}}
     {{-- <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}"> --}}
    {{--  <link rel="stylesheet" href="{{ URL::asset('css/libs.css') }}"> --}}

    <title>Admin Dashboard</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsCollapse">
                <ul class="navbar-nav navbar-right">
                    <li class="nav-item active">
                        <a class="nav-link" href="/admin"> Dashboard </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseOne"
                            aria-expanded="true" aria-controls="collapseOne" aria-selected="false">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo"
                            aria-expanded="true" aria-controls="collapseTwo">Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseThree"
                            aria-expanded="true" aria-controls="collapseThree">Pages</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#"><i class="fa fa-user"></i> {{ Auth::user()->firstname }} <i
                                class="fas fa-caret-down"></i> </a>
                        <div class="dropdown-content" aria-labelledby="dropdownMenuButton">
                            <a href="">View Profile</a>
                            <a href="{{ route('get_logout') }}">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Header -->
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h1><i class="fa fa-cogs"></i> Dashboard <small>Manage your site</small></h1>
                </div>
                <div class="col-md-2">
                    <div class="dropdown create">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Create
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Add Page</a>
                            <a class="dropdown-item" href="#">Add Post</a>
                            <a class="dropdown-item" href="#">Add User</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End Header -->

    <!-- Breadcrumb -->
    <section id="breadcrumb">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="active">Dashboard</li>
            </ol>
        </div>
    </section>
    <!-- End Breadcrumb -->


    <section id="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">

                    {{-- <!-- First Sample -->
                    <!-- <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                        <i class="fa fa-tachometer-alt"></i> Dashboard
                                    </a>
                                <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="false">Home</a>
                                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                              </div> --> --}}


                    <!-- Group List -->

                    {{-- <!-- <div class="list-group">
                        <a href="index.html" class="list-group-item list-group-item-action active main-color-bg">
                            <i class="fa fa-tachometer-alt"></i> Dashboard
                        </a>
                        <a href="#" class="list-group-item list-group-item-action"><i class="fa fa-clipboard-list"></i>
                            Pages
                            <span class="badge badge-info">14</span></a>
                        <a href="#" class="list-group-item list-group-item-action"><i class="fa fa-pencil-square"></i>
                            Posts <span class="badge badge-info">25</span></a>
                        <a href="#" class="list-group-item list-group-item-action"><i class="fa fa-user"></i> Users
                            <span class="badge badge-info">18</span></a>
                    </div> --> --}}


                    <!-- Another Sample -->

                    <div class="accordion" id="accordion">
                        <div class="card">
                            <a href="/admin" class="btn btn-link collapsed text-left border-dark">
                                <i class="fa fa-tachometer-alt"></i> Dashboard
                            </a>
                        </div>
                        <div class="card">
                            <a href="" class="btn btn-link collapsed text-left border-dark" data-toggle="collapse"
                                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
                                aria-selected="false">
                                <i class="fa fa-user"></i> Users
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse border-info" aria-labelledby="headingOne"
                            data-parent="#accordion">
                            <div class="card-body border-info">
                                <ul class="list-group list-group-flush border-info">
                                    <span class="border-bottom border-top border-info"> <a
                                            href="{{ route('get_all_admins') }}">
                                            <li class="list-group-item">Admin</li>
                                        </a></span>
                                    <span class="border-bottom border-info"><a href="{{ route('get_all_teachers') }}">
                                            <li class="list-group-item">Teacher</li>
                                        </a></span>
                                    <span class="border-bottom border-info">
                                        <li class="list-group-item">Students</li>
                                    </span>
                                </ul>
                            </div>
                        </div>
                        <div class="card">
                            <a href="" class="btn btn-link collapsed text-left border-dark" data-toggle="collapse"
                                data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                <i class="fa fa-pencil-square"></i> Posts
                            </a>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">All Post</li>
                                    <li class="list-group-item">Create Post</li>
                                    <li class="list-group-item">Edit Post</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card">
                            <a href="" class="btn btn-link collapsed text-left border-dark" data-toggle="collapse"
                                data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                <i class="fa fa-clipboard-list"></i> Pages
                            </a>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-parent="#accordion">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">All Pages</li>
                                    <li class="list-group-item">Create Page</li>
                                    <li class="list-group-item">Edit Page</li>
                                </ul>
                            </div>
                        </div>

                    </div>

                    <!-- End Group List -->
                    <br>
                    <div class="card">
                        <h4>Disk Space Used</h4>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100">25%</div>
                        </div>
                        <br>
                        <h4>Bandwidth</h4>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 40%;" aria-valuenow="40"
                                aria-valuemin="0" aria-valuemax="100">40%</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-10">
                    {{-- <!-- Content Card -->
                    <div class="card">
                        <div class="card-header main-color-bg">
                            Website Overview
                        </div>
                        <div class="card-deck">
                            <div class="card boarder">
                                <div class="card-body text-white bg-primary">
                                    <h1 class="text-center"><i class="fa fa-user"> 18</i></h1>
                                    <h1 class="card-title text-center">Users</h1>
                                </div>
                            </div>
                            <div class="card boarder">
                                <div class="card-body text-white bg-success">
                                    <h1 class="text-center"><i class="fa fa-clipboard-list"> 18</i></h1>
                                    <h1 class="card-title text-center">Pages</h1>
                                </div>
                            </div>
                            <div class="card boarder">
                                <div class="card-body text-white bg-warning">
                                    <h1 class="text-center"><i class="fa fa-pencil-square"> 25</i></h1>
                                    <h1 class="card-title text-center">Posts</h1>
                                </div>
                            </div>
                            <div class="card boarder">
                                <div class="card-body text-white bg-danger">
                                    <h1 class="text-center"><i class="fa fa-users"> 109</i></h1>
                                    <h1 class="card-title text-center">Visitors</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Content Card -->
                    <br>
                    <!-- Users Table    -->
                    <div class="card">
                        <div class="card-header">
                            Users Table
                        </div>
                        <div class="card-body">
                            <table class="table table-dark table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First</th>
                                        <th scope="col">Last</th>
                                        <th scope="col">Handle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div> --}}

                    @yield('content')

                </div>
            </div>
        </div>
        </div>
    </section>

    {{-- <main role="main" class="container">

        <div class="starter-template">
          <h1>Bootstrap starter template</h1>
          <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
        </div>

      </main>  --}}

    <!-- /.container -->

    {{-- <script src="{{ asset('js/libs.js')"></script> }} --}}

    {{--  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  --}}

    {{--  <script src="{{ URL::asset('js/libs.js') }}"></script> --}}
      <script src="{{ URL::asset('js/app.js') }}"></script>
    {{--  <script src="{{ URL::asset('js/app.min.js') }}"></script>   --}}
    {{--  <script>
        $('#delete').on('show.bs.modal', function (event) {
               var button = $(event.relatedTarget)
               var firstname = button.data('firstname')  
               var id = button.data('id') 
               var modal = $(this)
               modal.find('.modal-body #firstname').val(firstname);
               modal.find('.modal-body #id').val(id);
           })
    </script>  --}}
    {{--  <script>
        $('#exampleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text('New message to ' + recipient)
                modal.find('.modal-body input').val(recipient)
              })
    </script>  --}}

    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/popper.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    {{--  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      --}}
    <script src="https://kit.fontawesome.com/c2edc15f19.js"></script>


</body>

</html>