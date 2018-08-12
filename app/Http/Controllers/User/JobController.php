<?php

namespace App\Http\Controllers\User;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

class JobController extends Controller
{
    public function index(Job $postModel) {
//        $posts = Post::all();
//        $posts = Post::latest('id')->get();
//        $posts = Post::latest('published_at')->get();
        $posts = $postModel->getAll();
        return view('user.job.index', ['jobs' => $posts]);
    }

    public function create() {
        return view("user.job.create-job");
    }

    public function store(Job $jobModel, Request $request) {
        //dd($request->all());
        $rules = array(
            'name' => 'required|alpha', // make sure the email is an actual email
            'description' => 'required', // password can only be alphanumeric and has to be greater than 3 characters
            'complexity_level' => 'required|integer|between:1,10' // password can only be alphanumeric and has to be greater than 3 characters
        );
        $this->validate($request, $rules);
        $jobModel->create($request->all());
        return redirect()->route('job.index');
    }

    public function edit(Job $jobModel, Request $request, $id) {
        $job = $jobModel::find($id);
        $passArr = ['job' => $job];
        return view('user.job.edit', $passArr);
    }

    public function update(Job $jobModel, Request $request, $id) {

//        dd($id);
        $job = $jobModel::find($id);
        $rules = array(
            'name' => 'required|alpha', // make sure the email is an actual email
            'description' => 'required', // password can only be alphanumeric and has to be greater than 3 characters
            'complexity_level' => 'required|integer|between:1,10' // password can only be alphanumeric and has to be greater than 3 characters
        );
        $this->validate($request, $rules);
//        $jobModel->create($request->all());
        $job->name= $request->get('name');
        $job->description= $request->get('description');
        $job->complexity_level= $request->get('complexity_level');
        $job->save();
        return redirect()->route('job.index');
        //dd($request->all());
//        $rules = array(
//            'name' => 'required|alpha', // make sure the email is an actual email
//            'description' => 'required', // password can only be alphanumeric and has to be greater than 3 characters
//            'complexity_level' => 'required|integer|between:1,10' // password can only be alphanumeric and has to be greater than 3 characters
//        );
//        $this->validate($request, $rules);
//        $jobModel->create($request->all());
//        return redirect()->route('job.index');
    }

    public function destroy(Job $jobModel, Request $request, $id)
    {
        // delete
        $nerd = $jobModel::find($id);
        $nerd->delete();

        // redirect
        return redirect()->route('job.index');
    }

    public function show(Job $jobModel, Request $request, $id) {
//        echo $id;
        $job = $jobModel::find($id);
//        dd($job);
        return view('user.job.show', ['job' => $job]);
    }
}
