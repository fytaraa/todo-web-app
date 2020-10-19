<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>To-Do App</title>
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('js/bootstrap.min.js') }}" rel="script"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<div class="wrapper">
    <!-- PRICING-TABLE CONTAINER -->
    <div class="pricing-table group">
        <h1 class="heading">
            DashBoard
        </h1>
        <!-- PERSONAL -->
        <div class="block personal fl">
            <h2 class="title">Users</h2>
            <!-- CONTENT -->
            <div class="content">
                <p class="price">
                    <span>{{$numOfUsers}}</span>
                </p>
            </div>

        </div>
        <!-- /PERSONAL -->
        <!-- PROFESSIONAL -->
        <div class="block professional fl">
            <h2 class="title">Notes</h2>
            <!-- CONTENT -->
            <div class="content">
                <p class="price">
                    <span>{{$numOfNotes}}</span>
                </p>
            </div>
            <!-- /CONTENT -->
            <!-- FEATURES -->
            <!-- /PT-FOOTER -->
        </div>
        <!-- /PROFESSIONAL -->
        <!-- BUSINESS -->
        <div class="block business fl">
            <h2 class="title">Comments</h2>
            <!-- CONTENT -->
            <div class="content">
                <p class="price">
                    <span>{{$numOfComments}}</span>
                </p>
            </div>


        </div>
    </div>
</div>
<div class="wrapper">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="people-nearby ">
                <div class="pricing-table ">
                    <h1 class="heading">Admins</h1>
                </div>
                @foreach($users as $user)
                    <div class="nearby-user {{$user->id}}">
                        <div class="row">
                            <div class="col-md-2 col-sm-2">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="user" class="profile-photo-lg">
                            </div>
                            <div class="col-md-7 col-sm-7">
                                <h5 class="profile-link" >{{$user->name}} </h5>
                                <p>{{$user->email}}</p>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <button class="btn btn-danger pull-right" onclick="removeAdmin({{$user->id}})">Remove Admin</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div></div></div></div>
{{--    <form action="/admin" method="post">--}}
{{--        @csrf--}}
{{--        <input type="text" name="email" id="email" placeholder="type the admin email">--}}
{{--        <input type="submit" value="add">--}}
{{--    </form>--}}
<div class="container">
    <button type="button" class="btn btn-info btn-round" data-toggle="modal" data-target="#loginModal">
        Add Admin
    </button>
</div>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-title text-center">
                    <h4>Add Admin</h4>
                </div>
                <div class="d-flex flex-column text-center">
                    <form action="/admin" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email"placeholder="User email address...">
                        </div>
                        <button type="submit" class="btn btn-info btn-block btn-round">Add</button>
                    </form>
                    </di>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
