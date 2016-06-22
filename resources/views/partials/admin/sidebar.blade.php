<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        {{--<form action="#" method="get" class="sidebar-form">--}}
            {{--<div class="input-group">--}}
                {{--<input type="text" name="q" class="form-control" placeholder="Search..."/>--}}
              {{--<span class="input-group-btn">--}}
                {{--<button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>--}}
              {{--</span>--}}
            {{--</div>--}}
        {{--</form>--}}
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="{{ (Request::is('admin/manage/page') || Request::is('admin/manage/page/*')) ? 'active' : '' }}">
                <a href="{{ url('admin/manage/page') }}">
                    <i class='glyphicon glyphicon-file'></i> <span>Static Pages</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">    
                    <i class='glyphicon glyphicon-book'></i> 
                    <span>Credentials</span> 
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/manage/category') }}">Categories</a></li>
                    <li><a href="{{ url('admin/manage/project') }}">Projects</a></li>
                </ul>
            </li>
            <li class="{{ (Request::is('admin/manage/solution') || Request::is('admin/manage/solution/*')) ? 'active' : '' }}">
                <a href="{{ url('admin/manage/solution') }}">
                    <i class='glyphicon glyphicon-briefcase'></i> <span>Solutions</span>
                </a>
            </li>
            <li class="{{ (Request::is('admin/manage/setting')) ? 'active' : '' }}">
                <a href="{{ url('admin/manage/setting') }}">
                    <i class='fa fa-gear'></i> <span>Settings</span>
                </a>
            </li>
            <li class="{{ (Request::is('admin/manage/file') || Request::is('admin/manage/file/*')) ? 'active' : '' }}">
                <a href="{{ url('admin/manage/file') }}">
                    <i class='glyphicon glyphicon-folder-open'></i> <span>Files</span>
                </a>
            </li>
            <li class="{{ (Request::is('admin/manage/message') || Request::is('admin/manage/message/*')) ? 'active' : '' }}">
                <a href="{{ url('admin/manage/message') }}">
                    <i class='fa fa-envelope'></i> <span>Messages</span>
                </a>
            </li>
            <li class="{{ (Request::is('admin/manage/job') || Request::is('admin/manage/job/*')) ? 'active' : '' }}">
                <a href="{{ url('admin/manage/job') }}">
                    <i class='fa fa-suitcase'></i> <span>Jobs Posting</span>
                </a>
            </li>
            <li class="{{ (Request::is('admin/manage/profile') || Request::is('admin/manage/profile/*')) ? 'active' : '' }}">
                <a href="{{ url('admin/manage/profile') }}">
                    <i class='fa fa-sitemap'></i> <span>Profile</span>
                </a>
            </li>
            <li class="{{ (Request::is('admin/manage/post') || Request::is('admin/manage/post/*')) ? 'active' : '' }}">
                <a href="{{ url('admin/manage/post') }}">
                    <i class='fa fa-quote-left'></i> <span>Blog Post</span>
                </a>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
