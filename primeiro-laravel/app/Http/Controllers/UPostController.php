<?php

namespace App\Http\Controllers;

use App\Models\Upost;
use Illuminate\Http\Request;

class UPostController extends Controller
{
    public function deletePost(Upost $posts){
        if(auth()->user()->id === $posts['user_id']){
            $posts->delete();
        }
        return redirect('/');


    }

    public function actuallyUpdatePost(Upost $posts, Request $request){
        if(auth()->user()->id !== $posts['user_id']){
            return redirect('/');
        }
        $incomingFields = $request->validade([
            'title' =>'required',
            'body' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        $posts->update($incomingFields);
        return redirect('/');
    }
    public function showEditScreen(Upost $posts){

        if(auth()->user()->id !== $posts['user_id']){
            return redirect('/');
        }

        return  view('edit-post', ['post' => $posts]);
    }

    public function createPost(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id();

        Upost::create($incomingFields);

        return redirect('/');
    }
}
