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
                                <form action="/" method="post">
                                    @csrf
                                    <label>
                                        <input type="text" placeholder="What do you need to do today?" required
                                               class="form-control todo-list-input" name="content" id="content">
                                    </label>
                                    <input type="submit" value="add"
                                           class="add btn btn-primary font-weight-bold todo-list-add-btn">
                                </form>
                            </div>
                            <div class="list-wrapper">
                                <ul class="d-flex flex-column-reverse todo-list">
                                    <!-- The Modal -->
                                    <div class="modal" id="myModal">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Delete</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    Do you want to delete this item ?
                                                </div>
                                                <p hidden id="id_to_delete"></p>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                                    <button type="button" class="btn btn-success" onclick="deleteNote()" >Yes</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
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
                                                <i onclick="showModal({{$note->id}})"  class="remove mdi mdi-close-circle-outline"></i>
                                            </li>
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
                                                <i onclick="showModal({{$note->id}})" class="remove mdi mdi-close-circle-outline"></i>
                                            </li>
                                        @endif


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
