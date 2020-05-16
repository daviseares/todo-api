<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Get All tasks
     *
     * @return $response
     */
    public function index(){
        $response =[
            'succes'=>true,
            'data'=>Task::all()
        ];
        return  $response;
    }

    /**
     * Create Task
     *
     * @param Request $request
     * @return $response
     */
    public function store(Request $request){
        $request->validate([
            'name'=>'required|max:255',
            'complete'=>'required'
        ]);

        $task = Task::create([
            'name'=>$request->input('name'),
            'complete'=>$request->input('complete')
        ]);     
          
        $response=[
            "success"=>true,
            "msg"=>"Nova tarefa criada!",
            "data"=>$task
        ];
        
        return $response;
    }

    /**
     * Get Task
     *
     * @param Task $task
     * @return $response
     */
    public function show(Task $task){
        $response =[
            'succes'=>true,
            'data'=>$task
        ];
        return $response;

    }

    /**
     * Update Task;
     *
     * @param Request $request
     * @param Task $task
     * @return $response
     */
    public function check(Request $request,Task $task){

        $request->validate([
            'complete'=>'required',
                
        ]);

        $task->complete = $request -> input('complete');
        $task->save();
        
        $response=[
            "success"=>true,
            "msg"=>"Tarefa atualizada!",
            "data"=>$task
        ];
        
        return $response;
    
    }

    /**
     * Update Task;
     *
     * @param Request $request
     * @param Task $task
     * @return $response
     */
    public function update(Request $request,Task $task){

        $request->validate([
            'name'=>'required|max:255',
                
        ]);
    
         $task->name = $request -> input('name');
         $task->save();
         
         $response=[
            "success"=>true,
            "msg"=>"Tarefa atualizada!",
            "data"=>$task
        ];
        
        return $response;
        
    }

    /**
     * Delete Task
     *
     * @param Task $task
     * @return $response
     */
    public function destroy(Task $task){
            
        $task->delete();
        
        $response=[
           "success"=>true,
           "msg"=>"Tarefa excluída!"
       ];
       
       return $response;     
    }
}
