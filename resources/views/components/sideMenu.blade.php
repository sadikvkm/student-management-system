<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @foreach (\App\Services\MenuServices::sideMenu() as $menu)
            <li class="nav-item">
                <a href="{{url('/admin')}}{{$menu['url']}}" class="nav-link"> <i class="nav-icon {{$menu['icon']}}"></i>
                    <p> {{$menu['label']}} 
                        @isset($menu['count'])
                            <span class="right badge badge-danger">{{$menu['count']}}</span> 
                        @endisset
                    </p>
                </a>
            </li>
        @endforeach
    </ul>
</nav>