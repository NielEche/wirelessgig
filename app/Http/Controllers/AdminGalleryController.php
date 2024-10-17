<?php

namespace App\Http\Controllers;
use App\Models\Gallerys;
use Image;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class AdminGalleryController extends Controller
{
    public function index()
    {
        $gallerys = Gallerys::all();
        return view('admin.gallery', ['gallerys' => $gallerys]);
    }


    public function storeGallery(Request $request)
    {
        $image_url = $request->file('path');
    
      // Handle image upload 
        if ($request->hasFile('path') && $request->file('path')->isValid()) {
            $file = $request->file('path');
            // Define the storage path
            $path = $file->store('uploads', 'public');
            
            if ($path) {
                // Get the URL to the file
                $image_url = Storage::url($path);
            }
        }


        // Create a new feature record in the database
        Gallerys::create([
            'path' => $image_url,
            'theme' => $request->input('theme'),
            'publish' => '1',
            // Add more fields as needed
        ]);
        

        // Redirect to a success page or back to the form
        return redirect()->route('admin.gallery')->with('success', 'Gallery added successfully');
    }


    public function updateGallery(Request $request, $id)
    {
        // Find the HomeIssue record by ID
        $gallerys = Gallerys::findOrFail($id);
    
        // Initialize the $image_url variable
        $image_url = $gallerys->path; // Use the existing image URL by default
    
        // Handle image upload 
        if ($request->hasFile('path') && $request->file('path')->isValid()) {
            $file = $request->file('path');
            // Define the storage path
            $path = $file->store('uploads', 'public');
            
            if ($path) {
                // Get the URL to the file
                $image_url = Storage::url($path);
            }
        }
    
        $publishStatus = $request->has('publish') ? 1 : 0;

        // Update other fields in the record
        $gallerys->update([
            'path' => $image_url,
            'theme' => $request->input('theme'),
            'publish' => $publishStatus,
            // Add other fields as needed
        ]);
    
        // Redirect or return a response as needed
        return redirect()->route('admin.gallery')->with('success', 'Gallery updated successfully');
    }


    public function destroyGallery($id)
    {
        $gallerys = Gallerys::find($id);

        $gallerys->delete('delete from gallerys where id = ?',[$id]);
        
        $response = [
            "success" => 'Your gallerys has been Deleted Successfully'
        ];
        
        return redirect()->back()->with($response );
    }

}
