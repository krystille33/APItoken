<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\jobapplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Flash;
use Response;

class JobapplicationController extends Controller {
    public $successStatus = 200;

    public function getAllJobapplication(Request $request) {
        $token = $request['t']; // t = token
        $userid = $request['u']; // u = userid

        $user = User::where('id', $userid)->where('remember_token', $token)->first();

        if ($user != null) {
            $jobapplication = jobapplication::all();

            return response()->json($jobapplication, $this->successStatus);
        } else {
            return response()->json(['response' => 'Bad Call'], 501);
        }        
    }  
    
    public function getJobapplication(Request $request) {
        $id = $request['pid']; // pid = jobapplication id
        $token = $request['t']; // t = token
        $userid = $request['u']; // u = userid

        $user = User::where('id', $userid)->where('remember_token', $token)->first();

        if ($user != null) {
            $jobapplication = jobapplication::where('id', $id)->first();

            if ($jobapplication != null) {
                return response()->json($jobapplication, $this->successStatus);
            } else {
                return response()->json(['response' => 'Jobapplication not found!'], 404);
            }            
        } else {
            return response()->json(['response' => 'Bad Call'], 501);
        }  
    }

    public function searchJobapplication(Request $request) {
        $params = $request['p']; // p = params
        $token = $request['t']; // t = token
        $userid = $request['u']; // u = userid

        $user = User::where('id', $userid)->where('remember_token', $token)->first();

        if ($user != null) {
            $jobapplication = jobapplication::where('firstname', 'LIKE', '%' . $params . '%')
                ->orWhere('lastname', 'LIKE', '%' . $params . '%')
                ->get();
            // SELECT * FROM jobapplication WHERE description LIKE '%params%' OR title LIKE '%params%'
            if ($jobapplication != null) {
                return response()->json($jobapplication, $this->successStatus);
            } else {
                return response()->json(['response' => 'Jobapplication not found!'], 404);
            }            
        } else {
            return response()->json(['response' => 'Bad Call'], 501);
        }  
    }
}