<?php  

namespace App\Http\Controllers;  

use App\Models\TeamMember;  
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Storage;  

class TeamMemberController extends Controller  
{  
    /**  
     * Display a listing of the team members.  
     */  
    public function index()  
    {  
        $teamMembers = TeamMember::all();  
        return view('admin.views.team-members', compact('teamMembers'));  
    }  

    /**  
     * Show the form for creating a new team member.  
     */  
    public function create()  
    {  
        return view('admin.views.add-team-members');  
    }  

    /**  
     * Store a newly created team member in storage.  
     */  
    public function store(Request $request)  
    {  
        // Validate the request  
        $request->validate([  
            'name_en' => 'required|string|max:255',  
            'name_ar' => 'required|string|max:255',  
            'role_en' => 'required|string|max:255',  
            'role_ar' => 'required|string|max:255',  
            'description_en' => 'required|string',  
            'description_ar' => 'required|string',  
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',  
        ]);  
    
        // Handle file upload  
        $file = $request->file('image');  
        $filename = time() . '_' . $file->getClientOriginalName();  
        $file->move(public_path('team_members'), $filename);  
    
        // Create the team member  
        TeamMember::create([  
            'name_en' => $request->name_en,  
            'name_ar' => $request->name_ar,  
            'role_en' => $request->role_en,  
            'role_ar' => $request->role_ar,  
            'description_en' => $request->description_en,  
            'description_ar' => $request->description_ar,  
            'image' => $filename,  
        ]);  
    
        // Redirect with success message  
        return redirect()->route('team-members.index')->with('success', 'Team member added successfully!');  
    }
 
    public function edit(TeamMember $teamMember)  
    {  
        return view('admin.views.edit-team-members', compact('teamMember'));  
    }  

    /**  
     * Update the specified team member in storage.  
     */  
    public function update(Request $request, TeamMember $teamMember)  
    {  
        // Validate the request  
        $validatedData = $request->validate([  
            'name_en' => 'required|string|max:255',  
            'name_ar' => 'required|string|max:255',  
            'role_en' => 'required|string|max:255',  
            'role_ar' => 'required|string|max:255',  
            'description_en' => 'required|string',  
            'description_ar' => 'required|string',  
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  
        ]);  
    
        try {  
            // Handle image upload if present  
            if ($request->hasFile('image')) {  
                // Delete old image  
                if ($teamMember->image && file_exists(public_path('team_members/' . $teamMember->image))) {  
                    unlink(public_path('team_members/' . $teamMember->image));  
                }  
                
                // Save new image  
                $file = $request->file('image');  
                $filename = time() . '_' . $file->getClientOriginalName();  
                $file->move(public_path('team_members'), $filename);  
                $teamMember->image = $filename;  
            }  
    
            // Update team member details  
            $teamMember->name_en = $request->name_en;  
            $teamMember->name_ar = $request->name_ar;  
            $teamMember->role_en = $request->role_en;  
            $teamMember->role_ar = $request->role_ar;  
            $teamMember->description_en = $request->description_en;  
            $teamMember->description_ar = $request->description_ar;  
            
            // Save the updated team member  
            $teamMember->save();  
    
            // Redirect with success message  
            return redirect()->route('team-members.index')  
                ->with('success', 'Team member updated successfully.');  
    
        } catch (\Exception $e) {  
            // Log the error  
            \Log::error('Team Member Update Error: ' . $e->getMessage());  
    
            // Redirect back with error message  
            return redirect()->back()  
                ->with('error', 'An error occurred while updating the team member.')  
                ->withInput();  
        }  
    }  

    /**  
     * Remove the specified team member from storage.  
     */  
    public function destroy(TeamMember $teamMember)  
    {  
        // Delete the image  
        Storage::delete('public/' . $teamMember->image);  

        // Delete the team member  
        $teamMember->delete();  

        // Redirect with success message  
        return redirect()->route('team-members.index')->with('success', 'Team member deleted successfully!');  
    }  
} 