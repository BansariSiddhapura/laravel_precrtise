<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <title>Alpine CRUD</title>
</head>
<body class="bg-gray-100 min-h-screen">
  <!-- Main Container -->
  <div class=" mx-auto px-4 py-6" x-data="clientData()">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
      <!-- Table Section -->
      <div class="lg:col-span-2 bg-white shadow-md rounded-lg p-2">
        <h2 class="text-2xl font-bold text-gray-800 text-center mb-4">User Data Table</h2>
        <div class="overflow-x-auto">
          <table class="table-auto w-full border-collapse border border-gray-300">
            <thead class="bg-gray-200 text-gray-700">
              <tr>
                <th class="px-4 py-2 border">ID</th>
                <th class="px-4 py-2 border">Name</th>
                <th class="px-4 py-2 border">Email</th>
                <th class="px-4 py-2 border">Mobile</th>
                <th class="px-4 py-2 border">City</th>
                <th class="px-4 py-2 border">Actions</th>
              </tr>
            </thead>
            <tbody>
              <template x-for="client in clients" :key="client.id">
                <tr class="hover:bg-gray-50">
                  <td class="px-4 py-2 border text-center" x-text="client.id"></td>
                  <td class="px-4 py-2 border text-gray-800" x-text="client.Name"></td>
                  <td class="px-4 py-2 border text-gray-800" x-text="client.Email"></td>
                  <td class="px-4 py-2 border text-center" x-text="client.Mno"></td>
                  <td class="px-4 py-2 border text-gray-800" x-text="client.City"></td>
                  <td class="px-4 py-2 border text-center">
                    <button class="bg-blue-500 text-white py-1 px-2 rounded-md hover:bg-blue-600" x-on:click="editClient(client.id)">Edit</button>
                    <button class="bg-red-500 text-white py-1 px-2 rounded-md hover:bg-red-600" x-on:click="deleteClient(client.id)">Delete</button>
                  </td>
                </tr>
              </template>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Form Section -->
      <div class="p-6">
        <form class="space-y-6" @submit.prevent="saveClient()">
          <!-- Hidden ID Field -->
          <input type="hidden" x-model="id" id="id">

          <h2 class="text-2xl font-bold text-gray-800 text-center">User Information</h2>

          <!-- Name Field -->
          <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" x-model="Name" id="Name"
              class="mt-1 p-2.5 w-full border rounded-lg focus:ring-blue-500 focus:border-blue-500 text-gray-800"
              placeholder="Enter your name" required >
          </div>

          <!-- Email Field -->
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" x-model="Email" id="Email"
              class="mt-1 p-2.5 w-full border rounded-lg focus:ring-blue-500 focus:border-blue-500 text-gray-800"
              placeholder="Enter your email" required>
          </div>

          <!-- Mobile Number Field -->
          <div>
            <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile Number</label>
            <input type="number" x-model="Mobile" id="Mno"
              class="mt-1 p-2.5 w-full border rounded-lg focus:ring-blue-500 focus:border-blue-500 text-gray-800"
              placeholder="Enter your mobile number" required>
          </div>

          <!-- City Field -->
          <div>
            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
            <input type="text" x-model="City" id="City"
              class="mt-1 p-2.5 w-full border rounded-lg focus:ring-blue-500 focus:border-blue-500 text-gray-800"
              placeholder="Enter your city"  required >
          </div>

          <!-- Submit Button -->
          <div>
            <button type="submit"
              class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300" >
              Submit
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    function clientData() {
      return {
        clients: @json($clients), // Pass clients from Laravel to Alpine.js
        id : '',
        Name : '',
        Email : '',
        Mobile : '',
        City : '',
        alertShow : false,
        //save client
        saveClient(){
          axios.post('clients/store',{
            id : this.id,
            Name : this.Name,
            Email : this.Email,
            Mno : this.Mobile,
            City : this.City,
          }).then(response=>{
            console.log(response.data.message);
            
          })
          .finally(function() {
              location.reload();
            })
        },

        //edit client
        editClient(id){
          axios.get(`/${id}`)
                .then(response => {
                    editData = response.data;
                    console.log(editData);
                    this.id=editData.id;
                    this.Name=editData.Name;
                    this.Email=editData.Email;
                    this.Mobile=editData.Mno;
                    this.City=editData.City;            
                })
        },

        //delete client
        deleteClient(id) {
          //console.log(id);
          if (confirm('Are you sure you want to delete this user?')) {
            axios.delete(`clients/delete/${id}`
            )
            .finally(function() {
              location.reload();
            })
            .catch(function(error) {
              console.log(error);
            });
          }
        }
      };
    }
  </script>
</body>
</html>
