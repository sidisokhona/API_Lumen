<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class ScoreHelper
{

    public function __construct()
    {
    }

    public function createScore($data = array())
    {   
        
        $status =  DB::table('score')->insert(
            ['type' => $data['type'], 'score' => $data['score'], 'id_users' => $data['id_users']]);
        return response()->json(array('success' => $status, 'message' => 'Score has been inserted'));
    }

    public function deleteScore($id_users, $data = array())
    {
       
        $status = DB::table('score')->where('id_users', $id_users)->delete();
       
        return response()->json(array('success' => $status, 'message' => 'Score has been delated'));

    
    }

    public function updateScore($id_users, $data = array())
    {  
        $dataToUpdate = [];
        
        if(isset($data['type']) && !empty($data['type'])){
            $dataToUpdate['type'] = $data['type'];
        }
        
        if(isset($data['score']) && !empty($data['score'])){
            $dataToUpdate['score'] = $data['score'];
        }

        if(isset($data['id_users']) && !empty($data['id_users'])){
            $dataToUpdate['id_users'] = $data['id_users'];
        }


        
        

       $status =  DB::table('score')
            ->where('id_users', $id_users)
            ->update($dataToUpdate);
        return response()->json(array('success' => $status, 'data' => $data, 'message' => 'Score has been updated'));

    }



    public function getScores()
    {
        return DB::table('score')->select('*')->get();

    } 
    
    public function getScore($id_users, $data = array())
    {
        return DB::table('score')->select('*')->where('id', $id_users)->get();

    }
    
}
