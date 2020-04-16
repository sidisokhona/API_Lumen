<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ScoreHelper;

class ScoreController extends Controller
{
    protected $scoreHepler;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->scoreHelper = new ScoreHelper;
    }
    
    //

    public function createScore(Request $request)
    {   
        $data = $request->all();
       
            $this->validate($request, [
                'type' => 'required',
                'score' => 'required',
                'id_users' => 'required'
                ]);
        
            // Store User...
        
        // metrre les champs en required avec la methode validator lumen 
        // récupérer les $data

        return $this->scoreHelper->createScore($data);

    }

    public function getScore(Request $request, $id_users)
    {
        // tester si la valeur is_numeric

        if (is_numeric($id_users)) {
        return $this->scoreHelper->getScore($id_users);
        // sinon return false si ou continuer lexecution 
        }

        else{
            return false;
        }

    }

    public function updateScore(Request $request, $id_users)
    {   
        $data = $request->all();

        return $this->scoreHelper->updateScore($id_users);

    }

    public function getScores()
    {
        return $this->scoreHelper->getScores();

    }

    public function deleteScore(Request $request, $id_users)
    {
        $data = $request->all();

        return $this->scoreHelper->deleteScore($id_users);

    }


}
