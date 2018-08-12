<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

use App\Http\Requests;

class SkillController extends Controller
{
    public function index(Skill $skillModel) {
//        $skills = Post::all();
//        $skills = Post::latest('id')->get();
//        $skills = Post::latest('published_at')->get();
        $skills = $skillModel->getAll();
        return view('user.skill.index', ['skills' => $skills]);
    }

    public function create() {
        return view("user.skill.create-skill");
    }

    public function store(Skill $skillModel, Request $request) {
        //dd($request->all());
        $rules = array(
            'name' => 'required|alpha', // make sure the email is an actual email
        );
        $this->validate($request, $rules);
        $skillModel->create($request->all());
        return redirect()->route('skill.index');
    }

    public function edit(Skill $skillModel, Request $request, $id) {
        $skill = $skillModel::find($id);
        $passArr = ['skill' => $skill];
//        dd($passArr);
        return view('user.skill.edit', $passArr);
    }

    public function update(Skill $skillModel, Request $request, $id) {

//        dd($id);
        $skill = $skillModel::find($id);
        $rules = array(
            'name' => 'required|alpha', // make sure the email is an actual email// password can only be alphanumeric and has to be greater than 3 characters
        );
        $this->validate($request, $rules);
//        $skillModel->create($request->all());
        $skill->name= $request->get('name');
        $skill->save();
        return redirect()->route('skill.index');
        //dd($request->all());
//        $rules = array(
//            'name' => 'required|alpha', // make sure the email is an actual email
//            'description' => 'required', // password can only be alphanumeric and has to be greater than 3 characters
//            'complexity_level' => 'required|integer|between:1,10' // password can only be alphanumeric and has to be greater than 3 characters
//        );
//        $this->validate($request, $rules);
//        $skillModel->create($request->all());
//        return redirect()->route('skill.index');
    }

    public function destroy(Skill $skillModel, Request $request, $id)
    {
        // delete
        $nerd = $skillModel::find($id);
        $nerd->delete();

        // redirect
        return redirect()->route('skill.index');
    }
}
