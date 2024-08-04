<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMessageFormRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function create(Request $request,Message $message) {

        return view('webtv.message.message',[
            'message'=>$message
        ]);
    }

    public function store(CreateMessageFormRequest $request) {

        $data=$request->validated();
        /* $data['isOnline']=$request->validated('isOnline')??0; */
        $message=Message::create($data);

        return $message->exists()?
        redirect()->route('dashboard')->with('success',"Le message à bien été creer"):
        redirect()->route('dashboard')->with('error',"Une erreur est survenu essayer plus tard");
    }

    public function update(CreateMessageFormRequest $request,Message $message) {
        $data=$request->validated();
        
        $data['isOnline']=$request->validated('isOnline')??0;
        
        $isOk=$message->update($data);

        return $isOk?
        redirect()->route('dashboard')->with('success',"Le message  à bien été modifier"):
        redirect()->route('dashboard')->with('error',"Une erreur est survenu essayer plus tard");
    }

    public function delete(Request $request,Message $message) {

        $isOk=$message->delete();

        return $isOk?
        redirect()->route('dashboard')->with('success',"Le message  à bien été supprimer"):
        redirect()->route('dashboard')->with('error',"Une erreur est survenu essayer plus tard");

    }
}
