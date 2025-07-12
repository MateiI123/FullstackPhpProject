<?php
    loadPartials('head');
    loadPartials('navbar');
    loadPartials('top-banner');
?>

<section class="flex justify-center items-center mt-20">
  <div class="bg-white p-8 rounded-lg shadow-md w-full md:w-600 mx-6">
    <h2 class="text-4xl text-center font-bold mb-4">Edit Task </h2>
   
     <form method="POST" action="/listing?id=<?= $listing['id'] ?>">
      <input type = "hidden"  name = "_method"  value = "PUT"/>
      <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
        Job Info
      </h2>
      <div class="mb-4">
        <input
          type="text"
          name="title"
          placeholder="Task Title"
          class="w-full px-4 py-2 border rounded focus:outline-none"
          value="<?= $listing['title']?>"
        />
      </div>
      <div class="mb-4">
        <input
          name="description"
          placeholder="Task Description"
          class="w-full px-4 py-2 border rounded focus:outline-none"
          value="<?= $listing['description']?>"
        />
      </div>
      <button
        class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none"
      >
        Save
      </button>
      <a
        href="/"
        class="block text-center w-full bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded focus:outline-none"
      >
        Cancel
      </a>
    </form>
  </div>
</section>



