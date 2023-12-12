<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/portfolioPage.css')}}">
    <script src="{{asset('javascript/jquery.js')}}"></script>
    <script src="{{asset('javascript/script.js')}}"></script>
    <title>My Portfolio</title>
</head>
<body>

    @if(isset($success))
        <p class="success-message">{{ $success }}</p>
    @endif

    <img src="{{ asset('images/darksnow.jpg') }}" alt="Your Image" class="webBg">
    <div class="navs">

        <div class="navigators">
            <a href="#Home">HOME</a>
            <a href="#Bio">BIO</a>
            <a href="#Skills">SKILLS</a>
            <a href="">PREFERENCE</a>
            <a href="">CONTACT</a>
        </div>

        <div class="navigators2">
            @auth
                {{-- If the user is logged in, show logout button and edit button --}}
                <a href="{{ route('edit') }}" class="editBtn" id="editBtn">EDIT</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <input type="submit" name="logoutBtn" id="logoutBtn" class="logoutBtn" value="LOGOUT">
                </form>
            @else
                {{-- If the user is not logged in, show login button --}}
                <a href="{{ route('login') }}" class="loginBtn" id="loginBtn">LOGIN</a>
            @endauth
        </div>

    </div>

    <div class="Home" id="Home">
        <div class="inline-h1">
            <h1>I'M</h1>
            <h1>{{$bioData->first_name}} {{$bioData->last_name}}</h1>
        </div>
        <p>{{ $bioData->introduction ?? '' }}</p>
    </div>

    <div class="Bio" id="Bio">

        <h1>BIOGRAPHICAL INFO</h1>
        <div class="bioData">
            <p>Name : {{$bioData->first_name}} {{$bioData->last_name}}</p>
            <p>Age : {{$bioData->age}}</p>
            <p>Date of Birth : <?php echo date('F j, Y', strtotime($bioData->date_of_birth)); ?></p>
            <p>Nationality : {{$bioData->nationality}}</p>
            <p>Gender : {{$bioData->gender}}</p>
            <p>Address : {{$bioData->address}}</p>
        </div>

    </div>

    <div class="Skills" id="Skills">

        <h1>SKILLS</h1>

        <div class="skillsContainer">

            <div class="skillContents">
                @foreach($skillsData as $skill)
                    <p class="firstP">
                        {{ $skill->skill_name }}
                    </p>
                    <p class="secondP">
                        {{ $skill->skill_level }}
                    </p>
                @endforeach
            </div>

        </div>

    </div>
    <div class="Preference"></div>
    <div class="Contact"></div>

    <div class = "profilePic">
        @if($bioData && $bioData->picture)
            <img src="{{ asset('storage/' . $bioData->picture) }}" alt="Profile Picture">
        @endif
    </div>

    <div class = "educationalBg">
        <h3>Educational Background</h3>
    </div>

    <div class = "skills">
        <h3>Skills</h3>
    </div>

    <div class = "hobbies">
        <h3>Hobbies</h3>
    </div>

    <div class = "likes">
        <h3>Likes</h3>
    </div>

    <div class = "dislikes">
        <h3>Dislikes</h3>
    </div>

    <div class = "contactInfo">
        <h3>Contact Info</h3>
    </div>

    <div class = "links">
        <h3>Social Media Links</h3>
    </div>
</body>
</html>