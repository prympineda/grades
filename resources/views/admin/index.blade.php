@extends('layouts.admin')

@section('content')
    
<h1>Admin Dashboard | @if(count($active_quarter) != 0) {{ ucwords($active_quarter->name) }} Quarter
    @else
    No Selected Quarter. Click <a href="{{ route('get_select_quarter') }}">here</a>.
    @endif
  |

  @if(count($active_semester) != 0) {{ ucwords($active_semester->name) }} Semester
    @else
    No Selected Semester. Click <a href="{{ route('get_select_semester') }}">here</a>.
    @endif

</h1>

    {{--  
    <div class="card">
        <div class="card-header main-color-bg">
            Website Overview
        </div>
        <div class="card-deck">
            <div class="card boarder">
                <div class="card-body text-white bg-primary">
                    <h1 class="text-center"><i class="fa fa-user"> {{ $users_count }}</i></h1>
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
    </div>  --}}

    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>2018-19</h3>
                <p>School Year</p>
              </div>
              <div class="icon">
                <i class="fa fa-calendar"></i>
              </div>
              <a href="#" class="small-box-footer"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3>{{ $admin }}</h3>
                <p>Admin</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-shield"></i>
              </div>
              <a href="#" class="small-box-footer"></i></a>
            </div>
          </div>


          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3>{{ $teacher}}</h3>
                <p>Teachers</p>
              </div>
              <div class="icon">
                <i class="fas fa-chalkboard-teacher"></i>
              </div>
              <a href="#" class="small-box-footer"></i></a>
            </div>
          </div>


          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3>{{ $student }}</h3>
                <p>Students</p>
              </div>
              <div class="icon">
                <i class="fas fa-graduation-cap"></i>
              </div>
              <a href="#" class="small-box-footer"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
    </section>

@stop