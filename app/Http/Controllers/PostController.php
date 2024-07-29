<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function create() {
      
        //dump(strlen('https://www.youtube.com/embed?listType=playlist&list=PLfMtaxy5o9nFhnrqtNuBLsp6g0APQynmI&v=c2wMUEQZoAeIEUnY&loop=1&autoplay=1&mute=1'));
        return view('webtv.post.post');
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

    private function uploadImage(?UploadedFile $image=null,Post $post):string|null {

        $imagePath=null;

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
