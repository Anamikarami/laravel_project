 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <!-- <li class="nav-item">
    <a class="nav-link " href="#">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li>End Dashboard Nav -->
@foreach($menus as $menu)
{{-- {{dd($menu);}} --}}
  <li class="nav-item">
    {{-- <a class="nav-link collapsed"  data-bs-toggle="collapse" href="{{  url  ($menu->url) }}"> --}}
      <a class="nav-link"  href="{{  url  ($menu->url) }}">
      <i class="bi bi-menu-button-wide"></i><span>{{  $menu->name }}</span>
    </a>
  </li><!-- End Components Nav -->
  @endforeach
 
</ul>

</aside><!-- End Sidebar-->