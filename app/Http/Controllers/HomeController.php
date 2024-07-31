<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
       
        $lastPosts=Post::with('categories')->isOnline()->orderByDesc('id')->limit(4)->get();

        //Get last post ids
        $ids=$lastPosts->pluck('id');

        $oldPosts=Post::with('categories')->whereNotIn('id',$ids)->isOnline()->limit(10)->get();

        $allCategories=Category::with('posts')->limit(12)->get();
        
        return view('webtv.home.home',['lastPosts'=>$lastPosts,'oldPosts'=>$oldPosts,'allCategories'=>$allCategories]);
    }

    public function show(Request $request,Post $post,String $slug) {

        if($post->getSlug() !== $slug) {
            return redirect()->route('home.show',['post'=>$post->id,'slug'=>$post->getSlug()]);
        }

        //Get next online poste
        $nextPost=Post::with('categories')->isOnline()->forPageAfterId(1,lastId:$post->id)->get()->first();

        //Get previous online poste
        $previousPost=Post::with('categories')->isOnline()->forPageBeforeId(1,lastId:$post->id)->get()->first();

      /*   $arr=[];
        $random=$post->categories->count()>=2?$post->categories->random(2):$post->categories;

        foreach($random as $key=>$categorie) {
            dump($categorie);

        } */
 
        return view('webtv.home.show',['post'=>$post,'nextPost'=>$nextPost,'previousPost'=>$previousPost]);
    }
}
