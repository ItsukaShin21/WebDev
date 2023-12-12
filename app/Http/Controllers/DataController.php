<?php

namespace App\Http\Controllers;

use App\Models\Bio;
use App\Models\Education;
use App\Models\Skills;
use App\Models\Links;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function fetchData()
    {
        // Fetch existing data from the database
        $bioData = Bio::first();
        $educationData = Education::first();
        $skillsData = Skills::all();
        $linksData = Links::first();

        // Pass the data to the view
        return view('editportfolio', [
            'bioData' => $bioData,
            'educationData' => $educationData,
            'skillsData' => $skillsData,
            'linksData' => $linksData,
        ]);
    }
    public function displayData() 
    {
        // Display existing data from the database
        $bioData = Bio::first();
        $educationData = Education::first();
        $skillsData = Skills::all();
        $linksData = Links::first();

        // Pass the data to the view
        return view('portfolio', [
            'bioData' => $bioData,
            'educationData' => $educationData,
            'skillsData' => $skillsData,
            'linksData' => $linksData,
        ]);
    }

    public function saveData(Request $request)
    {
        // Validate the form data for Bio
        $validatedBioData = $request->validate([
            'first_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'contact_info' => 'nullable|numeric',
            'email' => 'nullable|email',
            'age' => 'nullable|numeric',
            'date_of_birth' => 'nullable|string',
            'nationality' => 'nullable|string',
            'gender' => 'nullable|string',
            'address' => 'nullable|string',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:100000',
            'introduction' => 'nullable|string',
            'likes' => 'nullable|string',
            'dislikes' => 'nullable|string',
            'hobbies' => 'nullable|string',
        ]);

        // Validate the form data for Education
        $validatedEducationData = $request->validate([
            'elementary' => 'nullable|string',
            'junior_highschool' => 'nullable|string',
            'senior_highschool' => 'nullable|string',
            'college' => 'nullable|string',
        ]);

        // Validate the form data for Skills
        $validatedSkillsData = $request->validate([
            'skill_ID.*' => 'nullable|integer',
            'skill.*' => 'nullable|string',
            'skillLevel.*' => 'nullable|integer',
        ]);

        // Validate the form data for Links
        $validatedLinksData = $request->validate([
            'facebook_link' => 'nullable|string',
            'linkedin_link' => 'nullable|string',
            'instagram_link' => 'nullable|string',
            'telegram_link' => 'nullable|string',
        ]);

        // Loop through the validated skills data and update or create each skill
        foreach ($validatedSkillsData['skill_ID'] as $key => $skillID) {
            $skillData = [
                'skill_name' => $validatedSkillsData['skill'][$key],
                'skill_level' => $validatedSkillsData['skillLevel'][$key],
            ];

            // Check if the skill with the same name already exists
            $existingSkill = Skills::where('skill_name', $skillData['skill_name'])->first();

            if ($existingSkill) {
                // If skill with the same name exists, update the skill level
                $existingSkill->update(['skill_level' => $skillData['skill_level']]);
            } else {
                // If skill with the same name doesn't exist, create a new skill
                Skills::create($skillData);
            }
        }

        // Fetch the existing bio and education data
        $existingBio = Bio::firstOrNew([]);
        $existingEducation = Education::firstOrNew([]);
        $existingLinks = Links::firstOrNew([]);

        // Update the existing bio with the validated data
        $existingBio->update($validatedBioData);

        // Check if a new file has been uploaded for Bio
        if ($request->hasFile('picture')) {
            // Handle file upload and update the picture column
            $imagePath = $request->file('picture')->store('profile_pictures', 'public');
            $existingBio->picture = $imagePath;
            $existingBio->save();
        }

        $existingEducation->update($validatedEducationData);
        // Update the existing links data with the validated data
        $existingLinks->update($validatedLinksData);

        // Redirect back or wherever you want after saving
        return redirect()->back()->with('success', 'Data saved successfully');
    }

    public function deleteSkill(Request $request)
    {
        $skillID = $request->input('skill_ID');

        // Check if skillID is not empty
        if ($skillID) {
            // Find the skill by ID and delete it
            Skills::find($skillID)->delete();

            return response()->json(['success' => 'Skill deleted successfully']);
        }
        return response()->json(['error' => 'Invalid skill ID']);
    }
}