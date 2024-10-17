<?php

namespace App\Http\Controllers;
use App\Models\Blogs;
use Image;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class AdminBlogController extends Controller
{
    public function index()
    {
        $blogs = Blogs::all();
        return view('admin.blog', ['blogs' => $blogs]);
    }


    public function storeBlog(Request $request)
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
        Blogs::create([
            'path' => $image_url,
            'date' => $request->input('date'),
            'theme' => $request->input('theme'),
            'about' => $request->input('about'),
            'publish' => '1',
            // Add more fields as needed
        ]);
        

        // Redirect to a success page or back to the form
        return redirect()->route('admin.blog')->with('success', 'Blog added successfully');
    }

    public function updateBlog(Request $request, $id)
    {
        // Find the HomeIssue record by ID
        $blog = Blogs::findOrFail($id);
    
        // Initialize the $image_url variable
        $image_url = $blog->path; // Use the existing image URL by default
    
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
        $blog->update([
            'path' => $image_url,
            'date' => $request->input('date'),
            'theme' => $request->input('theme'),
            'about' => $request->input('about'),
            'publish' => $publishStatus,
            // Add other fields as needed
        ]);
    
        // Redirect or return a response as needed
        return redirect()->route('admin.blog')->with('success', 'Blog updated successfully');
    }


    public function destroyBlog($id)
    {
        $blog = Blogs::find($id);

        $blog->delete('delete from blog where id = ?',[$id]);
        
        $response = [
            "success" => 'Your blog has been Deleted Successfully'
        ];
        
        return redirect()->back()->with($response );
    }



}
