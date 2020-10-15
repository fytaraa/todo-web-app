<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show(){
        $notes = Note::where('user_id' ,Auth::id())->orderBy('created_at','DESC')->get();
        $comments = Comment::all();
//        $notes = Note::all();
        return view('note',['notes'=>$notes, 'comments'=>$comments]);
    }
    public function add(){

        $note = new Note();
        $note->content = \request('content');
        $note->isChecked = 0;
        $note->user_id = Auth::id();
        $note->save();
        return redirect('/');
    }
    public function addComment(){

        $comments = new Comment();
        $comments->comment = \request('comment');
        $comments->note_id = \request('note_id');
        $comments->save();
        return redirect('/');
    }
    public function update($id,$checked){

        $note = Note::find($id);
        $note->isChecked = $checked;
        $note->save();
        return redirect('/');
    }
    public function delete($id){
        Note::find($id)->delete();
        Comment::where('note_id',$id)->delete();
        return redirect('/');
    }
}
