<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>List donations</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class=" bg-green-100">
    <main class="m-20 py-10">
        @if (session('success'))
        <div class="bg-white text-green-800 p-4 border-t-3 border-x-4 border-green-800  rounded-3xl mb-4 text-center text-3xl font-bold animate-pulse shadow-lg shadow-gray-500" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <h1 class="text-2xl font-bold text-center mb-10 text-shadow-lg text-shadow-gray-400 font-fredoka">List of Donations</h1>
        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 ">
            @foreach ($donation as $donatio)
            <div class="border-1 border-gray-300 rounded-2xl p-5 shadow-lg hover:shadow-sm shadow-gray-400 bg-white duration-300 cursor-default">
                <div class="relative overflow-hidden rounded-xl">
                    <img src='{{ Storage::url($donatio->img) }}' alt="campaign" class=" w-full h-60 transition duration-400 hover:scale-110 " />
                    <p class="absolute bottom-4 right-4 bg-neutral-200 opacity-70 rounded-full py-1 px-4 text-xs text-center text-black">{{$donatio->location}}</p>
                </div>
                <p class="text-xs text-center mt-3 text-gray-500">{{$donatio->name}} - Organizer</p>
                <h3 class="text-center font-bold text-green-900">{{$donatio->description}}</h3>
                <p class="text-xs text-center mt-1 text-gray-500">Category: {{$donatio->categories->name}}</p>
                <p class="text-xs text-center mt-1 text-gray-500">Type: {{$donatio->types->name}}</p>


                <div class="w-full bg-gray-200 rounded-full h-3 mt-4 overflow-hidden">
                    <div
                        class="bg-green-600 h-3 transition-all duration-500 ease-in-out">
                        `
                    </div>
                </div>

                <p class="text-sm text-right text-green-900 mt-1">
                    {props.progress}% funded
                </p>

                <p class="text-xs text-center mt-2 text-gray-700">
                    <span class="font-semibold text-sm block">Fund Details</span>
                    <span class="block">Goal: ₡ {{$donatio->amount}} </span>
                </p>

                <div class="flex justify-between mt-4 items-center">

                    <form action="{{ route('campaign.destroy', $donatio->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this?');" class="w-1/2">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-500 hover:bg-red-700 text-white duration-500 font-bold py-2 px-4 rounded-full text-sm max-md:text-[0.7rem] shadow-lg shadow-gray-500 hover:shadow-sm">
                            Eliminate
                        </button>
                    </form>
                    <div class="bg-blue-500 hover:bg-blue-700 duration-500 text-white font-bold py-2 px-4 rounded-full text-sm max-sm:w-1/2 max-md:text-[0.7rem] text-center shadow-lg shadow-sky-800 hover:shadow-sm">
                        <a href="{{ route('campaign.edit', $donatio->id) }}">
                            update
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </section>
        <div class="flex w-full justify-center items-center mt-10">
            <a href="{{ route('campaign.create') }}"
                class="bg-green-600 hover:bg-green-900 duration-500 text-white shadow-lg shadow-gray-600 hover:shadow-sm  font-bold py-2 px-4 rounded-full text-sm">
                Create New Donation
            </a>
        </div>
    </main>
</body>

</html>