<?php

namespace App\Http\Controllers\User;

use App\Action\User\UpdateUserImageAction;
use App\Action\User\UserIdAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserPutRequest;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class UserMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  UserResource::collection(Cache::remember('user_master', now()->addDecade(), function () {
            return User::onlyadmin()->with('Division')->with('Designation')->with('Department')->with('Location')->get();
        }));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request, UserIdAction $action)
    {

        $user = User::create($request->validated());

        return  UserResource::make($user->load('Division')->load('Designation')->load('Department')->load('Location'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if ($user) {
            return new UserResource($user->load('Division')->load('Designation')->load('Department')->load('Location'));
        }
        return response()->json(['message' => 'User Not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserPutRequest $request, $id, UpdateUserImageAction $action, UserIdAction $userIdAction)
    {

        $user = User::find($id);

        if ($user) {

            $user = $action->handleUpdateImages($request, $user);

            $is_updated = $user->update([
                "username" => $request->username,
                "email" => $request->email,
                "mobile_no" => $request->mobile_no,
                "serial_no" => $request->serial_no,
                "user_auto_id" => $request->user_auto_id,
                "division_id" => $request->division_id,
                "department_id" => $request->department_id,
                "designation_id" => $request->designation_id,
                "location_id" => $request->location_id,
                "page_permissions" => $request->page_permissions,
            ]);

            if ($is_updated) {
                $updated_user = User::find($id);

                return  UserResource::make($updated_user->load('Division')->load('Designation')->load('Department')->load('Location'));
            }
        }
        return response()->json(['message' => 'Something went wrong'], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::where('id', $id)
            ->first();
        if ($user) {
            $status = ($user->user_status == 0) ? 1 : 0;
            $user->update(["user_status" => $status]);
            return response('', 204)->header('Content-Type', 'application/json');
        }
        return response()->json(['message' => 'User Not found'], 404);
    }
}
