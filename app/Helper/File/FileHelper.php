<?php
namespace App\Helper\File;

use Illuminate\Support\Facades\Storage;

class FileHelper
{

      public function storeImage($file,string $path):string
      {
        $file=$file;
        $fileName="dummy"."".round(time()/9999)."".rand(10,500).".".$file->getClientOriginalExtension();
        Storage::putFileAs($path,$file,$fileName);
        return $fileName;
      }

}
