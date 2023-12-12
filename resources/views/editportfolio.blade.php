<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Portfolio</title>
    <script src="{{ asset('javascript/jquery.js') }}"></script>
    <script src="{{ asset('javascript/script.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/editPage.css')}}">

</head>
<body>
    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif
    <h2>EDIT CONTENTS</h2>

    <h3>Biographical Information</h3>

    <form method="POST" enctype="multipart/form-data" action="{{ route('saveData') }}">
        @csrf
        <label>First Name :
            <input type="text" name="first_name" id="first_name" value="{{ $bioData->first_name ?? '' }}">
        </label>
        
        <label>Last Name :
        <input type="text" name="last_name" id="last_name" value="{{ $bioData->last_name ?? '' }}">
        </label>
        
        <label>Contact Info :
            <input type="number" name="contact_info" id="contact_info" value="{{ $bioData->contact_info ?? '' }}">
        </label>

        <label>Email :
            <input type="email" name="email" id="email" value="{{ $bioData->email ?? '' }}">
        </label>

        <label>Picture:
            <input type="file" name="picture" id="picture" class="picture">
            
            @if($bioData && $bioData->picture)
                <img src="{{ asset('storage/' . $bioData->picture) }}" alt="Profile Picture">
            @endif
        </label>

        <label>Age :
            <input type="number" name="age" id="age" value="{{ $bioData->age ?? '' }}">
        </label>

        <label>Date of Birth :
            <input type="date" name="date_of_birth" id="date_of_birth" value="{{ $bioData->date_of_birth ?? '' }}">
        </label>

        <label>Nationality :
            <input type="text" name="nationality" id="nationality" value="{{ $bioData->nationality ?? '' }}">
        </label>

        <label>Gender :
            <select name="gender" id="gender">
                <option value="">Choose</option>
                <option value="Male" {{ $bioData->gender == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ $bioData->gender == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
        </label>

        <label>Address :
            <input type="text" name="address" id="address" value="{{ $bioData->address ?? '' }}">
        </label>

        <label>Introduction :
            <textarea name="introduction" id="introduction" cols="20" rows="5">{{ $bioData->introduction ?? '' }}</textarea>
        </label>

        <h3>Educational Background</h3>

            <label> Elementary :
                <input type="text" name="elementary" id="elementary" value="{{ $educationData->elementary ?? '' }}">
            </label>
    
            <label>Junior Highschool :
                <input type="text" name="junior_highschool" id="junior_highschool" value="{{ $educationData->junior_highschool ?? '' }}">
            </label>
    
            <label>Senior Highschool : 
                <input type="text" name="senior_highschool" id="senior_highschool" value="{{ $educationData->senior_highschool ?? '' }}">
            </label>
    
            <label>College :
                <input type="text" name="college" id="college" value="{{ $educationData->college ?? '' }}">
            </label>

            <h3>Skills
                <button type="button" name="addSkill" id="addSkill">Add</button>
            </h3>
            
            <div id="skillsContainer">
                @if(isset($skillsData) && count($skillsData) > 0)
                    @foreach($skillsData as $key => $skill)
                        <div class="skillEntry">
                            <label>Skills:
                                <input type="hidden" name="skill_ID[]" value="{{ $skill->id }}">
                                <input type="text" name="skill[]" class="skill" value="{{ $skill->skill_name }}">
                            </label>
                            <label>Level :
                                <select name="skillLevel[]" class="skillLevel">
                                    @for ($i = 0; $i <= 10; $i++)
                                        <option value="{{ $i }}" {{ $i == $skill->skill_level ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </label>
                            <button type="button" class="deleteSkill" data-skill-id="{{ $skill->id }}">DELETE</button>
                        </div>
                    @endforeach
                @else
                    <div class="skillEntry" id="skillEntry">
                        <label>Skills:
                            <input type="hidden" name="skill_ID[]" class="skill_ID" value="">
                            <input type="text" name="skill[]" class="skill">
                        </label>
                        <label>Level :
                            <select name="skillLevel[]" class="skillLevel">
                                @for ($i = 0; $i <= 10; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </label>
                        <button type="button" class="deleteSkill" data-skill-id="">DELETE</button>
                    </div>
                @endif
            </div>            

    <h3>Hobbies</h3>

        <label>Hobbies :
            <textarea name="hobbies" id="hobbies" cols="30" rows="5">{{ $bioData->hobbies }}</textarea>
        </label>

    <h3>Likes and Dislikes</h3>

        <label>Likes :
            <textarea name="likes" id="likes" cols="30" rows="5">{{ $bioData->likes }}</textarea>
        </label>

        <label>Dislikes :
            <textarea name="dislikes" id="dislikes" cols="30" rows="5">{{ $bioData->dislikes }}</textarea>
        </label>

    <h3>Links</h3>

        <label>Facebook :
            <input type="text" name="facebook_link" id="facebook_link" value="{{ $linksData->facebook_link ?? '' }}">
        </label>

        <label>LinkedIn :
            <input type="text" name="linkedin_link" id="linkedin_link" value="{{ $linksData->linkedin_link ?? '' }}">
        </label>

        <label>Instagram :
            <input type="text" name="instagram_link" id="instagram_link" value="{{ $linksData->instagram_link ?? '' }}">
        </label>

        <label>Telegram :
            <input type="text" name="telegram_link" id="telegram_link" value="{{ $linksData->telegram_link ?? '' }}">
        </label>

        <input type="submit" name="formSubmit" id="formSubmit" value="SAVE">
    </form>
    
        <a href="{{route('portfolio')}}">GO BACK</a>
</body>
</html>