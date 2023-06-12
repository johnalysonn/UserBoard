<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home(User $user){
        if(Auth::check()){
            $user_auth = Auth::user();
            $users = $user->all();

            return view('home', ['users' => $users, 'user_auth' => $user_auth]);
        }
        $users = $user->all();

        return view('home', ['users' => $users]);
    }
    public function create(){
        return view('formCreate');
    }
    public function store(Request $request){
        $data = [
            'name' => $request->name,
            'email' => $request -> email,
            'password' =>  bcrypt($request ->password)
        ];

        $user = new User($data);

        $user -> save();
        $create['success'] = true;
        $create['message'] = 'Usuário cadastrado com sucesso';

        echo json_encode($create);

        // return redirect()->route('home')->with('msg', 'Usuário cadastrado com sucesso');
        return;
    }
    public function edit(User $user_id){
      
        return view('formEdit', ['user' => $user_id]);
    }
    public function update(User $user_id, Request $request){
        $user_id ->name = $request->name;
        $user_id ->email = $request -> email;
        $user_id ->password =  bcrypt($request -> password);

        $user_id -> update();
        $update['success'] = true;
        $update['message'] = 'Usuário atualizado com sucesso';
        echo json_encode($update);

        return;
        // return redirect() -> route('home')->with('msg', 'Usuário atualizado com sucesso');
    }
    public function destroy(User $user_id){
        if(Auth::check()==true){
            if ($user_id->id === Auth::user()->id) {
                $user_id -> delete();
                $destroy['success'] = true;
                $destroy['message'] = 'O usuário que estava logado foi deletado, faça login novamente ou cadastre outra conta.';
                echo json_encode($destroy);

                return;
                // return redirect() -> route('home')->with('msg', 'O usuário que estava logado foi deletado, faça login novamente ou cadastre outra conta.');
            }
            else{
                $user_id -> delete();
                $destroy['success'] = true;
                $destroy['message'] = 'Usuário deletado com sucesso';
                echo json_encode($destroy);
    
                return;
            }
        }
        else{
            $user_id -> delete();
            $destroy['success'] = true;
            $destroy['message'] = 'Usuário deletado com sucesso';
            echo json_encode($destroy);

            return;

            // return redirect() -> route('home')->with('msg', 'Usuário deletado com sucesso');
        }
    }

    public function login(){
        return view('formLogin');
    }
    public function login_do(Request $request){
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        // dd($data);
        if(Auth::attempt($data)){
            // return redirect()->intended('/')->with('msg', 'Login realizado');
            $login['success'] = true;
            $login['message'] = 'Login realizado';

            echo json_encode($login);
            
            // return with('msg', 'Login realizado');
            return;

        }else{
            $login['success'] = false;
            $login['message'] = 'Erro ao realizar o login';

            echo json_encode($login);

            return;
        }
        
    }
    public function logout(){
        Auth::logout();

        return redirect()->route('home')->with('msg', 'Deslogamento concluído');
    }
    public function list(){
        $users = User::all();

        return view('listUsers', ['users' => $users]);
    }
}
