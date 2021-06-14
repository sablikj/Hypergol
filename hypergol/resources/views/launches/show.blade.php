@extends('layouts.mainLayout')

@section('content')
<div class="container w-full">
    <div class="flex bg-yellow-400 my-4 flex items-center shadow justify-center py-2">
        @if($launch->launch_date > Now())
        <h1 class="text-2xl mr-4 px-4 font-medium tracking-wide text-gray-800 lg:text-4xl">
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
        @else
        <h1 class="text-2xl mr-4 px-4 font-medium tracking-wide text-gray-800 lg:text-4xl"> Launched on {{ \Carbon\Carbon::parse($launch->launch_date)->format('d/m/Y H:m:s') }}</h1>
        @endif
    </div>
    <div class="flex flex-wrap lg:space-x-28">
        <div class="p-4 my-4 w-full lg:w-5/12 shadow">
            <div class="px-3 py-2 sm:px-6">
                <h1 class="text-xl leading-6 font-medium text-gray-900">
                    Launch Details
                </h1>
            </div>
            <div class="border-t border-gray-200 ">
                <dl class="divide-y">
                    <div class="px-3 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-bold text-black">
                            Mission Name
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0">
                            {{ $launch->mission_name }}
                        </dd>
                    </div>
                    <div class="px-3 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-bold text-black">
                            Nation
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0">
                            {{ $launch->nation }}
                        </dd>
                    </div>
                    <div class="px-3 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-bold text-black">
                            Launch Provider
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0">
                            {{ $launch->launch_provider }}
                        </dd>
                    </div>
                    <div class="px-3 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-bold text-black">
                            Rocket
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0">
                            {{ $launch->rocket }}
                        </dd>
                    </div>
                    <div class="px-3 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-bold text-black">
                            Reused booster
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0">
                            @if($launch->launch_provider == 'SpaceX')Yes @else No @endif
                        </dd>
                    </div>
                    <div class="px-3 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-bold text-black">
                            Reused fairings
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0">
                            @if($launch->launch_provider == 'SpaceX')Yes @else No @endif
                        </dd>
                    </div>
                    <div class="px-3 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-bold text-black">
                            Location
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0">
                            {{ $launch->location }}
                        </dd>
                    </div>
                    <div class="px-3 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-bold text-black">
                            Payload
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0">
                            {{ $launch->payload }}
                        </dd>
                    </div>
                    <div class="px-3 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-bold text-black">
                            Payload Mass
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0">
                            {{ $launch->payload_mass }} Kg
                        </dd>
                    </div>
                    <div class="px-3 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-bold text-black">
                            Launch Date
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0">
                            {{ \Carbon\Carbon::parse($launch->launch_date)->format('d/m/Y H:m:s') }}
                        </dd>
                    </div>
                    <div class="px-3 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-bold text-black">
                        </dt>
                        <dd class="mt-3 text-sm text-gray-900 sm:mt-0">
                            <?php
                            switch ($launch->launch_provider) {
                                case 'SpaceX':
                                    echo '<a href="https://www.spacex.com/launches/" style="text-decoration:none;" class="block px-3 py-2 font-semibold text-center text-white transition-colors duration-200 transform bg-black rounded-md lg:inline hover:bg-gray-800">Watch Live</a>';
                                    break;
                                case 'Rocketlab':
                                    echo '<a href="https://www.rocketlabusa.com/live-stream/" style="text-decoration:none;" class="block px-3 py-2 font-semibold text-center text-white transition-colors duration-200 transform bg-black rounded-md lg:inline hover:bg-gray-800">Watch Live</a>';
                                    break;
                                case 'Roscosmos':
                                    echo '<a href="http://en.roscosmos.ru/317/" style="text-decoration:none;" class="block px-3 py-2 font-semibold text-center text-white transition-colors duration-200 transform bg-black rounded-md lg:inline hover:bg-gray-800">Watch Live</a>';
                                    break;
                                case 'ULA':
                                    echo '<a href="https://www.youtube.com/user/UnitedLaunchAlliance" style="text-decoration:none;" class="block px-3 py-2 font-semibold text-center text-white transition-colors duration-200 transform bg-black rounded-md lg:inline hover:bg-gray-800"></a>';
                                    break;
                                default:
                                    break;
                            }
                            ?>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
        <div class="shadow p-4 my-4 md:w-1/2 w-full">

            @switch($launch->launch_provider)
            @case ('SpaceX')
            @include('includes.providers.spacex')
            @break

            @case ('Roscosmos')
            @include('includes.providers.roscosmos')
            @break

            @case ('Rocketlab')
            @include('includes.providers.rocketlab')
            @break

            @case ('ULA')
            @include('includes.providers.ula')
            @break
            @endswitch
        </div>
    </div>

</div>




@endsection