<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//追加
use Illuminate\Support\Facades\HTML;
use App\News;
use App\Profile;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        //sortBy(‘xxx’)：xxxで昇順に並べ換える。
        //sortByDesc(‘xxx’)：xxxで降順に並べ換える
        
        $posts = News::all()->sortByDesc('updated_at');

        if (count($posts) > 0) {
            //shift()メソッドは、配列の最初のデータを削除し、その値を返すメソッドです。
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        // news/index.blade.php ファイルを渡している
        // また View テンプレートに headline、 posts、という変数を渡している
        return view('news.index', ['headline' => $headline, 'posts' => $posts]);
    }
    
    
    
    
    public function profile(Request $request){
        $posts=Profile::all()->sortByDesc('updated_at');
         return view('admin.news.profile', ['posts' => $posts]);
    }
}
