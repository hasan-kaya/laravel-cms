<?php

namespace App\Libs;

use Illuminate\Http\Request;
use App\Models\Block as BlockModel;
use Illuminate\Support\Facades\View;

class Block
{

    public static function print(){

        $html = '';

        $blocks = BlockModel::where('status',1)->orderBy('rank','asc')->get();
        foreach($blocks as $block){
            $model = '\App\Models\\' . $block->model_name;

            $data = [];

            $data = $model::where([
                ['id', $block->model_id],
                ['status', 1]
            ])->first();

            $html .= View::make('front.blocks.'.$block->type->value)->with(compact('data','block'))->render();
        }

        return $html;

    }


    public static function print2()
    {
        $block = BlockModel::where('id', 1)->first();
        $model = '\App\Models\\' . $block->model_name;

        if ($block->model_name = 'Category') {

            preg_match('/\{loop\}(.*?)\{endloop\}/s', $block->content, $loop_content);

            $item_contents = '';
            $items = $model::where('id', $block->model_id)->first()->posts;
            foreach ($items as $item) {
                $item_content = $loop_content[1];
                $data = [
                    'image' => asset($item->image),
                    'title' => $item->name,
                    'description' => $item->description,
                    'link' => get_url($item->type->key, $item->slug),
                ];
                foreach ($data as $key => $val) {
                    $item_content = str_replace('{' . $key . '}', $val, $item_content);
                }

                preg_match_all('/\{trans.([A-Za-z0-9._ ]+?)\}/', $item_content, $localizations, PREG_SET_ORDER, 0);
                foreach ($localizations as $localization) {
                    $item_content = str_replace($localization[0], trans($localization[1]), $item_content);
                }

                $item_contents .= $item_content;
            }

            $block->content = str_replace($loop_content[0], $item_contents, $block->content);

            return $block->content;
        }
    }
}
