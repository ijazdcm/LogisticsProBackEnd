<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Http\Requests\Department\DepartmentRequest;
use App\Http\Resources\Department\DepartmentResource;
use App\Models\Department\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class DepartmentMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return Cache::remember('department', now()->addDecade(), function () {

            return DepartmentResource::collection(Department::all());
        });
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request)
    {
        return new DepartmentResource(Department::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $department_active = Department::where('department_status', 1)
            ->where('id', $id)
            ->first();

        if ($department_active) {
            return new DepartmentResource($department_active);
        }

        return response()->json(['message' => 'Department Not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentRequest $request, $id)
    {

        $old_department = Department::where('department_status', 1)
            ->where('id', $id)
            ->first();
        if ($old_department) {
            $old_department->update($request->validated());
            return new DepartmentResource($old_department);
        }

        return response()->json(['message' => 'Department Not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $del_department = Department::where('id', $id)
            ->first();
        if ($del_department) {

            $status=($del_department->department_status==0)?1:0;

            $del_department->update([$del_department->department_status = $status]);
            return response('', 204)->header('Content-Type', 'application/json');
        } else {
            return response()->json(['message' => 'Department Not found'], 404);
        }
    }
}
