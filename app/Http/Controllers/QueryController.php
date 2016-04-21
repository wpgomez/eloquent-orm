<?php

namespace EloquentORM\Http\Controllers;

use Illuminate\Http\Request;

use EloquentORM\Http\Requests;
use EloquentORM\Http\Controllers\Controller;
use EloquentORM\User;

class QueryController extends Controller
{
    public function getAll() {
        $users = User::all();

        return view('query.all',compact('users'));
    }
}
