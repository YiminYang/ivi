<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Form;
use Illuminate\Support\Facades\Validator;

class Form_Controller extends Controller
{
    public function submitform(Request $request){
    	$validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(array('success' => $validator->errors()), 403);
        }
        else{
        	$form = new Form;
	    	$form->name = $request->input('name');
	    	$form->email = $request->input('email');
	    	$form->phone = $request->input('phone');
	    	$form->subject_of_inquiry = $request->input('inquiry');
	    	$form->message = $request->input('message');
	    	if(!$form->save()){
			    App::abort(500, 'Error');
			}
			else{
				return response()->json(array('success' => 'true'), 200);
			}
        }    		
	}
}
