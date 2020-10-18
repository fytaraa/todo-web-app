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

</body>
</html>
