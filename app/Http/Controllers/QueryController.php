<?php

namespace EloquentORM\Http\Controllers;

use Illuminate\Http\Request;

use EloquentORM\Http\Requests;
use EloquentORM\Http\Controllers\Controller;
use EloquentORM\User;

class QueryController extends Controller
{
    public function eloquentAll() {
        $users = User::all();
        $title = "Todos los usuarios (ALL)";

        return view('query.methods',compact('title','users'));
    }

    public function eloquentGet($gender) {
        $users = User::where('gender',$gender)
            ->get();
        $title = "Lista de usuarios (GET)";
        if($gender=='f'){
            $title = "Lista de usuarios (Femenina) (GET)";
        }
        if($gender=='m'){
            $title = "Lista de usuarios (Masculino) (GET)";
        }

        return view('query.methods',compact('title','users'));
    }

    public function eloquentGetCustom() {
        $users = User::where('gender','f')
            ->get(['id','name','biography']);
        $title = "Lista de usuarios (GET Custom - con Array)";

        return view('query.methods',compact('title','users'));
    }

    public function eloquentDelete($id) {
        $user = User::find($id);
        $user->delete();
        return view('pages.delete');
    }

    public function eloquentLists() {
        $users = User::orderBy('name','ASC')
            ->lists('name', 'id');

        return view('query.lists',compact('users'));
    }

    public function eloquentFirstLast() {
        $first = User::first();
        $all = User::all();
        $last = $all->last();

        return view('query.first-last', compact('first', 'last'));
    }

    public function eloquentPaginate() {
        $users = User::orderBy('id','DESC')
            ->paginate();

        return view('query.paginate',compact('users'));
    }
}
