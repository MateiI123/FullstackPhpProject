<?php
    loadPartials('head');
    loadPartials('navbar');


    ?>



<div class="flex justify-center items-center mt-20">
  <div class="bg-white p-8 rounded-lg shadow-md w-full md:w-500 mx-6">
    <h2 class="text-4xl text-center font-bold mb-4">Login</h2>
       <?php if(isset($errors)) :?>
        <?php foreach ($errors as $error) :?>
          <div class= "message bg-red-100 my-3"><?= $error ?></div>
        <?php endforeach; ?>
      <?php endif; ?>  
    <form method = "POST" action = "/auth/login">
      <div class="mb-4">
        <input
          type="email"
          name="email"
          placeholder="Email Address"
          class="w-full px-4 py-2 border rounded focus:outline-none"
        />
      </div>
      <div class="mb-4">
        <input
          type="password"
          name="password"
          placeholder="Password"
          class="w-full px-4 py-2 border rounded focus:outline-none"
        />
      </div>
      <button
        type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded focus:outline-none"
      >
        Login
      </button>

      <p class="mt-4 text-gray-500">
        Don't have an account?
        <a class="text-blue-900" href="/auth/register">Register</a>
      </p>
    </form>
  </div>
</div>


