<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                           <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                         <a href="{{ route('postadmin.view') }}"><i class="fa fa-table fa-fw"></i> Manage Posts</a>
                        </li>
                        <li>
                        <a href="{{ route('commentsadmin.view') }}"><i class="fa fa-table fa-fw"></i> Manage Comments</a>
                        </li>
                        <li>
                        <a href="{{ route('usersadmin.view') }}"><i class="fa fa-table fa-fw"></i> Manage Users</a>
                        </li>
                        <li>
                        <a href="{{ route('categoriesadmin.view') }}"><i class="fa fa-table fa-fw"></i> Manage Categories</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>