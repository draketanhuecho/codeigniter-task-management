<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();
        $data['tasks'] = $taskModel->getActiveTasks(); 
        return view('tasks/index', $data);
    }

    public function new()
    {
        return view('tasks/create');
    }

    public function create()
    {
        $rules = [
            'title'     => 'required',
            'task_date' => 'required|valid_date'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $taskModel = new TaskModel();
        $taskModel->save([
            'title'       => $this->request->getPost('title'),
            'task_date'   => $this->request->getPost('task_date'),
            'is_archived' => 0
        ]);

        return redirect()->to('/tasks')->with('message', 'Task successfully created!');
    }

    public function edit($id)
    {
        $taskModel = new TaskModel();
        $data['task'] = $taskModel->find($id);

        if (!$data['task']) {
            return redirect()->to('/tasks')->with('error', 'Task not found.');
        }

        return view('tasks/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'title'     => 'required',
            'task_date' => 'required|valid_date'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $taskModel = new TaskModel();
        $taskModel->update($id, [
            'title'     => $this->request->getPost('title'),
            'task_date' => $this->request->getPost('task_date'),
        ]);

        return redirect()->to('/tasks')->with('message', 'Task successfully updated!');
    }

    public function delete($id)
    {
        $taskModel = new TaskModel();
        
        $taskModel->update($id, ['is_archived' => 1]);

        return redirect()->to('/tasks')->with('message', 'Task successfully archived!');
    }
}