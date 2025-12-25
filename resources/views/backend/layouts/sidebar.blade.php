<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    @php
      $r = request();
    @endphp

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex flex-column align-items-center justify-content-center py-3" href="{{ route('admin') }}">

        <div class="sidebar-brand-icon rotate-n-15 mb-1">
            <i class="fas fa-laugh-wink"></i>
        </div>    

        <div class="sidebar-brand-text" style="font-size: 1.25rem; font-weight: 600;">
            Ecommerce
        </div>    

        <div class="sidebar-brand-subtext" 
             style="font-size: 0.85rem; color: #d1d5db; margin-top: 2px;">
             Running things smoothly, {{ auth()->user()->name ?? 'Admin' }}? 😎
        </div>    

    </a>

    <hr class="sidebar-divider my-3">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ $r->routeIs('admin') ? 'active' : '' }}">
      <a class="nav-link {{ $r->routeIs('admin') ? 'active' : '' }}" href="{{ route('admin') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">Banner</div>

    <!-- Media Manager -->
    <li class="nav-item {{ $r->routeIs('file-manager') ? 'active' : '' }}">
        <a class="nav-link {{ $r->routeIs('file-manager') ? 'active' : '' }}" href="{{ route('file-manager') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Media Manager</span>
        </a>
    </li>

    <!-- Banners collapse -->
    @php $bannersOpen = $r->routeIs('banner.*'); @endphp
    <li class="nav-item {{ $bannersOpen ? 'active' : '' }}">
      <a class="nav-link {{ $bannersOpen ? '' : 'collapsed' }}"
         href="#"
         data-toggle="collapse"
         data-target="#collapseBanners"
         aria-expanded="{{ $bannersOpen ? 'true' : 'false' }}"
         aria-controls="collapseBanners">
        <i class="fas fa-image"></i>
        <span>Banners</span>
      </a>
      <div id="collapseBanners" class="collapse {{ $bannersOpen ? 'show' : '' }}" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Banner Options:</h6>
          <a class="collapse-item {{ request()->routeIs('banner.index') ? 'active' : '' }}" href="{{ route('banner.index') }}">Banners</a>
          <a class="collapse-item {{ request()->routeIs('banner.create') ? 'active' : '' }}" href="{{ route('banner.create') }}">Add Banners</a>
        </div>
      </div>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">Shop</div>

    <!-- Category -->
    @php $catOpen = $r->routeIs('category.*') || $r->routeIs('product-cat'); @endphp
    <li class="nav-item {{ $catOpen ? 'active' : '' }}">
        <a class="nav-link {{ $catOpen ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseCategory" aria-expanded="{{ $catOpen ? 'true' : 'false' }}" aria-controls="collapseCategory">
          <i class="fas fa-sitemap"></i>
          <span>Category</span>
        </a>
        <div id="collapseCategory" class="collapse {{ $catOpen ? 'show' : '' }}" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Category Options:</h6>
            <a class="collapse-item {{ request()->routeIs('category.index') ? 'active' : '' }}" href="{{ route('category.index') }}">Category</a>
            <a class="collapse-item {{ request()->routeIs('category.create') ? 'active' : '' }}" href="{{ route('category.create') }}">Add Category</a>
          </div>
        </div>
    </li>

    {{-- Brands --}}
    @php $brandOpen = $r->routeIs('brand.*'); @endphp
    <li class="nav-item {{ $brandOpen ? 'active' : '' }}">
      <a class="nav-link {{ $brandOpen ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseBrand" aria-expanded="{{ $brandOpen ? 'true' : 'false' }}" aria-controls="collapseBrand">
        <i class="fas fa-table"></i>
        <span>Brands</span>
      </a>
      <div id="collapseBrand" class="collapse {{ $brandOpen ? 'show' : '' }}" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Brand Options:</h6>
          <a class="collapse-item {{ request()->routeIs('brand.index') ? 'active' : '' }}" href="{{ route('brand.index') }}">Brands</a>
          <a class="collapse-item {{ request()->routeIs('brand.create') ? 'active' : '' }}" href="{{ route('brand.create') }}">Add Brand</a>
        </div>
      </div>
    </li>

    {{-- Products --}}
    @php $productOpen = $r->routeIs('product.*'); @endphp
    <li class="nav-item {{ $productOpen ? 'active' : '' }}">
      <a class="nav-link {{ $productOpen ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseProduct" aria-expanded="{{ $productOpen ? 'true' : 'false' }}" aria-controls="collapseProduct">
        <i class="fas fa-cubes"></i>
        <span>Products</span>
      </a>
      <div id="collapseProduct" class="collapse {{ $productOpen ? 'show' : '' }}" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Product Options:</h6>
          <a class="collapse-item {{ request()->routeIs('product.index') ? 'active' : '' }}" href="{{ route('product.index') }}">Products</a>
          <a class="collapse-item {{ request()->routeIs('product.create') ? 'active' : '' }}" href="{{ route('product.create') }}">Add Product</a>
        </div>
      </div>
    </li>

    {{-- Shipping --}}
    @php $shipOpen = $r->routeIs('shipping.*'); @endphp
    <li class="nav-item {{ $shipOpen ? 'active' : '' }}">
      <a class="nav-link {{ $shipOpen ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseShipping" aria-expanded="{{ $shipOpen ? 'true' : 'false' }}" aria-controls="collapseShipping">
        <i class="fas fa-truck"></i>
        <span>Shipping</span>
      </a>
      <div id="collapseShipping" class="collapse {{ $shipOpen ? 'show' : '' }}" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Shipping Options:</h6>
          <a class="collapse-item {{ request()->routeIs('shipping.index') ? 'active' : '' }}" href="{{ route('shipping.index') }}">Shipping</a>
          <a class="collapse-item {{ request()->routeIs('shipping.create') ? 'active' : '' }}" href="{{ route('shipping.create') }}">Add Shipping</a>
        </div>
      </div>
    </li>

    <!-- Orders -->
    <li class="nav-item {{ request()->routeIs('order.*') ? 'active' : '' }}">
        <a class="nav-link {{ request()->routeIs('order.*') ? 'active' : '' }}" href="{{ route('order.index') }}">
            <i class="fas fa-hammer fa-chart-area"></i>
            <span>Orders</span>
        </a>
    </li>

    <!-- Reviews -->
    <li class="nav-item {{ request()->routeIs('review.*') ? 'active' : '' }}">
        <a class="nav-link {{ request()->routeIs('review.*') ? 'active' : '' }}" href="{{ route('review.index') }}">
            <i class="fas fa-comments"></i>
            <span>Reviews</span>
        </a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">Posts</div>

    {{-- Posts --}}
    @php $postOpen = $r->routeIs('post.*'); @endphp
    <li class="nav-item {{ $postOpen ? 'active' : '' }}">
      <a class="nav-link {{ $postOpen ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapsePost" aria-expanded="{{ $postOpen ? 'true' : 'false' }}" aria-controls="collapsePost">
        <i class="fas fa-fw fa-folder"></i>
        <span>Posts</span>
      </a>
      <div id="collapsePost" class="collapse {{ $postOpen ? 'show' : '' }}" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Post Options:</h6>
          <a class="collapse-item {{ request()->routeIs('post.index') ? 'active' : '' }}" href="{{ route('post.index') }}">Posts</a>
          <a class="collapse-item {{ request()->routeIs('post.create') ? 'active' : '' }}" href="{{ route('post.create') }}">Add Post</a>
        </div>
      </div>
    </li>

    {{-- Post Category --}}
    @php $postCatOpen = $r->routeIs('post-category.*'); @endphp
    <li class="nav-item {{ $postCatOpen ? 'active' : '' }}">
      <a class="nav-link {{ $postCatOpen ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapsePostCategory" aria-expanded="{{ $postCatOpen ? 'true' : 'false' }}" aria-controls="collapsePostCategory">
        <i class="fas fa-sitemap fa-folder"></i>
        <span>Category</span>
      </a>
      <div id="collapsePostCategory" class="collapse {{ $postCatOpen ? 'show' : '' }}" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Category Options:</h6>
          <a class="collapse-item {{ request()->routeIs('post-category.index') ? 'active' : '' }}" href="{{ route('post-category.index') }}">Category</a>
          <a class="collapse-item {{ request()->routeIs('post-category.create') ? 'active' : '' }}" href="{{ route('post-category.create') }}">Add Category</a>
        </div>
      </div>
    </li>

    {{-- Tags --}}
    @php $tagOpen = $r->routeIs('post-tag.*'); @endphp
    <li class="nav-item {{ $tagOpen ? 'active' : '' }}">
      <a class="nav-link {{ $tagOpen ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseTag" aria-expanded="{{ $tagOpen ? 'true' : 'false' }}" aria-controls="collapseTag">
        <i class="fas fa-tags fa-folder"></i>
        <span>Tags</span>
      </a>
      <div id="collapseTag" class="collapse {{ $tagOpen ? 'show' : '' }}" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Tag Options:</h6>
          <a class="collapse-item {{ request()->routeIs('post-tag.index') ? 'active' : '' }}" href="{{ route('post-tag.index') }}">Tag</a>
          <a class="collapse-item {{ request()->routeIs('post-tag.create') ? 'active' : '' }}" href="{{ route('post-tag.create') }}">Add Tag</a>
        </div>
      </div>
    </li>

    <!-- Comments -->
    <li class="nav-item {{ request()->routeIs('comment.*') ? 'active' : '' }}">
      <a class="nav-link {{ request()->routeIs('comment.*') ? 'active' : '' }}" href="{{ route('comment.index') }}">
        <i class="fas fa-comments fa-chart-area"></i>
        <span>Comments</span>
      </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="sidebar-heading">General Settings</div>

    <li class="nav-item {{ request()->routeIs('coupon.*') ? 'active' : '' }}">
      <a class="nav-link {{ request()->routeIs('coupon.*') ? 'active' : '' }}" href="{{ route('coupon.index') }}">
        <i class="fas fa-table"></i>
        <span>Coupon</span>
      </a>
    </li>

    <li class="nav-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
      <a class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}" href="{{ route('users.index') }}">
        <i class="fas fa-users"></i>
        <span>Users</span>
      </a>
    </li>

    <li class="nav-item {{ request()->routeIs('settings') ? 'active' : '' }}">
      <a class="nav-link {{ request()->routeIs('settings') ? 'active' : '' }}" href="{{ route('settings') }}">
        <i class="fas fa-cog"></i>
        <span>Settings</span>
      </a>
    </li>

    <hr class="sidebar-divider">

    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
