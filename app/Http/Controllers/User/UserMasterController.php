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
        return  UserResource::collection(Cache::remember('user_master',now()->addDecade(),function()
        {
             return User::with('Division')->with('Designation')->with('Department')->get();
        }));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request,UserIdAction $action)
    {

        $altered_request=array_merge($request->validated(),

            ['user_auto_id'=>$action->getUserId(
                $request->division_id,
            $request->department_id,
            $request->designation_id).$request->serial_no]
        );

        $user=User::create($altered_request);

        return  UserResource::make($user->load('Division')->load('Designation')->load('Department'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::find($id);

        if($user)
        {
            return new UserResource($user->load('Division')->load('Designation')->load('Department'));
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
    public function update(UserPutRequest $request, $id,UpdateUserImageAction $action,UserIdAction $userIdAction)
    {

        $user=User::find($id);

        if($user)
        {

          $user=$action->handleUpdateImages($request,$user);

           $is_updated=$user->update([
               "username"=>$request->username,
               "email"=>$request->email,
               "password"=>$request->password,
               "mobile_no"=>$request->mobile_no,
               "serial_no"=>$request->serial_no,
               "user_auto_id"=>$userIdAction->getUserId( $request->division_id, $request->department_id,$request->designation_id).$request->serial_no,
               "division_id"=>$request->division_id,
               "department_id"=>$request->department_id,
               "designation_id"=>$request->designation_id,
           ]);

           if($is_updated)
           {
              $updated_user=User::find($id);

               return new UserResource($updated_user->load('Division')->load('Designation')->load('Department'));
           }
        }
        return response()->json(['message' => 'Something went wrong'],500);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return response('',204)->header('Content-Type', 'application/json');
    }
}
