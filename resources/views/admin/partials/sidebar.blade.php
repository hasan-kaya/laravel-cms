<div class="navbar nav_title" style="border: 0;">
    <a href="{{route('admin.dashboard')}}" class="site_title text-center">
        <span>Yönetim Paneli</span>
    </a>
</div>
<div class="clearfix"></div>

<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <ul class="nav side-menu">

            <li class="{{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
                <a href="{{route('admin.dashboard')}}">
                    <i class="fa fa-home"></i> Anasayfa
                </a>
            </li>

            <li class="{{ isset(request()->type) ? 'active' : '' }}">
                <a>
                    <i class="fa fa-file-text-o"></i> İçerik Yönetimi
                    <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu" style="{{ isset(request()->type) ? 'display:block;' : '' }}">
                    <li class="{{ request()->type == 1 ? 'current-page' : '' }}"><a href="{{route('admin.posts.index')}}?type=1">İçerikler</a></li>
                    <li class="{{ request()->type == 2 ? 'current-page' : '' }}"><a href="{{route('admin.posts.index')}}?type=2">Ürünler</a></li>
                    <li><a href="{{route('admin.categories.index')}}">Kategoriler</a></li>
                </ul>
            </li>
            <li>
                <a href="{{route('admin.menus')}}">
                    <i class="fa fa-bars"></i> Menü Yönetimi
                </a>
            </li>  
            
            <li>
                <a href="{{route('admin.blocks.index')}}">
                    <i class="fa fa-arrows"></i> Yerleşim Yönetimi
                </a>
            </li>

            <li>
                <a href="{{route('admin.language-values.index')}}">
                    <i class="fa fa-globe"></i> Dil Parametreleri
                </a>
            </li>

            <li>
                <a href="{{route('admin.form-data')}}">
                    <i class="fa fa-edit"></i> Form Başvuruları
                </a>
            </li>

            <li>
                <a>
                    <i class="fa fa-users"></i> Yönetici İşlemleri
                    <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    <li><a href="{{route('admin.admins.index')}}">Yöneticiler</a></li>
                    <li><a href="{{route('admin.roles.index')}}">Yetkiler</a></li>
                    <li><a href="{{route('admin.permissions.index')}}">İzinler</a></li>
                </ul>
            </li>

            <li>
                <a href="{{ route('admin.settings') }}">
                    <i class="fa fa-cog"></i> Sistem Ayarları
                </a>
            </li>

        </ul>
    </div>
</div>

<div class="sidebar-footer hidden-small">
    <a href="{{url('/')}}" target="_blank" data-toggle="tooltip" data-placement="top" title="Siteyi Görüntüle">
        <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
    </a>
    <a id="clear-cache" data-toggle="tooltip" data-placement="top" title="Önbellek Temizle">
        <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
    </a>
    <a href="{{ route('admin.settings') }}" data-toggle="tooltip" data-placement="top" title="Sistem Ayarları">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" data-toggle="tooltip" data-placement="top" title="Çıkış Yap">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
</div>

<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>

