<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    function index()
    {
        return view("file-upload");
    }

    function store(Request $request)
    {
        // storing files 1 method
        // $file = Storage::disk("public")->put("/", $request->file("file"));
        // storing files 2 method
        $file = $request->file("file")->store("/", 'public');
        $fileStore = new File();
        $fileStore->file_path = $file;
        $fileStore->save();

        echo "Success";
    }
}
