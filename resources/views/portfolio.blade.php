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
            <a href="#Preferences">PREFERENCES</a>
            <a href="#Contact">CONTACT</a>
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
                        {{ $skill->skill_level }}/10
                    </p>
                @endforeach
            </div>

        </div>

    </div>

    <div class="Preferences" id="Preferences">

        <h1>LIKES</h1>
        <p>{{ $bioData->likes }}</p>
        <h1>DISLIKES</h1>
        <p>{{ $bioData->dislikes }}</p>
        <h1>HOBBIES</h1>
        <p>{{ $bioData->hobbies }}</p>

    </div>

    <div class="Contact" id="Contact">
        <h1>WANT TO MEET OR CALL ME?</h1>
        <p>
            <img src="{{ asset('images/call-icon.png')}}" alt="Contact Icon"> 
            {{ $bioData->contact_info }}
        </p>
        <p>
            <img src="{{ asset('images/email-icon.png')}}" alt="Email Icon">
            {{ $bioData->email }}
        </p>

        <h1>FOLLOW ME AT</h1>

        <div class="socialIcons">
            <a href="{{ $linksData->facebook_link }}" target="_blank">
                <img src="{{ asset('images/fb-icon.png') }}" alt="Facebook Icon">
            </a>
            <a href="{{ $linksData->instagram_link }}" target="_blank">
                <img src="{{ asset('images/instagram-icon.png') }}" alt="Instargarm Icon">
            </a>
            <a href="{{ $linksData->linkedin_link }}" target="_blank">
                <img src="{{ asset('images/linkedIn-icon.png') }}" alt="LinkedIn Icon">
            </a>
            <a href="{{ $linksData->telegram_link }}" target="_blank">
                <img src="{{ asset('images/telegram-icon.png') }}" alt="Telegram Icon">
            </a>
        </div>

    </div>

    <div class = "profilePic">
        @if($bioData && $bioData->picture)
            <img src="{{ asset('storage/' . $bioData->picture) }}" alt="Profile Picture">
        @endif
    </div>

</body>
</html>