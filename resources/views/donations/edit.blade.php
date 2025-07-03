<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update donation - {{ $donation->name }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class=" bg-green-100">

    <form action="{{ route('campaign.update', $donation->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')

        <h1 class="text-2xl font-bold text-center mb-6 mt-10">Update Donation</h1>
        <div class="flex flex-col gap-4 items-center w-full max-w-md mx-auto p-6 bg-white rounded-lg shadow-lg shadow-gray-500">

            <input type="file" class="mb-4 border w-full border-green-600 rounded-md p-2" name="image" value="{{ old('image', $donation->image) }}" required>
            <input type="text" class="mb-4 border w-full border-green-600 rounded-md p-2" name="name" value="{{ old('name', $donation->name)}}" required>
            <input type="text" class="mb-4 border w-full border-green-600 rounded-md p-2" name="description" value="{{ old('description', $donation->description )}}" required>
            <input type="text" class="mb-4 border w-full border-green-600 rounded-md p-2" name="location" value="{{ old('location', $donation->location) }}" required>

            <select name="category" class="mb-4 border w-full border-green-600 rounded-md p-2"
                id="category" name="category" required>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category', $donation->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>


            <select name="type" class="mb-4 border w-full border-green-600 rounded-md p-2"
                id="type" name="type" required>
                @foreach ($types as $type)
                <option value="{{ $type->id }}" {{ old('type', $donation->types_id) == $type->id ? 'selected' : '' }}>
                    {{ $type->name }}
                </option>
                @endforeach
            </select>

            <input type="number" class="mb-4 border w-full border-green-600 rounded-md p-2" name="amount" value="{{ old('amount', $donation->amount) }}" required>

            <input type="submit" class="bg-green-600 hover:bg-green-900 duration-500 text-white shadow-lg shadow-gray-600 hover:shadow-sm  font-bold py-2 px-4 rounded-full text-sm" value="Update Donation">
        </div>


    </form>

</body>

</html>