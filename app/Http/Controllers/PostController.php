<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostFormRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function create(Request $request,Post $post) {
      
        //dump(strlen('https://www.youtube.com/embed?listType=playlist&list=PLfMtaxy5o9nFhnrqtNuBLsp6g0APQynmI&v=c2wMUEQZoAeIEUnY&loop=1&autoplay=1&mute=1'));


        $categories=Category::all();
        
        return view('webtv.post.post',['post'=>$post,'categories'=>$categories]);
    }

    public function update(UpdatePostFormRequest $request,Post $post) {
        $data=$request->validated();

        $data['isOnline']=$request->validated('isOnline')??0;
            
        $img=$request->validated('image');
        $data['image']=$this->uploadImage($img,$post);

        $postIsUpdated=$post->update($data);

        $isOk=false;
        if($postIsUpdated) {
            $ids=$data['categories'];

            $isOk=$post->categories()->sync($ids);
        }

        return $isOk?
        redirect()->route('dashboard')->with('success',"Mise a jour reussi"):
        redirect()->route('dashboard')->with('error',"Une erreur est survenu essayer plus tard");
        
    }

    public function store(CreatePostRequest $request) {
        $data=$request->validated();

        $data['image']=null;

        $post=Post::create($data);

        //Upload de fichier
        $fileUploaded=null;
        if($post) {
   
            $img=$request->validated('image');
            $fileUploaded=$this->uploadImage($img,$post);

        }

        //Enregistrement de path dans la DB
        if($fileUploaded) {
            $post->image=$fileUploaded;
            $post->save();
        }

        //Association categorie-poste
        if($post) {
            $ids=$data['categories'];
            $post->categories()->attach($ids);
        }

        return $post?
        redirect()->route('dashboard')->with('success',"Un nouveau poste a bien été ajouter"):
        redirect()->route('dashboard')->with('error',"Une erreur est survenu essayer plus tard");

       
    }

    public function delete(Request $request,Post $post) {
       
        
        if($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $isOk=$post->delete();
        

        return $isOk?
        redirect()->route('dashboard')->with('success',"Le poste a bien été supprimer"):
        redirect()->route('dashboard')->with('error',"Une erreur est survenu essayer plus tard");
    }

    private function uploadImage(?UploadedFile $image=null,Post $post):string|null {

        $imagePath=$post->image;

        //Case image is uploades 

        if( 
            $image && 
            $image->isValid() && 
            $image->getError()===UPLOAD_ERR_OK &&
            empty($post->image)
        ) {
            $imagePath=$image->store('/images','public');

            return $imagePath;

        }

        


        //Case:image is uploaded and old image exist in DB
  
         if( 
            $image && 
            $image->isValid() && 
            $image->getError()===UPLOAD_ERR_OK &&
            !empty($post->image)
        ) {


            Storage::disk('public')->delete($post->image);

            $imagePath=$image->store('/images','public');

            return $imagePath;

        } 

        return $imagePath;

       

    }
}
