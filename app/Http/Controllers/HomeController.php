<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {

        $ids=[];
       
        $lastPosts=Post::with('categories')->isOnline()->orderByDesc('id')->limit(4)->get();

        //Get last post ids
        $lastPostsId=$lastPosts->pluck('id')->toArray();

        $bigPosts=Post::with('categories')->whereNotIn('id',$lastPostsId)->isOnline()->limit(2)->get();

        $bigPostsId=$bigPosts->pluck('id')->toArray();

        $ids=array_merge($lastPostsId,$bigPostsId);

        $oldPosts=Post::with('categories')->whereNotIn('id',$ids)->isOnline()->limit(12)->get();

       

        $allCategories=Category::with('posts')->limit(12)->get();

        
        return view('webtv.home.home',['bigPosts'=>$bigPosts,'lastPosts'=>$lastPosts,'oldPosts'=>$oldPosts,'allCategories'=>$allCategories]);
    }

    public function showPlus() {

        $allPosts=Post::with('categories')->isOnline()->orderByDesc('created_at')->paginate('25');


        return view('webtv.home.show_plus',['allPosts'=>$allPosts]);
    }

    public function showCategory(Request $request,Category $category,string $name) {

       if($name !== $category->name) {
            return to_route('home.show.category',['category'=>$category->id,'name'=>$category->name]);
       }

       $allPosts=$category->posts()->isOnline()->paginate('20');

        return view('webtv.home.show_category',['allPosts'=>$allPosts,'category'=>$category]);
    }

    public function show(Request $request,Post $post,String $slug) {

        if($post->getSlug() !== $slug) {
            return redirect()->route('home.show',['post'=>$post->id,'slug'=>$post->getSlug()]);
        }

        //Get next online poste
        $nextPost=Post::with('categories')->isOnline()->forPageAfterId(1,lastId:$post->id)->get()->first();

        //Get previous online poste
        $previousPost=Post::with('categories')->isOnline()->forPageBeforeId(1,lastId:$post->id)->get()->first();

        //Get current Post categories name
        $categoriesName=$post->categories()->pluck('name')->toArray();
        
        //Get same categories posts
        $otherPosts=Post::with('categories')->where('id','!=',$post->id)->isOnline()->whereRelation('categories','name','=',$categoriesName)->limit(6)->get();

        return view('webtv.home.show',['post'=>$post,'nextPost'=>$nextPost,'previousPost'=>$previousPost,'otherPosts'=>$otherPosts]);
    }
}
