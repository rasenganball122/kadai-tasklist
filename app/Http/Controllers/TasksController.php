<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[];
        
        if(\Auth::check()){
            // 認証済みユーザを取得
            $user=\Auth::user();
            
             // ユーザのタスクの一覧を作成日時の降順で取得
            $tasks = $user->tasks()->orderBy('created_at', 'desc')->get();
            
            $data=["tasks"=>$tasks];
        }
        
        return view("tasks.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(\Auth::check()){
            return view("tasks.create");
        }
        return view("tasks.index");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "status"=>"required|max:10",
            "content"=>"required|max:255",
        ]);
        
        if(\Auth::check()){
            // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
            $request->user()->tasks()->create([
                "content"=>$request->content,
                "status"=>$request->status,
            ]);
        }
        
        return redirect("/");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // idの値で投稿を検索して取得
        $task=\App\Task::findORfail($id);
        
        // 認証済みユーザ（閲覧者）がそのタスクの所有者である場合は、そのタスクの詳細を表示
        if(\Auth::id()!==$task->user_id){
            return redirect("/");
        }else{
            return view("tasks.show", [
                "task"=>$task,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task=\App\Task::findORfail($id);
        
         // 認証済みユーザ（閲覧者）がそのタスクの所有者である場合は、そのタスクの詳細を表示
        if(\Auth::id()!==$task->user_id){
            return redirect("/");
        }else{
            return view("tasks.edit", [
                "task"=>$task,
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "status"=>"required|max:10",
            "content"=>"required|max:255",
            ]);
        
        $task=Task::findORfail($id);
        
         // 認証済みユーザ（閲覧者）がそのタスクの所有者である場合は、そのタスクを更新
        if(\Auth::id()!==$task->user_id){
            return redirect("/");
        }else{
            $task->content=$request->content;
            $task->status=$request->status;
            $task->save();
        
            return redirect("/");
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // idの値で投稿を検索して取得
        $task=\App\Task::findOrFail($id);
        
        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if(\Auth::id()!==$task->user_id){
            return redirect("/");
        }else{
            $task->delete();
        }
        
        return redirect("/");
    }
}
