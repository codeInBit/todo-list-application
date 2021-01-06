<?php

namespace App\Http\Controllers\API;

use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'name' => 'required|array',
        ]);

        $names = [];
        foreach ($request->name as $key => $data) {
            $names[] = ['name' => $data];
        }

        $items = $task->items()->createMany($names);
        $response = ItemResource::collection($items)->response()->getData(true);

        return $this->successResponse($response, "Todo tasks items was created successfuly", Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task, Item $item)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'is_complete' => 'required',
        ]);
        $item = $item->update($request->all());

        return $this->successResponse(null, "Item data was updated", Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task, Item $item)
    {
        $item->delete();
        return $this->successResponse(null, "item was deleted", Response::HTTP_NO_CONTENT);
    }
}
