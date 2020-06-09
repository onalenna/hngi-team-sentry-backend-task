<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\laravel;

class db_controller extends Controller
{
    //function
    public function __invoke(Request $request)
    {
        $input = $request->all(); //store the post values in input array
        $errors = array(); //inialize an empty array to store errors

        if(!isset($input['file_name'])) { //if file name is empty add error to errors array
            $errors[] = 'fill in the file name';
        }

        if(!isset($input['file_content'])) { ////if file content is empty add error to errors array
            $errors[] = 'fill in the file contents';
        }

        //if there are errors return error response
        if (sizeof($errors) > 0) {
            return json_encode(['code' => '400', 'errors' => $errors]);
        }

        else{
        	//insert data into database
           $data=DB::select("insert into laravel values $file_name,$file_content");}
    }
    //retrieve data from the database
    public function read(Request $request){

    	$data=DB::select("select * from hng_sentry_page");
    	//print the retrieved data
    	print_r($data->toArray());

    }
}
