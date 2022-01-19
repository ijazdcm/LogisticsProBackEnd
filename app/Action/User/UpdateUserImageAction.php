<?php
namespace App\Action\User;

use App\Helper\File\FileHelper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateUserImageAction{


    protected $helper;


    public function __construct()
    {
      $this->helper=new FileHelper();
    }

    public function handleUpdateImages(Request $request,User $user):User
    {


     if($request->hasFile('photo'))
     {
         Storage::delete(User::USER_PHOTO_PATH."/".$user->photo);
         $photo=$request->file('photo');
         $new_file_name=$this->helper->storeImage($photo,User::USER_PHOTO_PATH);
         $user->photo=$new_file_name;
     }

     return $user;
    }


}
