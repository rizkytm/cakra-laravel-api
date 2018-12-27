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
                    <h1 class="page-header">Manage Categories</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    @include('layouts.partials._alerts')
                    <div class="panel panel-default">                    	
                        <div class="panel-heading">
                            Categories Table
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form class="form-inline" action="{{ route('store.kategori') }}" method="post">
                              {{ csrf_field() }}
                              {{ method_field('POST') }}
                              <div class="form-group mx-sm-3 mb-2">
                              <label for="exampleInputEmail1">Tambah Kategori</label>
                              <input name="name" type="text" class="form-control" id="name" placeholder="Nama Kategori">
                              <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                          </form>
                          <br>
                            <div class="table-responsive">
                            	
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Post ID</th>
                                            <th>Nama Kategori</th>
                                            <th>Created at</th>
                                            <th>Updated at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php $counter=1; ?>
                                    	@foreach ($categories as $category)
                                    	
                                        <tr>
                                            <td><?php echo $counter++; ?></td>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->created_at }}</td>
                                            <td>{{ $category->updated_at }}</td>
                                            <td>
                                            	<button type="submit" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#editcategory{{$category->id}}" >Edit</button>
                                                @include('admin.modal.modalcategory')
						
							
							<button type="submit" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deletecategory{{$category->id}}">Hapus</button>
						</td>
                                        </tr>
                                        @include('admin.modal.modalcategory')
                                        @endforeach
                                    </tbody>
                                </table>
                                
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                
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
