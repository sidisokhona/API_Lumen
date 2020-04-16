<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class UserHelper
{

    public function __construct()
    {
    }

    public function createUser($data = array())
    {   
        
        $status =  DB::table('users')->insert(
            ['username' => $data['username'], 'email' => $data['email'], 'password'  => $data['password']]);
        return response()->json(array('success' => $status, 'message' => 'User has been inserted'));
    }

    public function deleteUser($idUser, $data = array())
    {
       
        $status = DB::table('users')->where('id', $idUser)->delete();
       
        return response()->json(array('success' => $status, 'message' => 'User has been delated'));

    
    }

    public function updateUser($idUser, $data = array())
    {  
        $dataToUpdate = [];
        
        if(isset($data['username']) && !empty($data['username'])){
            $dataToUpdate['username'] = $data['username'];
        }
        
        if(isset($data['email']) && !empty($data['email'])){
            $dataToUpdate['email'] = $data['email'];
        }


        if(isset($data['password']) && !empty($data['password'])){
            $dataToUpdate['password'] = $data['password'];

        }
        

       $status =  DB::table('users')
            ->where('id', $idUser)
            ->update($dataToUpdate);
        return response()->json(array('success' => $status, 'data' => $data, 'message' => 'User has been updated'));

    }



    public function getUsers()
    {
        return DB::table('users')->select('*')->get();

    } 
    
    public function getUser($idUser, $data = array())
    {
        return DB::table('users')->select('*')->where('id', $idUser)->get();

    }
    
}
