<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    use PasswordValidationRules;

    public function settings(){
        return view('user.settings');
    }

    public function update(Request $request){

        $user = Auth::user();
        $id = $user->id;

        $validate = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'nick' => 'required|string|max:255|unique:users,nick,'.$id,
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            //'password' => $this->passwordRules(),
        ]);


        $name = $request->input('name');
        $surname = $request->input('surname');
        $nick = $request->input('nick');
        $email = $request->input('email');

        $profile_image = $request->file('profile_image');
        if($profile_image){
            $image_path = time().$profile_image->getClientOriginalName();
            Storage::disk('user')->put($image_path,File::get($profile_image));
            $user->image = $image_path;
        }

        $user->name = $name;
        $user->surname = $surname;
        $user->nick = $nick;
        $user->email = $email;

        $user->update();

        return redirect()->route('settings')->with(['message'=>'Usuario actualizado correctamente']);
    }

    public function getImage($filename){
        $file = Storage::disk('user')->get($filename);
        return new Response($file,200);
    }
}
