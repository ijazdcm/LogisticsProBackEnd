<?php

namespace App\Http\Controllers\Shed;
use App\Action\Shed\UpdateShedOwnerImageAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Sheds\ShedPutRequest;
use App\Http\Requests\Sheds\ShedStoreRequest;
use App\Http\Resources\Shed\ShedInfoResource;
use App\Models\Shed\Shed_Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ShedInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ShedInfoResource::collection(Cache::remember('shed_info',now()->addDecade(),function()
        {
            return Shed_Info::with('Shed_Type')->get();
        }));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShedStoreRequest $request)
    {

        $new_shed=Shed_Info::create($request->validated());

        $shed=Shed_Info::active()->with('Shed_Type')->find($new_shed->id);

        return ShedInfoResource::make($shed);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shed=Shed_Info::active()->find($id);

        if($shed)
        {
        return new ShedInfoResource($shed->load('Shed_Type'));
        }
        return response()->json(['message' => 'Shed Not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ShedPutRequest $request, $id ,UpdateShedOwnerImageAction $action)
    {
        $shed=Shed_Info::active()->where('id',$id)->first();
        if($shed)
        {

          $shed=$action->handleUpdateImages($request,$shed);
           $is_updated=$shed->update([
               "shed_type_id"=>$request->shed_type_id,
               "shed_name"=>$request->shed_name,
               "shed_owner_name"=>$request->shed_owner_name,
               "shed_owner_phone_1"=>$request->shed_owner_phone_1,
               "shed_owner_phone_2"=>$request->shed_owner_phone_2,
               "shed_owner_address"=>$request->shed_owner_address,
               "pan_number"=>$request->pan_number,
               "shed_adhar_number"=>$request->shed_adhar_number,
               "gst_no"=>$request->gst_no,
           ]);

           if($is_updated)
           {
              $updated_shed=Shed_Info::where('id',$id)->first();

               return  ShedInfoResource::make($updated_shed->load('Shed_Type'));
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
        $shed=Shed_Info::where('id',$id)
                ->first();
        if($shed)
        {
            $status=($shed->shed_status==0)?1:0;
            $shed->update([$shed->shed_status=$status]);
            return response('',204)->header('Content-Type', 'application/json');
        }

        return response()->json(['message' => 'Shed Not found'], 404);
    }
}
