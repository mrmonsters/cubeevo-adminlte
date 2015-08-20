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
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="#">    
                    <i class='fa fa-link'></i> 
                    <span>Static Content</span> 
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/manage/page') }}">Page</a></li>
                    <li><a href="{{ url('admin/manage/block') }}">Block</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">    
                    <i class='fa fa-link'></i> 
                    <span>Credential</span> 
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/manage/category') }}">Category</a></li>
                    <li><a href="{{ url('admin/manage/project') }}">Project</a></li>
                </ul>
            </li>
            <li class="{{ (Request::is('admin/manage/solution') || Request::is('admin/manage/solution/*')) ? 'active' : '' }}">
                <a href="{{ url('admin/manage/solution') }}">
                    <i class='fa fa-link'></i> <span>Solution</span></span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">    
                    <i class='fa fa-link'></i> 
                    <span>Setting</span> 
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/manage/setting/site') }}">Site</a></li>
                    <li><a href="{{ url('admin/manage/setting/user') }}">User</a></li>
                </ul>
            </li>
            <li class="{{ (Request::is('admin/manage/file') || Request::is('admin/manage/file/*')) ? 'active' : '' }}">
                <a href="{{ url('admin/manage/file') }}">
                    <i class='fa fa-file'></i> <span>File</span></span>
                </a>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
