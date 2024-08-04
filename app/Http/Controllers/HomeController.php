<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {

        $ids=[];

        $posts=Post::with('categories');
       
        $lastPosts=$posts->isOnline()->orderByDesc('id')->limit(4)->get();

        //Get last post ids
        $lastPostsId=$lastPosts->pluck('id')->toArray();

        $bigPosts=$posts->whereNotIn('id',$lastPostsId)->isOnline()->limit(2)->get();

        $bigPostsId=$bigPosts->pluck('id')->toArray();

        $ids=array_merge($lastPostsId,$bigPostsId);

        $oldPosts=$posts->whereNotIn('id',$ids)->isOnline()->limit(12)->get();

        
        $allCategories=Category::with('posts')->limit(12)->get();

        //Tranformation en json des postes du carousel
        $carouselData=$bigPosts->merge($lastPosts)->map(function(Post $post) {

            $date=now('africa/porto-novo')->setDateTimeFrom(new \DateTime($post->created_at))->translatedFormat('d M Y');

           return [
              'image'=>!empty($post->image)?asset('storage/'.$post->image):asset('logo.jpg'),
              'title'=>str()->limit($post->title,45) ,
              'date'=>$date,
              'url'=>route('home.show',['post'=>$post->id,'slug'=>str($post->title)->slug()]),
              'id'=>$post->id,
              'categories'=>$post->categories()->pluck('name')->toArray()
           ];

       });

        $carouselData=json_encode($carouselData);

        
        return view('webtv.home.home',['bigPosts'=>$bigPosts,'lastPosts'=>$lastPosts,'oldPosts'=>$oldPosts,'allCategories'=>$allCategories,'carouselData'=>$carouselData]);
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
