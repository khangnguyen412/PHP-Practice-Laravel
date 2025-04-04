<?php

namespace App\Http\Controllers\Lecture19;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ControllerLecture19 extends Controller
{
    public function get_form()
    {
        return view('lecture19.view-lecture19');
    }

    public function handle_upload_file(Request $request)
    {
        if($request->hasFile('upload')){
            $file = $request->file('upload');
            $file_name = time(). "_" .$file->getClientOriginalName();
            $file->storeAs('/public/uploads', $file_name); // Lưu File
            return response()->json([
                'OriginalName'      => $file->getClientOriginalName(), // Lấy Tên File
                'OriginalExtension' => $file->getClientOriginalExtension(), // Lấy đuổi mở rộng của file
                'Size'              => $file->getSize(), // Lấy dung lượng file
                'mimeType'          => $file->getClientMimeType(), // Dạng file 
                'FilePath'          => storage_path('app/public/uploads/' . $file_name), // File được lưu trong /storage/app/public/uploads
                'stored_file_size'  => File::size(storage_path('app/public/uploads/' . $file_name)), // Dung lượng file lưu
            ]);
        }else{
            return "Không lấy được";
        }
    }
}
