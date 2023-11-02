<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
      <div class="navbar nav_title" style="border: 0;">
        <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Admin Dashboard</span></a>
      </div>

      <div class="clearfix"></div>

      {{-- menu profile quick info  --}}
      <div class="profile clearfix">
        <div class="profile_pic">
          <img src="{{asset('admin/images/img.jpg')}}" alt="..." class="img-circle profile_img">
        </div>
        <div class="profile_info">
          <span>Welcome,</span>
          <h2>{{auth()->user()->name}}</h2>
        </div>
      </div>
      {{-- menu profile quick info  --}}

      <br />

     {{-- sidebar menu  --}}
      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
          <h3>General</h3>
          <ul class="nav side-menu">
            <li><a href="{{route('user.index')}}"><i class="fa fa-users"></i>User</a></li>
            <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="index.html">Dashboard</a></li>
                <li><a href="index2.html">Dashboard2</a></li>
                <li><a href="index3.html">Dashboard3</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-home"></i> Product <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="index.html">Product</a></li>
                <li><a href="{{route('product.category.index')}}">Category</a></li>
                <li><a href="{{route('product.sub_category.index')}}">Sub Category</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                  <li><a href="#level1_1">Level One</a>
                  <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li class="sub_menu"><a href="level2.html">Level Two</a>
                      </li>
                      <li><a href="#level2_1">Level Two</a>
                      </li>
                      <li><a href="#level2_2">Level Two</a>
                      </li>
                    </ul>
                  </li>
                  <li><a href="#level1_2">Level One</a>
                  </li>
              </ul>
            </li>
          </ul>
        </div>

      </div>
      {{-- sidebar menu  --}}
    </div>
  </div>
