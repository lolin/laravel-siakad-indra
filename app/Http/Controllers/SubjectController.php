<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(){
        $subject=Subject::paginate(10);
        return view('pages.subject.index',['subjects'=>$subject]);
    }
    public function create(Request $request){
        return view('pages.subject.create');
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required|max:255|unique:subjects,name',
            'description'=>'required',
            'lecturer_id'=>'required|exists:users,id'
        ]);
    }
    public function update(Request $request){}
    public function destroy(Request $request){}
}
