<?php

namespace App\Controllers;

use App\Entities\Task;

class Tasks extends BaseController
{
    private $model;

    public function __construct()
    {
        $this->model = new \App\Models\TaskModel;
    }

    public function index()
    {
        $data = $this->model->paginate(3);

        return view("Tasks/index", ['tasks' => $data, 'pager' => $this->model->pager]);
    }

    public function show($id)
    {
        $task = $this->getTaskOr404($id);

        return view('Tasks/show', [
            'task' => $task,
        ]);
    }

    function new () {
        $task = new Task;

        return view('Tasks/new', [
            'task' => $task,
        ]);
    }

    public function create()
    {
        $task = new Task($this->request->getPost());

        if ($this->model->insert($task)) {

            return redirect()->to("/tasks/show/{$this->model->insertID}")
                ->with('info', 'Task created successfully');

        } else {

            return redirect()->back()
                ->with('errors', $this->model->errors())
                ->with('warning', 'Invalid data')
                ->withInput();
        }
    }

    public function edit($id)
    {
        $task = $this->getTaskOr404($id);

        return view('Tasks/edit', [
            'task' => $task,
        ]);
    }

    public function update($id)
    {
        $task = $this->getTaskOr404($id);

        $task->fill($this->request->getPost());

        if (!$task->hasChanged()) {

            return redirect()->back()
                ->with('warning', 'Nothing to update')
                ->withInput();
        }

        if ($this->model->save($task)) {

            return redirect()->to("/tasks/show/$id")
                ->with('info', 'Task updated successfully');

        } else {

            return redirect()->back()
                ->with('errors', $this->model->errors())
                ->with('warning', 'Invalid data')
                ->withInput();

        }
    }

    public function delete($id)
    {
        $task = $this->getTaskOr404($id);

        if ($this->request->getMethod() === 'post') {

            $this->model->delete($id);

            return redirect()->to('/tasks')
                ->with('info', 'Task deleted');
        }

        return view('Tasks/delete', [
            'task' => $task,
        ]);
    }

    private function getTaskOr404($id)
    {
        $task = $this->model->find($id);

        if ($task === null) {

            throw new \CodeIgniter\Exceptions\PageNotFoundException("Task with id $id not found");

        }

        return $task;
    }

    public function edit_image($id)
    {
        $task = $this->getTaskOr404($id);

        return view('Tasks/edit_image', [
            'task' => $task,
        ]);
    }

    public function update_image($id)
    {

        $file = $this->request->getFile('image');

        if (!$file->isValid()) {

            $error_code = $file->getError();

            if ($error_code == UPLOAD_ERR_NO_FILE) {

                return redirect()->back()
                    ->with('warning', 'No file selected');
            }

            throw new \RuntimeException($file->getErrorString() . " " . $error_code);
        }

        $size = $file->getSizeByUnit('mb');

        if ($size > 2) {

            return redirect()->back()
                ->with('warning', 'File too large (max 2MB)');
        }

        $type = $file->getMimeType();

        if (!in_array($type, ['image/jpeg'])) {

            return redirect()->back()
                ->with('warning', 'Invalid file format ( JPEG only)');
        }

        $path = ROOTPATH . 'public/uploads/' . $id . '.jpg';
        echo $path;
        if (file_exists($path)) {
            unlink($path);}

        $file->move('../public/uploads', $id . '.jpg');

    }

    public function search()
    {
        $tasks = $this->model->search($this->request->getGet('q'));

        return $this->response->setJSON($tasks);
    }

}
