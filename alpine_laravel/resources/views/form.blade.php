<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  @vite(['resources/css/app.css','resources/js/app.js'])
  <title>Form</title>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <form class="bg-white shadow-md rounded-lg p-8 max-w-md w-full space-y-6">
    <!-- Hidden ID Field -->
    <input type="hidden" id="id" name="Id" value="">

    <!-- Form Title -->
    <h2 class="text-2xl font-bold text-gray-800 text-center">User Information</h2>

    <!-- Name Field -->
    <div>
      <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
      <input
        type="text"
        id="name"
        name="Name"
        class="mt-1 p-2.5 w-full border rounded-lg focus:ring-blue-500 focus:border-blue-500 text-gray-800"
        placeholder="Enter your name"
        required
      >
    </div>

    <!-- Email Field -->
    <div>
      <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
      <input
        type="email"
        id="email"
        name="Email"
        class="mt-1 p-2.5 w-full border rounded-lg focus:ring-blue-500 focus:border-blue-500 text-gray-800"
        placeholder="Enter your email"
        required
      >
    </div>

    <!-- Mobile Number Field -->
    <div>
      <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile Number</label>
      <input
        type="number"
        id="mobile"
        name="Mno"
        class="mt-1 p-2.5 w-full border rounded-lg focus:ring-blue-500 focus:border-blue-500 text-gray-800"
        placeholder="Enter your mobile number"
        required
      >
    </div>

    <!-- City Field -->
    <div>
      <label for="city" class="block text-sm font-medium text-gray-700">City</label>
      <input
        type="text"
        id="city"
        name="City"
        class="mt-1 p-2.5 w-full border rounded-lg focus:ring-blue-500 focus:border-blue-500 text-gray-800"
        placeholder="Enter your city"
        required
      >
    </div>

    <!-- Submit Button -->
    <div>
      <button
        type="submit"
        class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300"
      >
        Submit
      </button>
    </div>
  </form>
</body>
</html>
