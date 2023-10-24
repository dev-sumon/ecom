<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    function index(){
        $s['users'] = User::all();
        return view('admin.users.index',$s);
    }
    function create(){
        return view('admin.users.create');
    }
    function store(UserRequest $req){
        // User::create([
        //     'name' => $req['name'],
        //     'email' => $req['email'],
        //     'role' => $req['role'],
        //     'billing_address' => $req['billing_address'],
        //     'shipping_address' => $req['shipping_address'],
        //     'password' => Hash::make($req['password']),
        // ]);

        $user = new User();

        if($req->hasFile('image')){
            $image = $req->file('image');
            $path = $image->store('user','public');
            $user->image = $path;
        }
        if($req->hasFile('cover_image')){
            $image = $req->file('cover_image');
            $path = $image->store('user/cover_image','public');
            $user->cover_image = $path;
        }

        $filteredBilling = array_filter($req->billing_address, function ($entry) {
            return isset($entry['billing']) && !is_null($entry['billing']);
        });
        $filteredShipping = array_filter($req->shipping_address, function ($entry) {
            return isset($entry['shipping']) && !is_null($entry['shipping']);
        });


        $user->name = $req->name;
        $user->email = $req->email;
        $user->role = $req->role;
        if($filteredBilling){
            $user->billing_address = json_encode($req->billing_address);
        }
        if($filteredShipping){
            $user->shipping_address = json_encode($req->shipping_address);
        }
        $user->password = Hash::make($req->password);
        $user->save();
        // return redirect()->route('user.index')->with('success','User Created Successfully');
        return redirect()->route('user.index')->withStatus(__('User Created Successfully'));

    }
    function view($id){
        $s['user'] = User::findOrFail($id);
        return view('admin.users.view',$s);
    }
    function edit($id){
        $s['user'] = User::findOrFail($id);
        return view('admin.users.edit',$s);
    }

    function update(UserRequest $req, $id){
        // User::create([
        //     'name' => $req['name'],
        //     'email' => $req['email'],
        //     'role' => $req['role'],
        //     'billing_address' => $req['billing_address'],
        //     'shipping_address' => $req['shipping_address'],
        //     'password' => Hash::make($req['password']),
        // ]);

        $filteredBilling = array_filter($req->billing_address, function ($entry) {
            return isset($entry['billing']) && !is_null($entry['billing']);
        });
        $filteredShipping = array_filter($req->shipping_address, function ($entry) {
            return isset($entry['shipping']) && !is_null($entry['shipping']);
        });

        $user = User::findOrFail($id);

        if($req->hasFile('image')){
            $image = $req->file('image');
            $path = $image->store('user','public');
            $this->fileDelete($user->image);
            $user->image = $path;
        }
        if($req->hasFile('cover_image')){
            $image = $req->file('cover_image');
            $path = $image->store('user/cover_image','public');
            $this->fileDelete($user->cover_image);
            $user->cover_image = $path;
        }



        $user->name = $req->name;
        $user->email = $req->email;
        $user->role = $req->role;
        if($filteredBilling){
            $user->billing_address = json_encode($req->billing_address);
        }
        if($filteredShipping){
            $user->shipping_address = json_encode($req->shipping_address);
        }
        $user->password = Hash::make($req->password);
        $user->update();
        return redirect()->route('user.index')->withStatus(__('User Updated Successfully'));;

    }
    function status($id){
        $user = User::findOrFail($id);
        $this->changeStatus($user);
        return redirect()->back()->withStatus(__('User Status Change Successfully'));;
    }
    function delete($id){
        $user = User::findOrFail($id);
        $this->fileDelete($user->image);
        $this->fileDelete($user->cover_image);
        $user->delete();
        return redirect()->route('user.index')->withStatus(__('User Deleted Successfully'));;
    }
}
