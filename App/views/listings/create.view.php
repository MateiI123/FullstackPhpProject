<?php
    loadPartials('head');
    loadPartials('navbar');
    loadPartials('top-banner');
?>

<section class="flex justify-center items-center mt-20">
  <div class="bg-white p-8 rounded-lg shadow-md w-full md:w-600 mx-6">
    <h2 class="text-4xl text-center font-bold mb-4">Create Task</h2>
    <!-- <div class="message bg-red-100 p-3 my-3">This is an error message.</div>
    <div class="message bg-green-100 p-3 my-3">
      This is a success message.
    </div> -->
    <form method="POST" , action="/listings">
      <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
        Job Info
      </h2>
      <?php if(isset($errors)) :?>
        <?php foreach ($errors as $error) :?>
          <div class= "message bg-red-100 my-3"><?= $error ?></div>
        <?php endforeach; ?>
      <?php endif; ?>  
      <div class="mb-4">
        <input
          type="text"
          name="title"
          placeholder="Task Title"
          class="w-full px-4 py-2 border rounded focus:outline-none"
        />
      </div>
      <div class="mb-4">
        <textarea
          name="description"
          placeholder="Task Description"
          class="w-full px-4 py-2 border rounded focus:outline-none"
        ></textarea>
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

