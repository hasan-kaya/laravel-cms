@extends('admin.layouts.master')
@section('content')
<?php
$currentUrl = url()->current();
?>
<link href="{{asset('admin/css/menu-builder.css')}}" rel="stylesheet">
<div id="hwpwrap">
    <div class="custom-wp-admin wp-admin wp-core-ui js   menu-max-depth-0 nav-menus-php auto-fold admin-bar">
        <div id="wpwrap">
            <div id="wpcontent">
                <div id="wpbody">
                    <div id="wpbody-content">

                        <div class="wrap">

                            <div class="manage-menus">
                                <form method="get" action="{{ $currentUrl }}">
                                    <label for="menu" class="selected-menu">Düzenlemek istediğiniz menüyü seçin:</label>

                                    {!! $menu_list_html !!}

                                    <span class="submit-btn">
                                        <input type="submit" class="button-secondary" value="Seç">
                                    </span>
                                    <span class="add-new-menu-action"> veya <a
                                            href="{{ $currentUrl }}?action=edit&menu=0">Yeni Menü Oluştur</a>. </span>
                                </form>
                            </div>
                            <div id="nav-menus-frame" style="{{ !request()->has('menu') || request()->input("menu") == 0 ? "margin-left: 0;width: 50%;" : "" }}">

                                @if(request()->has('menu') && !empty(request()->input("menu")))
                                <div id="menu-settings-column" class="metabox-holder" >

                                    <div class="clear"></div>

                                    <form id="nav-menu-meta" action="" class="nav-menu-meta" method="post"
                                        enctype="multipart/form-data">
                                        <div id="side-sortables" class="accordion-container">
                                            <ul class="outer-border">
                                                <li class="control-section accordion-section  open add-page"
                                                    id="add-page">
                                                    <h3 class="accordion-section-title hndle" tabindex="0"> Özel Link
                                                        <span class="screen-reader-text">Press return or enter to
                                                            expand</span></h3>
                                                    <div class="accordion-section-content ">
                                                        <div class="inside">
                                                            <div class="customlinkdiv" id="customlinkdiv">

                                                                <p id="menu-item-name-wrap">
                                                                    <label class="howto" for="custom-menu-item-name">
                                                                        <span>Başlık</span>&nbsp;
                                                                        <input id="custom-menu-item-name" name="label"
                                                                            type="text"
                                                                            class="regular-text menu-item-textbox input-with-default-title">
                                                                    </label>
                                                                </p>
                                                                <p id="menu-item-url-wrap">
                                                                    <label class="howto" for="custom-menu-item-url">
                                                                        <span>Link</span>&nbsp;&nbsp;&nbsp;
                                                                        <input id="custom-menu-item-url" name="url"
                                                                            type="text" class="menu-item-textbox ">
                                                                    </label>
                                                                </p>

                                                                <p class="button-controls">
                                                                    <a href="#" onclick="addcustommenu()"
                                                                        class="button-secondary submit-add-to-menu right">Menüye
                                                                        Ekle</a>
                                                                    <span class="spinner" id="spincustomu"></span>
                                                                </p>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                            </ul>
                                        </div>
                                    </form>

                                </div>
                                @endif
                                <div id="menu-management-liquid">
                                    <div id="menu-management">
                                        <form id="update-nav-menu" action="" method="post"
                                            enctype="multipart/form-data">
                                            <div class="menu-edit ">
                                                <div id="nav-menu-header">
                                                    <div class="major-publishing-actions">
                                                        <label class="menu-name-label howto open-label" for="menu-name">
                                                            <span>Menü Adı</span>
                                                            <input name="menu-name" id="menu-name" type="text"
                                                                class="menu-name regular-text menu-item-textbox"
                                                                title="Enter menu name"
                                                                value="@if(isset($indmenu)){{$indmenu->name}}@endif">
                                                            <input type="hidden" id="idmenu"
                                                                value="@if(isset($indmenu)){{$indmenu->id}}@endif" />
                                                        </label>

                                                        @if(request()->has('action'))
                                                        <div class="publishing-action">
                                                            <a onclick="createnewmenu()" name="save_menu"
                                                                id="save_menu_header"
                                                                class="button button-primary menu-save">Menü Oluştur</a>
                                                        </div>
                                                        @elseif(request()->has("menu"))
                                                        <div class="publishing-action">
                                                            <a onclick="getmenus()" name="save_menu"
                                                                id="save_menu_header"
                                                                class="button button-primary menu-save">Menüyü
                                                                Kaydet</a>
                                                            <span class="spinner" id="spincustomu2"></span>
                                                        </div>

                                                        @else
                                                        <div class="publishing-action">
                                                            <a onclick="createnewmenu()" name="save_menu"
                                                                id="save_menu_header"
                                                                class="button button-primary menu-save">Menü Oluştur</a>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div id="post-body">
                                                    <div id="post-body-content">

                                                        <ul class="menu ui-sortable" id="menu-to-edit">
                                                            @if(isset($menus))
                                                            @foreach($menus as $m)
                                                            <li id="menu-item-{{$m->id}}"
                                                                class="menu-item menu-item-depth-{{$m->depth}} menu-item-page menu-item-edit-inactive pending"
                                                                style="display: list-item;">
                                                                <dl class="menu-item-bar">
                                                                    <dt class="menu-item-handle">
                                                                        <span class="item-title"> <span
                                                                                class="menu-item-title"> <span
                                                                                    id="menutitletemp_{{$m->id}}">{{$m->label}}</span>
                                                                                <span
                                                                                    style="color: transparent;">|{{$m->id}}|</span>
                                                                            </span> <span class="is-submenu"
                                                                                style="@if($m->depth==0)display: none;@endif">Alt eleman</span>
                                                                        </span>
                                                                        <span class="item-controls"> <span
                                                                                class="item-type">Link</span> <span
                                                                                class="item-order hide-if-js"> <a
                                                                                    href="{{ $currentUrl }}?action=move-up-menu-item&menu-item={{$m->id}}&_wpnonce=8b3eb7ac44"
                                                                                    class="item-move-up"><abbr
                                                                                        title="Move Up">↑</abbr></a> |
                                                                                <a href="{{ $currentUrl }}?action=move-down-menu-item&menu-item={{$m->id}}&_wpnonce=8b3eb7ac44"
                                                                                    class="item-move-down"><abbr
                                                                                        title="Move Down">↓</abbr></a>
                                                                            </span> <a class="item-edit"
                                                                                id="edit-{{$m->id}}" title=" "
                                                                                href="{{ $currentUrl }}?edit-menu-item={{$m->id}}#menu-item-settings-{{$m->id}}">
                                                                            </a> </span>
                                                                    </dt>
                                                                </dl>

                                                                <div class="menu-item-settings"
                                                                    id="menu-item-settings-{{$m->id}}">
                                                                    <input type="hidden" class="edit-menu-item-id"
                                                                        name="menuid_{{$m->id}}" value="{{$m->id}}" />
                                                                    <p class="description description-thin">
                                                                        <label for="edit-menu-item-title-{{$m->id}}">
                                                                            Başlık
                                                                            <br>
                                                                            <input type="text"
                                                                                id="idlabelmenu_{{$m->id}}"
                                                                                class="widefat edit-menu-item-title"
                                                                                name="idlabelmenu_{{$m->id}}"
                                                                                value="{{$m->label}}">
                                                                        </label>
                                                                    </p>

                                                                    <p
                                                                        class="field-css-classes description description-thin">
                                                                        <label for="edit-menu-item-classes-{{$m->id}}">
                                                                            İkon
                                                                            <br>
                                                                            <input type="text"
                                                                                id="clases_menu_{{$m->id}}"
                                                                                class="widefat code edit-menu-item-classes"
                                                                                name="clases_menu_{{$m->id}}"
                                                                                value="{{$m->class}}">
                                                                        </label>
                                                                    </p>

                                                                    <p
                                                                        class="field-css-url description description-wide">
                                                                        <label for="edit-menu-item-url-{{$m->id}}"> Link
                                                                            <br>
                                                                            <input type="text" id="url_menu_{{$m->id}}"
                                                                                class="widefat code edit-menu-item-url"
                                                                                id="url_menu_{{$m->id}}"
                                                                                value="{{$m->link}}">
                                                                        </label>
                                                                    </p>

                                                                    <p
                                                                        class="field-move hide-if-no-js description description-wide">
                                                                        <label> <span>Taşı:</span> <a
                                                                                href="{{ $currentUrl }}"
                                                                                class="menus-move-up"
                                                                                style="display: none;">Yukarı</a> <a
                                                                                href="{{ $currentUrl }}"
                                                                                class="menus-move-down"
                                                                                title="Mover uno abajo"
                                                                                style="display: inline;">Aşağı</a>
                                                                            <a href="{{ $currentUrl }}"
                                                                                class="menus-move-left"
                                                                                style="display: none;"></a> <a
                                                                                href="{{ $currentUrl }}"
                                                                                class="menus-move-right"
                                                                                style="display: none;"></a> <a
                                                                                href="{{ $currentUrl }}"
                                                                                class="menus-move-top"
                                                                                style="display: none;">İlk Sıra</a> </label>
                                                                    </p>

                                                                    <div
                                                                        class="menu-item-actions description-wide submitbox">

                                                                        <a class="item-delete submitdelete deletion"
                                                                            id="delete-{{$m->id}}"
                                                                            href="{{ $currentUrl }}?action=delete-menu-item&menu-item={{$m->id}}&_wpnonce=2844002501">Sil</a>
                                                                        <span class="meta-sep hide-if-no-js"> | </span>
                                                                        <a class="item-cancel submitcancel hide-if-no-js button-secondary"
                                                                            id="cancel-{{$m->id}}"
                                                                            href="{{ $currentUrl }}?edit-menu-item={{$m->id}}&cancel=1424297719#menu-item-settings-{{$m->id}}">Vazgeç</a>
                                                                        <span class="meta-sep hide-if-no-js"> | </span>
                                                                        <a onclick="getmenus()"
                                                                            class="button button-primary updatemenu"
                                                                            id="update-{{$m->id}}"
                                                                            href="javascript:void(0)">Güncelle</a>

                                                                    </div>

                                                                </div>
                                                                <ul class="menu-item-transport"></ul>
                                                            </li>
                                                            @endforeach
                                                            @endif
                                                        </ul>
                                                        <div class="menu-settings">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="nav-menu-footer">
                                                    <div class="major-publishing-actions">

                                                        @if(request()->has('action'))
                                                        <div class="publishing-action">
                                                            <a onclick="createnewmenu()" name="save_menu"
                                                                id="save_menu_header"
                                                                class="button button-primary menu-save">Menü Oluştur</a>
                                                        </div>
                                                        @elseif(request()->has("menu"))
                                                        <span class="delete-action"> <a
                                                                class="submitdelete deletion menu-delete"
                                                                onclick="deletemenu()" href="javascript:void(9)">Menüyü
                                                                Sil</a> </span>
                                                        <div class="publishing-action">

                                                            <a onclick="getmenus()" name="save_menu"
                                                                id="save_menu_header"
                                                                class="button button-primary menu-save">Menüyü
                                                                Kaydet</a>
                                                            <span class="spinner" id="spincustomu2"></span>
                                                        </div>

                                                        @else
                                                        <div class="publishing-action">
                                                            <a onclick="createnewmenu()" name="save_menu"
                                                                id="save_menu_header"
                                                                class="button button-primary menu-save">Menü Oluştur</a>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="clear"></div>
                    </div>

                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>

            <div class="clear"></div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var menus = {
        "oneThemeLocationNoMenus": "",
        "moveUp": "Yukarı",
        "moveDown": "Aşağı",
        "moveToTop": "İlk Sıra",
        "moveUnder": "Move under of %s",
        "moveOutFrom": "%s elemanının altından çıkar",
        "under": "Under %s",
        "outFrom": "%s elemanının altından çıkar",
        "menuFocus": "%1$s. Element menu %2$d of %3$d.",
        "subMenuFocus": "%1$s. Menu of subelement %2$d of %3$s."
    };
    var arraydata = [];
    var addcustommenur = '{{ route("admin.menus.item.create") }}';
    var updateitemr = '{{ route("admin.menus.item.update")}}';
    var generatemenucontrolr = '{{ route("admin.menus.generate-menu-control") }}';
    var deleteitemmenur = '{{ route("admin.menus.item.delete") }}';
    var deletemenugr = '{{ route("admin.menus.delete") }}';
    var createnewmenur = '{{ route("admin.menus.create") }}';
    var csrftoken = "{{ csrf_token() }}";
    var menuwr = "{{ url()->current() }}";

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrftoken
        }
    });
</script>
<script type="text/javascript" src="{{asset('admin/js/menu-builder.js')}}"></script>
@endsection