<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UploadFileController;
use App\Models\Android;
use App\Models\Job;
use App\Models\Skill;
use Collective\Html\FormFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Http\Requests;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class AndroidController extends Controller
{
    public $disk = 'public';
    protected $fileService;

    public function __construct(UploadFileController $uploadFileController)
    {
        $this->fileService = $uploadFileController;
    }

    public function index(Android $postModel) {
//        $posts = Post::all();
//        $posts = Post::latest('id')->get();
//        $posts = Post::latest('published_at')->get();
        $posts = $postModel->getAll();
        //dd($posts);
        return view('user.android.index', ['androids' => $posts]);
    }

    public function create(Job $job, Skill $skillModel) {
        $jobs = $job->getAll();
        $skills = $skillModel->getAll();
        return view("user.android.create-android", ['jobs'=> $jobs, 'skills' => $skills]);
    }

    public function store(Android $androidModel, Request $request) {
        //dd($request->all());
        $rules = array(
            'name' => 'required', // make sure the email is an actual email
        );
//        dd($request->all());
        $arr = [
            "_token" => ($request-> get('_token')),
            "name" => ($request-> get('name')),
            "job_id" => ($request-> get('job_id'))
        ];
//        dd($arr);

        $this->validate($request, $rules);
        dd($request ->file("avatar"));
        $res = $androidModel->create($arr);
//        dd($request->file('avatar'));
        if($request->hasFile('avatar')) {
            $file= $request->file('avatar');
            dd($file);
            $extension = $file->extension();
            $sourceAvatar = $file->getFilename() . '.' . $extension;
            Storage::disk($this->disk)->put($sourceAvatar, File::get($file));
            $avatar = Storage::disk($this->disk)->get($sourceAvatar);
            $res->avatar = $sourceAvatar;
        }
        if($request->get('skillList')) {
            $res->skills()->sync($request ->get("skillList"));
        }
        $res->save();
//        dd($res);
        return redirect()->route('android.index');
    }

    public function edit(Android $androidModel, Request $request, $id, Job $jobModel, Skill $skillModel) {
        $storage_path = storage_path();
        $android = $androidModel::find($id);
        $jobs = $jobModel->getAll();
        $skills = $skillModel->getAll();
        $andArr = compact('android');
        $filename = $android->avatar;
        $avatar = $this->fileService->get($android->avatar);
        $url = Storage::disk('public')->url('avatar6.png');
        $path = $storage_path . '/app/public/'.$android->avatar;
//        dd($path);
        $uploadedFile = new \Illuminate\Http\UploadedFile($path,$android->avatar);
//        $uploadedFile = json_decode(json_encode($uploadedFile), true);
//        echo 'helllo';
//        foreach ($uploadedFile as $key => $value) {
//            echo $key. '0';
//        }
//        dd($uploadedFile);
//        dd($avatar);
//        $android->avatar = $uploadedFile;
//        dd($android);
        $passArr = ['jobs'=> $jobs, 'skills' => $skills, 'android' => $android, 'file'=> $uploadedFile];
//        $passArr = array_merge($passArr, $andArr);
//        dd($passArr);
        return view('user.android.edit', $passArr) -> with($andArr);
    }

    public function update(Android $androidModel, Request $request, $id) {
//       dd($id);
        //dd($request->all());
//        dd($request->all());
        $arr = [
            "_token" => ($request-> get('_token')),
            "name" => ($request-> get('name')),
            "job_id" => ($request-> get('job_id'))
        ];
//        dd($arr);
//        dd($request ->get("skillList"));

        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name' => 'required', // make sure the email is an actual email
        );

        $this->validate($request, $rules);

        // process the login
            // store
            $android = $androidModel::find($id);
            $android->name       = $request ->get('name');
            $android->job_id      = $request ->get('job_id');
        if($request->get('skillList')) {
            $android->skills()->sync($request->get("skillList"));
        }
        else {
            $android->skills()->sync([]);
        }
        if($request->hasFile('avatar')) {
            $file= $request->file('avatar');
            $extension = $file->extension();
            $sourceAvatar = $file->getFilename() . '.' . $extension;
            Storage::disk($this->disk)->put($sourceAvatar, File::get($file));
            $avatar = Storage::disk($this->disk)->get($sourceAvatar);
            $android->avatar = $sourceAvatar;
        }
        $android->save();

        return redirect()->route('android.index');
    }

    public function destroy(Android $androidModel, Request $request, $id)
    {
        // delete
        $nerd = $androidModel::find($id);
        $nerd->delete();

        // redirect
        return redirect()->route('android.index');
    }

    public function show(Android $androidModel, Request $request, $id) {
//        echo $id;
        $android = $androidModel::find($id);
//        dd($android);
        return view('user.android.show', ['android' => $android]);
    }
}
