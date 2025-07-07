<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create donation</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <section>
        <div class="flex flex-col justify-center items-center min-h-dvh text-green-900 gap-10 font-fredoka min-md:gap-20 min-md:pb-35 min-md:pt-15">
            <div class="flex text-center w-full mb-20 ">
                <a href="{{ route('campaign.show') }}">
                    <button class="absolute left-1/6 text-black text-2xl text-shadow-xs text-shadow-green-300 hover:text-shadow-lg font-regular hover:cursor-pointer hover:scale-110 duration-500 justify-start  ">
                        << Back </button></a>
                <h1 class=" mr-8 gap-x-5 text-3xl font-regular min-md:text-3xl text-black text-center w-full">
                    Create Donation
                </h1>
            </div>


            <form action="{{ route('campaign.store') }}" class="flex flex-col gap-1 w-3/4 min-md:gap-3 min-md:text-3xl min-md:w-2/3" method="POST" enctype="multipart/form-data">
                @csrf

                <label class="font-semibold relative left-1/6 min-md:font-medium">Image</label>
                <label for="fileInput" id="previewImage" class='cursor-pointer pt-5 border-b-2 mb-8 hover:scale-105 duration-300 text-2xl px-8 min-md:px-28' required>Upload file</label>
                <input id="fileInput" value="{{ old('image') }}" name="image" type="file" accept="image/png, image/jpg, image/jpeg/*" class="hidden" required />

                <label class="font-semibold relative left-1/6 min-md:font-medium">Donation Title</label>
                <input type="text" name="name" value="{{ old('name') }}" class="border-b-2 mb-8 text-2xl outline-none hover:scale-105 duration-300 px-8 min-md:px-28" required />

                <label class="font-semibold relative left-1/6 min-md:font-medium">Description</label>
                <input type="text" name="description" value="{{ old('description') }}" class="border-b-2 text-2xl outline-none mb-8 hover:scale-105 duration-300 px-8 min-md:px-28" required />

                <label class="font-semibold relative left-1/6 min-md:font-medium">Location</label>
                <input type="text" name="location" value="{{ old('location') }}" class="border-b-2 text-2xl outline-none mb-8 hover:scale-105 duration-300 px-8 min-md:px-28" required />


                <label class="font-semibold relative left-1/6 min-md:font-medium ">Category</label>
                <select value='' name="categories_id" class="mb-8 px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-white text-gray-800 focus:outline-none focus:ring-2 focus:ring-green-600 hover:scale-105 duration-300">
                    <option value="" disabled>Select Category</option>
                    @foreach ($categories as $category)
                    <option key=categories name="category" required value='{{$category->id}}'>
                        {{$category->name}}
                    </option>
                    @endforeach
                </select>


                <label class="font-semibold relative left-1/6 min-md:font-medium">Type</label>
                <select value='selected Type' name="types_id" class="mb-8 px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-white text-gray-800 focus:outline-none focus:ring-2 focus:ring-green-600 hover:scale-105 duration-300">
                    <option value="" disabled>Select Type</option>
                    @foreach ($types as $type)
                    <option key=types required value='{{$type->id}}' {{ (old('type')) == $type->id ? 'selected' : '' }}>
                        {{$type->name}}
                    </option>
                    @endforeach

                </select>


                <label class="font-semibold relative left-1/6 min-md:font-medium">Amount</label>
                <div class="relative hover:scale-105 duration-300">
                    <span class="absolute top-0 left-4 min-md:left-20">₡</span>
                    <input type="number" name="amount" value="{{ old('amount') }}" class="border-b-2 text-2xl outline-none mb-8 w-full px-8 min-md:px-28" min=0 required />
                </div>

                <button type="submit" class="text-white text-center bg-green-900 duration-400 hover:cursor-pointer hover:scale-110 hover:bg-green-950 rounded-xl py-2  min-md:py-4 mt-8">Create a donation</button>
            </form>
        </div>
    </section>

    <script>
        const fileInput = document.getElementById('fileInput');
        const imageNameElement = document.createElement('span');

        fileInput.addEventListener('change', (e) => {
            const file = fileInput.files[0];
            const fileName = file.name;


            
            const previewImage = document.getElementById('previewImage');
            previewImage.textContent = fileName;
            
            previewImage.parentNode.appendChild(imageNameElement, previewImage);
        });
    </script>
</body>

</html>