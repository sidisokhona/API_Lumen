<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\MarkHelper;

class MarkController extends Controller
{
    protected $markHepler;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->markHelper = new MarkHelper;
    }
    
    //

    public function createMark(Request $request)
    {   
        $data = $request->all();
       
            $this->validate($request, [
                'atitude' => 'required',
                'longitude' => 'required',
                'postal_code' => 'required',
                'description' => 'required'
                ]);
        
            // Store User...
        
        // metrre les champs en required avec la methode validator lumen 
        // récupérer les $data

        return $this->markHelper->createMark($data);

    }

    public function getMark(Request $request, $idMark)
    {
        // tester si la valeur is_numeric

        if (is_numeric($idMark)) {
        return $this->markHelper->getMark($idMark);
        // sinon return false si ou continuer lexecution 
        }

        else{
            return false;
        }

    }

    public function updateMark(Request $request, $idMark)
    {   
        $data = $request->all();

        return $this->markHelper->updateMark($idMark);

    }

    public function getMarks()
    {
        return $this->markHelper->getMarks();

    }

    public function deleteMark(Request $request, $idMark)
    {
        $data = $request->all();

        return $this->markHelper->deleteMark($idMark);

    }


}
