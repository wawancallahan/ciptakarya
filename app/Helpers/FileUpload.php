<?php

namespace App\Helpers;

trait FileUpload {

    public function storeFile($file, $path)
	{
        $filenameWithExt = $file->getClientOriginalName();
        //Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just ext
        $extension = $file->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore = uniqid() . time().'.'.$extension;
        // Upload Image
        $path = $file->storeAs($path, $fileNameToStore, 'public_uploads');

        return $fileNameToStore;
    }
}