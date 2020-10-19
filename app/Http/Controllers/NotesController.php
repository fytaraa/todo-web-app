<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Constraint\Count;

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
    public function dashboard(){
        $users = User::where('isAdmin',1)->get();
        $numOfUsers = Count(User::all());
        $numOfNotes = Count(Note::all());
        $numOfComments = Count(Comment::all());
        if (Auth::user()->isAdmin == 1){
            return view('dashboard',['numOfUsers' =>$numOfUsers,'numOfNotes'=>$numOfNotes,'numOfComments'=>$numOfComments,'users'=>$users]);
        }
        return $this->show();
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
    public function deleteComment($commentId){
        Comment::find($commentId)->delete();
        return redirect('/');
    }
    public function removeAdmin($user_id){
        $user = User::find($user_id);
        $user->isAdmin = 0;
        $user->save();
        return redirect('/admin');
    }
    public function addAdmin(){
        $email = \request('email');
        $user = User::where('email',$email)->first();
        $user->isAdmin = 1;
        $user->save();
        return redirect('/admin');
    }
}
