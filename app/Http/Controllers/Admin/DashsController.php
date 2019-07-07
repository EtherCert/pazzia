<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class DashsController extends Controller
{
    /**-
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return __METHOD__;
        $users = User::simplePaginate(6);
        return view('admin.profile.index')->with('users', $users);
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id); //find with if
        $user->delete();
        return redirect(route('admin.profiles'))->with('message_flash', sprintf('User "%s" Deleted!', $user->name));
    }
}
