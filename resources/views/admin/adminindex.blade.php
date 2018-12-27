<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cakra</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ url('assets/template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ url('assets/template/vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ url('assets/template/dist/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ url('assets/template/vendor/morrisjs/morris.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ url('assets/template/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        @include('admin.partials2.navbar2')
            <!-- /.navbar-top-links -->

        @include('admin.partials2.sidebar2')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                	
                                    <div class="huge">{{ $countpost }}</div>
                                    
                                    <div>Posts!</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('postadmin.view') }}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $countcomment }}</div>
                                    <div>Comments!</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('commentsadmin.view') }}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $countuser }}</div>
                                    <div>Users!</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('usersadmin.view') }}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
            </div>
            <!-- /.row -->
            
    <div class="row ">  <!-- justify-content-center -->
        @foreach ($posts as $post)
        @foreach ($post->user()->get() as $users)
        <div class="col-lg-4 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <center>
                            <img src="uploads/{{ $post->cover }}" alt="" height="200px" width="290px">
                            </center>
                        </div>
                        <div class="panel-body">
                            <h5><a href="{{ route('show', $post) }}"><strong>{{ $post->judul }}</strong></a></h5>
                            {{ str_limit($post->isi, 100, ' ...') }}
                        </div>
                        <div class="panel-footer">
                            @if($users->name === Auth::user()->name)
                            <a href="{{ route('profile.index') }}"><small>{{ $users->name }}</small></a>
                            @else
                            
                            <a href="{{ route('user', $users) }}"><small>{{ $users->name }}</small></a>
                            @endif
                            
                            <small> | 
                                {{ $post->category->name }} | {{ $post->created_at->diffForHumans() }}
                            </small>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
        <center>{!! $posts->render() !!}</center>
    
</div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{ url('assets/template/vendor/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url('assets/template/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ url('assets/template/vendor/metisMenu/metisMenu.min.js') }}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ url('assets/template/vendor/raphael/raphael.min.js') }}"></script>
    <script src="{{ url('assets/template/vendor/morrisjs/morris.min.js') }}"></script>
    <script src="{{ url('assets/template/data/morris-data.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ url('assets/template/dist/js/sb-admin-2.js') }}"></script>

</body>

</html>
