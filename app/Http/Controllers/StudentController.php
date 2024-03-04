<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Validator;

class StudentController extends Controller
{
    //Get all students
    public function getAllStudents(){
        $students = Student::all();
        $data = [
            'status' => 200,
            'student'=> $students
        ];

        return response()->json($data, 200);
    }



    //Get student by id
    public function getStudent($id){
        $student = Student::find($id);
        if($student == null){
            $data = [
                'status'=> 404,
                'message'=> 'Student not found'
            ];
            return response()->json($data, 404);

        }else{
            $data = [
                'status'=> 200,
                'Student'=> $student
            ];
            return response()->json($data, 200);
        } 
    }



    //Create new Student
    public function create(Request $request){
        $validator = Validator::make($request->all(), 
        [
        'name'=> 'required',
        'email'=> 'required',
        'phone'=>'required',
        ]);

        if ($validator->fails()) {
            $data= [
                'status' => 422,
                'message' => $validator->messages()
            ];
            return response()->json($data, 422);
        }
        else{
            $student = new Student;
            $student->name = $request->name;
            $student->email = $request->email;
            $student->phone = $request->phone;

            $student->save();
            $data = [
                'status'=> 200,
                'message'=> 'Student saved'
            ];
            return response()->json($data, 200);

        }
    }



    //Update Student
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), 
        [
        'name'=> 'required',
        'email'=> 'required'
        ]);

        if ($validator->fails()) {
            $data= [
                'status' => 422,
                'message' => $validator->messages()
            ];
            return response()->json($data, 422);
        }
        else{
            $student = Student::find($id);
            $student->name = $request->name;
            $student->email = $request->email;
            $student->phone = $request->phone;

            $student->save();
            $data = [
                'status'=> 200,
                'message'=> 'Student updated'
            ];
            return response()->json($data, 200);
        }
    }




    //Delete Student
    public function delete($id){
        $student = Student::find($id);
        if($student == null){
            $data = [
                'status'=> 404,
                'message'=> 'Student not found'
            ];
            return response()->json($data, 404);

        }else{
            $student->delete();
            $data = [
                'status'=> 200,
                'message'=> 'Student deleted'
            ];
            return response()->json($data, 200);
        } 
    }

}
