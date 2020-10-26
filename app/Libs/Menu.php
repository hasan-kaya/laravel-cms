<?php

namespace App\Libs;

use App\Models\Menu as MenuModel;
use App\Models\MenuItem;

class Menu
{

    public static function get($slug)
    {
        $menu = MenuModel::where('slug', '=', $slug)->first();
        if(is_null($menu)){
            return ['name' => '', 'items' => []];
        }else{
            return [
                'name' => $menu->name,
                'items' => self::get_menu($menu->id),
            ];
        }
    }

    public static function get_menu($menu_id)
    {
        $menuItem = new MenuItem;
        $menu_list = $menuItem->getall($menu_id);

        $roots = $menu_list->where('menu_id', (integer) $menu_id)->where('parent', 0);

        $items = self::tree($roots, $menu_list);
        return $items;
    }

    private static function tree($items, $all_items)
    {
        $data_arr = array();
        $i = 0;
        foreach ($items as $item) {
            $data_arr[$i] = $item->toArray();
            $find = $all_items->where('parent', $item->id);

            $data_arr[$i]['child'] = array();

            if ($find->count()) {
                $data_arr[$i]['child'] = self::tree($find, $all_items);
            }

            $i++;
        }

        return $data_arr;
    }

}