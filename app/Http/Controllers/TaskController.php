<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class TaskController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function create(Request $request) {
        $validate = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'tag' => 'required'
        ]);
        return Task::create([
            'title' => $validate['title'],
            'description' => $validate['description'],
            'tag' => $validate['tag']
        ])->fresh();
    }

    function findAll(Request $request) {
        return Task::all();
    }

    function updateTask(Request $request) {
        $validate = $request->validate([
            'id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'tag' => 'required',
            'state' => 'required'
        ]);
        Task::find($validate['id'])
            ->update([
                'id' => $validate['id'],
                'title' => $validate['title'],
                'description' => $validate['description'],
                'tag' => $validate['tag'],
                'state' => $validate['state']
            ]);
        return Task::find($request->id)->toJson();
    }
}
