<?php

namespace App\Action\Shed;

use App\Helper\File\FileHelper;
use App\Models\Shed\Shed_Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateShedOwnerImageAction
{
    protected $helper;


    public function __construct()
    {
      $this->helper=new FileHelper();
    }

    public function handleUpdateImages(Request $request,Shed_Info $shed):Shed_Info
    {


     if($request->hasFile('shed_owner_photo'))
     {
         Storage::delete(Shed_Info::SHED_OWNER_PHOTO_PATH."/".$shed->shed_owner_photo);
         $shed_owner_photo=$request->file('shed_owner_photo');
         $new_file_name=$this->helper->storeImage($shed_owner_photo,Shed_Info::SHED_OWNER_PHOTO_PATH);
         $shed->shed_owner_photo=$new_file_name;
     }

     return $shed;
    }

}
