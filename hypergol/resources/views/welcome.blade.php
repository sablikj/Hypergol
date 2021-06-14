@extends('layouts.mainLayout')

@section('content')
@foreach($launch as $launch)
@endforeach
<div class="container flex flex-col px-6 mt-4 shadow py-4 mx-auto space-y-6 lg:h-128 lg:py-16 lg:flex-row lg:items-center bg-yellow-400 lg:space-x-6">
    <div class="flex flex-col items-center w-full lg:flex-row lg:w-1/2">
        <div class="max-w-lg lg:mx-12 lg:order-2">
            <h1 class="text-3xl mr-4 font-medium tracking-wide text-gray-800 lg:text-4xl">
                <script language="JavaScript">
                    TargetDate = "{{ $launch->launch_date }}"
                    BackColor = "";
                    ForeColor = "black";
                    CountActive = true;
                    CountStepper = -1;
                    LeadingZero = true;
                    DisplayFormat = "T - %%D%% Days %%H%% Hours %%M%% Minutes %%S%% Seconds";
                    FinishMessage = "Happening Now!";
                </script>
                <span>
                    <script language="JavaScript" src="https://rhashemian.github.io/js/countdown.js"></script>
                </span>
            </h1>
            <p class="mt-4 text-2xl text-gray-600 dark:text-gray-300">{{ $launch->launch_provider }} will launch {{ $launch->mission_name }} mission on it's {{ $launch->rocket }} rocket carrying {{ $launch->payload }} from {{ $launch->location }}.</p>
            <div class="mt-6">
                <a href="{{ route('launches.show',$launch->id) }}" style="text-decoration:none;" class="block px-3 py-2 font-semibold text-center text-white transition-colors duration-200 transform bg-black rounded-md lg:inline hover:bg-gray-800">See Details</a>
            </div>
        </div>
    </div>

    <div class="flex items-center justify-center w-full h-96 lg:w-1/2">
        <?php
        switch ($launch->rocket) {
            case 'Falcon 9':
                echo '<img class="object-cover w-full h-full max-w-2xl rounded-md" src="img\falcon9.jpg" alt="Falcon 9 photo">';
                break;
            case 'Falcon Heavy':
                echo '<img class="object-cover w-full h-full max-w-2xl rounded-md" src="img\falconheavy.jpg" alt="Falcon Heavy">';
                break;
            case 'Starship':
                echo '<img class="object-cover w-full h-full max-w-2xl rounded-md" src="img\starship.jpg" alt="Starship">';
                break;
            case 'Soyuz 2.1a':
            case 'Soyuz 2.1b/Fregat':
                echo '<img class="object-cover w-full h-full max-w-2xl rounded-md" src="img\soyuz.jpeg" alt="Soyuz">';
                break;
            case 'Electron':
                echo '<img class="object-cover w-full h-full max-w-2xl rounded-md" src="img\electron.jpg" alt="Electron">';
                break;
            case 'Atlas V':
                echo '<img class="object-cover w-full h-full max-w-2xl rounded-md" src="img\atlasv.jpg" alt="Atlas V">';
                break;
            case 'Delta IV Heavy':
                echo '<img class="object-cover w-full h-full max-w-2xl rounded-md" src="img\deltaivheavy.jpg" alt="Delta IV Heavy">';
                break;
            default:
                echo '<img class="object-cover w-full h-full max-w-2xl rounded-md" src="img\default.jpg" alt="Rocket Launch">';
                break;
        }
        ?>
    </div>
</div>
<div class="container pt-8">
    <div class="flex flex-wrap bg-white dark:bg-gray-800">
        <div class="p-4 md:w-1/2 w-full">
            <h1 class="mb-3 w-full text-2xl font-semibold text-gray-800 dark:text-white">Upcoming Launches</h1>
            @foreach($upcoming as $up)
            @if($up == $launch) @continue @endif
            <div class="shadow-lg rounded-lg mb-2 w-full ">
                <a href="{{ route('launches.show',$up->id) }}" style="text-decoration:none;" class="mt-2 min-w-full w-full text-gray-500 h-24 dark:text-gray-400">
                    <div class="flex sm:flex-row lg:w-1/2 flex-col items-start">
                        <?php
                        switch ($up->rocket) {
                            case 'Falcon 9':
                                echo '<img alt="team" class="flex-shrink-0 rounded-lg w-28 h-28 object-cover object-center sm:mb-0" src="img\falcon9.jpg">';
                                break;
                            case 'Falcon Heavy':
                                echo '<img alt="team" class="flex-shrink-0 rounded-lg w-28 h-28 object-cover object-center sm:mb-0" src="img\falconheavy.jpg">';
                                break;
                            case 'Starship':
                                echo '<img alt="team" class="flex-shrink-0 rounded-lg w-28 h-28 object-cover object-center sm:mb-0" src="img\starship.jpg">';
                                break;
                            case 'Soyuz 2.1a':
                            case 'Soyuz 2.1b/Fregat':
                                echo '<img alt="team" class="flex-shrink-0 rounded-lg w-28 h-28 object-cover object-center sm:mb-0" src="img\soyuz.jpeg">';
                                break;
                            case 'Electron':
                                echo '<img alt="team" class="flex-shrink-0 rounded-lg w-28 h-28 object-cover object-center sm:mb-0" src="img\electron.jpg">';
                                break;
                            case 'Atlas V':
                                echo '<img alt="team" class="flex-shrink-0 rounded-lg w-28 h-28 object-cover object-center sm:mb-0" src="img\atlasv.jpg">';
                                break;
                            case 'Delta IV Heavy':
                                echo '<img alt="team" class="flex-shrink-0 rounded-lg w-28 h-28 object-cover object-center sm:mb-0" src="img\deltaivheavy.jpg">';
                                break;
                            default:
                                echo '<img alt="team" class="flex-shrink-0 rounded-lg w-28 h-28 object-cover object-center sm:mb-0" src="img\default.jpg">';
                                break;
                        }
                        ?>
                        <div class="flex-grow sm:pl-8 min-w-full w-full">
                            <h2 class="min-w-full text-semibold text-xl text-gray-900">{{ $up->mission_name }}</h2>
                            <h3 class="text-gray-500 mb-1min-w-full">{{ $up->launch_provider }} | {{ $up->rocket }}</h3>
                            <h3 class="min-w-full mb-3 w-full">{{ $up->location }}</h3>
                            <h3 class="min-w-full mb-1 w-full">{{ \Carbon\Carbon::parse($up->launch_date)->format('d/m/Y m:H:s') }} </h3>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="p-4 md:w-1/2 w-full">
            <div class="flex items-center justify-center lg:items-end lg:justify-end">
                <h1 class="mb-4 text-2xl font-semibold text-gray-800 dark:text-white">NASASpaceflight updates
                    <span class="flex shadow-lg mt-3 rounded-lg items-end justify-end">
                        <a class="twitter-timeline " data-width="450" data-height="480" data-chrome="nofooter" data-theme="light" href="https://twitter.com/NASASpaceflight?ref_src=twsrc%5Etfw">Tweets by NASASpaceflight</a>
                        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </span>
                </h1>
            </div>
        </div>
    </div>
</div>

@endsection