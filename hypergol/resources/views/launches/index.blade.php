@extends('layouts.mainLayout')

@section('content')
<section class="container text-gray-600 body-font">
    <div class="px-5 py-4 mx-auto">
        <div class="my-4">
            <h1 class="mb-1 w-full text-2xl font-semibold text-gray-800">Upcoming Launches</h1>
            <div class="flex flex-wrap -m-4">
                @foreach($allLaunches as $launch)
                @if($launch->launch_date < Now()) @continue @endif <div class="p-4 lg:w-1/4 md:w-1/2">
                    <div class="h-full shadow-lg rounded-lg flex flex-col items-center text-center">
                        <?php
                        switch ($launch->rocket) {
                            case 'Falcon 9':
                                echo '<img class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-2" src="\img\falcon9.jpg" alt="Falcon 9">';
                                break;
                            case 'Falcon Heavy':
                                echo '<img class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-2" src="\img\falconheavy.jpg" alt="Falcon Heavy">';
                                break;
                            case 'Starship':
                                echo '<img class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-2" src="\img\starship.jpg" alt="Starship>';
                                break;
                            case 'Soyuz 2.1a':
                            case 'Soyuz 2.1b/Fregat':
                                echo '<img class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-2" src="\img\soyuz.jpeg" alt="Soyuz">';
                                break;
                            case 'Electron':
                                echo '<img class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-2" src="\img\electron.jpg" alt="Electron">';
                                break;
                            case 'Atlas V':
                                echo '<img class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-2" src="\img\atlasv.jpg" alt="Atlas V">';
                                break;
                            case 'Delta IV Heavy':
                                echo '<img class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-2" src="\img\deltaivheavy.jpg" alt="Delta IV Heavy">';
                                break;
                            default:
                                echo '<img class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-2" src="\img\default.jpg" alt="Placeholder">';
                                break;
                        }
                        ?>
                        <div class="w-full divide-y-2 my-1">
                            <div>
                                <h2 class="title-font font-semibold text-xl mb-1 text-gray-900">{{ $launch->mission_name }}</h2>
                            </div>
                            <div>
                                <h3 class="text-gray-500 mt-2 mb-1">{{ $launch->launch_provider }} | {{ $launch->rocket }}</h3>
                                <p class="text-gray-500 mb-1">{{ $launch->location }}</p>
                                <p class="text-gray-500 mb-1">{{ \Carbon\Carbon::parse($launch->launch_date)->format('d/m/Y H:m:s') }}</p>
                                <div class="my-6">
                                    <a href="{{ route('launches.show',$launch->id) }}" style="text-decoration:none;" class="block px-3 py-2 font-semibold text-center text-white transition-colors duration-200 transform bg-black rounded-md lg:inline hover:bg-gray-800">See Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            @endforeach
        </div>
        <div class="my-4">
            <h1 class="mb-1 w-full text-2xl font-semibold text-gray-800">Past Launches</h1>
            <div class="flex flex-wrap -m-4">
                @foreach($allLaunches as $launch)
                @if($launch->launch_date > Now()) @continue @endif <div class="p-4 lg:w-1/4 md:w-1/2">
                    <div class="h-full shadow-lg rounded-lg flex flex-col items-center text-center">
                        <?php
                        switch ($launch->rocket) {
                            case 'Falcon 9':
                                echo '<img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4" src="\img\falcon9.jpg" alt="Falcon 9">';
                                break;
                            case 'Falcon Heavy':
                                echo '<img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4" src="\img\falconheavy.jpg" alt="Falcon Heavy">';
                                break;
                            case 'Starship':
                                echo '<img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4" src="\img\starship.jpg" alt="Starship>';
                                break;
                            case 'Soyuz 2.1a':
                            case 'Soyuz 2.1b/Fregat':
                                echo '<img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4" src="\img\soyuz.jpeg" alt="Soyuz">';
                                break;
                            case 'Electron':
                                echo '<img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4" src="\img\electron.jpg" alt="Electron">';
                                break;
                            case 'Atlas V':
                                echo '<img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4" src="\img\atlasv.jpg" alt="Atlas V">';
                                break;
                            case 'Delta IV Heavy':
                                echo '<img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4" src="\img\deltaivheavy.jpg" alt="Delta IV Heavy">';
                                break;
                            default:
                                echo '<img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4" src="\img\default.jpg" alt="Placeholder">';
                                break;
                        }
                        ?>
                        <div class="w-full divide-y-2 my-1">
                            <div>
                                <h2 class="title-font font-semibold text-xl mb-1 text-gray-900">{{ $launch->mission_name }}</h2>
                            </div>
                            <div>
                                <h3 class="text-gray-500 mt-2 mb-1">{{ $launch->launch_provider }} | {{ $launch->rocket }}</h3>
                                <p class="text-gray-500 mb-1">{{ $launch->location }}</p>
                                <p class="text-gray-500 mb-1">{{ \Carbon\Carbon::parse($launch->launch_date)->format('d/m/Y H:m:s') }}</p>
                                <div class="my-6">
                                    <a href="{{ route('launches.show',$launch->id) }}" style="text-decoration:none;" class="block px-3 py-2 font-semibold text-center text-white transition-colors duration-200 transform bg-black rounded-md lg:inline hover:bg-gray-800">See Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection