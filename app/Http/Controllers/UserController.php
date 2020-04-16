<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\UserHelper;
use Illuminate\Support\Facades\Hash;
use App\Users;

class UserController extends Controller
{
    protected $userHepler;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->userHelper = new UserHelper;
    }
    
    //

    public function createUser(Request $request)
    {   
        $data = $request->all();
       
            $this->validate($request, [
                'username' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required'
                ]);
        
            // Store User...
        
        // metrre les champs en required avec la methode validator lumen 
        // récupérer les $data

        return $this->userHelper->createUser($data);

    }

    public function getUser(Request $request, $idUser)
    {
        // tester si la valeur is_numeric

        if (is_numeric($idUser)) {
        return $this->userHelper->getUser($idUser);
        // sinon return false si ou continuer lexecution 
        }

        else{
            return false;
        }

    }

    public function updateUser(Request $request, $idUser)
    {   
        $data = $request->all();

        return $this->userHelper->updateUser($idUser);

    }

    public function getUsers()
    {
        return $this->userHelper->getUsers();

    }

    public function deleteUser(Request $request, $idUser)
    {
        $data = $request->all();

        return $this->userHelper->deleteUser($idUser);

    }


    public function authenticate(Request $request)
   {
       $this->validate($request, [
       'email' => 'required',
       'password' => 'required'
        ]);


     $user = Users::where('email', $request->input('email'))->where('password', $request->input('password'))->first();
     if($user){

          return response()->json(['success' => true]);

      }else{
          
        return response()->json(['success' => false]);
      }

 }




public function register(Request $request) {

    $data = $request->all();
    
    $this->validate($request, [
    'username' => 'required',
    'email' => 'required',
    'password' => 'required'
     ]);


  $user = Users::where('password', $request->input('password'))->where('email', $request->input('email'))->where('password', $request->input('password'))->first();
   
  
  return $this->userHelper->createUser($data);



}

}