<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuItem;

class MenuController extends Controller
{
    
    public function render()
    {
        $menu = new Menu();
        $menuitems = new MenuItem();
        $menulist = $menu->get();
        $menulist = $menulist->pluck('name', 'id')->prepend('Seçiniz', 0)->all();

        $menu_list_html = $this->select('menu', $menulist);

        if ((request()->has("action") && empty(request()->input("menu"))) || request()->input("menu") == '0') {
            return view('admin.menus',compact('menulist' , 'menu_list_html'));
        } else {
            $menu = Menu::find(request()->input("menu"));
            $menus = $menuitems->getall(request()->input("menu"));
            $data = ['menu_list_html'=> $menu_list_html, 'menus' => $menus, 'indmenu' => $menu, 'menulist' => $menulist];
            return view('admin.menus', $data);
        }

    }

    public function create_new_menu()
    {
        $menu = new Menu();
        $menu->name = request()->input("menuname");
        $menu->save();
        return json_encode(array("resp" => $menu->id));
    }

    public function add_menu_item(Request $request){
        $request->validate([
            'labelmenu' => 'required',
            'linkmenu' => 'required',
        ]);

        $menuitem = new MenuItem();
        $menuitem->label = request()->input("labelmenu");
        $menuitem->link = request()->input("linkmenu");
        $menuitem->menu_id = request()->input("idmenu");
        $menuitem->sort = MenuItem::getNextSortRoot(request()->input("idmenu"));
        $menuitem->save();
    }

    public function update_item(){
        $arraydata = request()->input("arraydata");
        if (is_array($arraydata)) {
            foreach ($arraydata as $value) {
                $menuitem = MenuItem::find($value['id']);
                $menuitem->label = $value['label'];
                $menuitem->link = $value['link'];
                $menuitem->icon = $value['class'];
                $menuitem->save();
            }
        } else {
            $menuitem = MenuItem::find(request()->input("id"));
            $menuitem->label = request()->input("label");
            $menuitem->link = request()->input("url");
            $menuitem->icon = request()->input("clases");
            $menuitem->save();
        }
    }

    public function generate_menu_control(){
        $menu = Menu::find(request()->input("idmenu"));
        $menu->name = request()->input("menuname");

        $menu->save();
        if (is_array(request()->input("arraydata"))) {
            foreach (request()->input("arraydata") as $value) {

                $menuitem = MenuItem::find($value["id"]);
                $menuitem->parent = $value["parent"];
                $menuitem->sort = $value["sort"];
                $menuitem->depth = $value["depth"];
                $menuitem->save();
            }
        }
        echo json_encode(array("resp" => 1));
    }

    public function select($name = "menu", $menulist = array())
    {
        $html = '<select name="' . $name . '">';

        foreach ($menulist as $key => $val) {
            $active = '';
            if (request()->input('menu') == $key) {
                $active = 'selected="selected"';
            }
            $html .= '<option ' . $active . ' value="' . $key . '">' . $val . '</option>';
        }
        $html .= '</select>';
        return $html;
    }

    public function delete_item()
    {
        $menuitem = MenuItem::find(request()->input("id"));
        $menuitem->delete();
    }

    public function delete_menu()
    {
        $menus = new MenuItem();
        $getall = $menus->getall(request()->input("id"));
        if (count($getall) == 0) {
            $menudelete = Menu::find(request()->input("id"));
            $menudelete->delete();
            return json_encode(array("resp" => "you delete this item"));
        } else {
            return json_encode(array("resp" => "You have to delete all items first", "error" => 1));
        }
    }

}