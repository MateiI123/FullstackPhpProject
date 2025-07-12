

<?php
    loadPartials('head');
    loadPartials('navbar');
    loadPartials('top-banner');
?>



 <section class="container mx-auto p-4 mt-4">
   <div class="rounded-lg shadow-md bg-white p-3">
    <div class="flex justify-between items-center">
   <a class="block p-4 text-blue-700" href="/listings">
     <i class="fa fa-arrow-alt-circle-left"></i>
     Back To Listings
   </a>
   <div class="flex space-x-4 ml-4">
     <a href="/listing/edit?id=<?= $listing['id']?>" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</a>
     <!-- Delete Form -->
     <form method="POST">
       <input type = 'hidden' name = "_method" value = 'DELETE'>
       <input type = 'hidden' name = "_listing_id" value = <?= $listing['id'] ?>>
       <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded">Delete</button>
     </form>
     <!-- End Delete Form -->
   </div>
 </div>
     <div class="p-4">
       <h2 class="text-xl font-semibold"><?= $listing['title'] ?></h2>
       <p class="text-gray-700 text-lg mt-2">
         <?= $listing['description'] ?>
       </p>
     </div>
   </div>
 </section>

 

