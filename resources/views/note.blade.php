@extends('layouts.app')
@section('content')
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="card px-3">
                        <div class="card-body">
                            <h4 class="card-title">Awesome Todo list</h4>
                            <div class="add-items d-flex">
                                <form action="/" method="post" style="width:100%">
                                    @csrf
                                    <label>
                                        <input type="text" placeholder="To-Do ...." required
                                               class="form-control todo-list-input"   name="content" id="content">
                                    </label>
                                    <input type="submit" value="add"
                                           class="add btn btn-primary font-weight-bold todo-list-add-btn">
                                </form>
                            </div>
                            <!-- The Modal -->
                            <div class="modal" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Delete</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;
                                            </button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            Do you want to delete this item ?
                                        </div>
                                        <p hidden id="id_to_delete"></p>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                No
                                            </button>
                                            <button type="button" class="btn btn-success"
                                                    onclick="deleteNote()">Yes
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="list-wrapper">
                                <ul class="d-flex flex-column todo-list" >

                                    @foreach($notes as $note)

                                        @if($note->isChecked == 0)
                                            <li id="{{$note->id . "item"}}">
                                                <div class="form-check"><label class="form-check-label"> <input
                                                            class="checkbox"
                                                            type="checkbox"
                                                            onclick="checkItem({{$note->id}},{{$note->isChecked}})"
                                                            id="{{$note->id}}">
                                                        {{$note->content}}<i
                                                            class="input-helper"></i></label></div>

                                        @else
                                            <li class="completed" id="{{$note->id . "item"}}">
                                                <div class="form-check"><label class="form-check-label"> <input
                                                            class="checkbox"
                                                            type="checkbox"
                                                            checked=""
                                                            onclick="checkItem({{$note->id}},{{$note->isChecked}})"
                                                            id="{{$note->id}}">
                                                        {{$note->content}}<i
                                                            class="input-helper"></i></label></div>

                                            @endif
                                            <!-- Comments Section-->
                                                <img id="{{$note->id}}commentsIcon"
                                                     src="images/keyboard_arrow_down-24px.svg" alt="open comments"
                                                     onclick="showComment({{$note->id}})">
                                                <i onclick="showModal({{$note->id}})"
                                                   class="remove mdi mdi-close-circle-outline"></i>

                                            </li>
                                            <div id="{{$note->id}}commentSection" class="comment-section">
                                                <form action="/addComment" method="post" class="{{$note->id}}">
                                                    @csrf
                                                    <label>
                                                        <input style="border:none; text-decoration-color: gray"
                                                               type="text" placeholder="type your comment" required
                                                               class="form-control todo-list-input " name="comment"
                                                               id="comment">
                                                    </label>
                                                    <input type="hidden" name="note_id" value="{{$note->id}}">
                                                    <input hidden class="btn btn-outline-dark" style="border: none"
                                                           type="submit" value="add comment"
                                                    >
                                                </form>

                                                    @foreach($comments as $comment)

                                                        @if($comment->note_id == $note->id)
                                                        <div class="comment-widgets {{$comment->id}} {{$note->id}} ">
                                                            <!-- Comment Row -->
                                                            <div class="d-flex flex-row comment-row m-t-0">

                                                                <div class="comment-text w-100">
                                                                  <span class="m-b-15 d-block">{{$comment->comment}}</span>
                                                                    <div class="comment-footer"> <span class="text-muted float-right">{{$comment->created_at}}</span>
                                                                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteComment({{$comment->id}})">Delete</button> </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        @endif

                                                    @endforeach


                                            </div>

                                            @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
