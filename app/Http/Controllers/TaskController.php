<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function start(Task $task)
    {
        /** @var Character $character */
        $character = auth()->user()->character;
        $character->setActiveTask($task);
        $character->tickTask(true);

        if (!$character->hasRequiredItems($task)) {
            $character->clearActiveTask();
        }

        return [
            'active' => $character->active_task_id !== null,
            'character_items' => $character->items,
            'items' => $task->items,
            'skills' => $character->character_skills()->with('skill')->get()
        ];
    }

    public function work(Task $task)
    {
        /** @var Character $character */
        $character = auth()->user()->character;

        $task->work($character, true);

        return [
            'active' => $character->active_task_id !== null,
            'character_items' => $character->items,
            'task' => $task, 'items' => $task->items,
            'skills' => $character->character_skills()->with('skill')->get()
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
