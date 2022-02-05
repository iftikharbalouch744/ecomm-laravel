<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src=" ">
        <div>
          <p class="app-sidebar__user-name">{{ Auth::user()->name }}</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item {{ Request::is('dashboard') ? 'active':'';}}" href="/dashboard"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item {{ Request::is('category') ? 'active':'';}}"  href="{{url('category')}}"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Category</span></a></li>
        <li><a class="app-menu__item {{ Request::is('AddCategory') ? 'active':'';}}" href="{{url('AddCategory')}}"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Add Category</span></a></li>
        <li><a class="app-menu__item {{ Request::is('products') ? 'active':'';}}"  href="{{url('products')}}"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Products</span></a></li>
        <li><a class="app-menu__item {{ Request::is('addproducts') ? 'active':'';}}" href="{{url('addproducts')}}"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Add Products</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">UI Elements</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i> Bootstrap Elements</a></li>
            <li><a class="treeview-item" href="https://fontawesome.com/v4.7.0/icons/" target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i> Font Icons</a></li>
            <li><a class="treeview-item" href="ui-cards.html"><i class="icon fa fa-circle-o"></i> Cards</a></li>
            <li><a class="treeview-item" href="widgets.html"><i class="icon fa fa-circle-o"></i> Widgets</a></li>
          </ul>
        </li>

      </ul>
    </aside>
