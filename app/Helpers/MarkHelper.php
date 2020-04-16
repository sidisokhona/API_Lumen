<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class MarkHelper
{

    public function __construct()
    {
    }

    public function createMark($data = array())
    {   
        
        $status =  DB::table('mark')->insert(
            ['atitude' => $data['atitude'], 'longitude' => $data['longitude'], 'postal_code'  => $data['postal_code'], 'description'  => $data['description']]);
        return response()->json(array('success' => $status, 'message' => 'Mark has been inserted'));
    }

    public function deleteMark($idMark, $data = array())
    {
       
        $status = DB::table('mark')->where('id', $idMark)->delete();
       
        return response()->json(array('success' => $status, 'message' => 'Mark has been delated'));

    
    }

    public function updateMark($idMark, $data = array())
    {  
        $dataToUpdate = [];
        
        if(isset($data['atitude']) && !empty($data['atitude'])){
            $dataToUpdate['atitude'] = $data['atitude'];
        }
        
        if(isset($data['longitude']) && !empty($data['longitude'])){
            $dataToUpdate['longitude'] = $data['longitude'];
        }


        if(isset($data['postal_code']) && !empty($data['postal_code'])){
            $dataToUpdate['postal_code'] = $data['postal_code'];


        }

        if(isset($data['description']) && !empty($data['description'])){
            $dataToUpdate['description'] = $data['description'];
            

        }
        

       $status =  DB::table('mark')
            ->where('id', $idMark)
            ->update($dataToUpdate);
        return response()->json(array('success' => $status, 'data' => $data, 'message' => 'Mark has been updated'));

    }



    public function getMarks()
    {
        return DB::table('mark')->select('*')->get();

    } 
    
    public function getMark($idMark, $data = array())
    {
        return DB::table('mark')->select('*')->where('id', $idMark)->get();

    }
    
}
