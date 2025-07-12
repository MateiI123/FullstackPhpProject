 

<?php
    loadPartials('head');
    loadPartials('navbar');
    loadPartials('top-banner');
?>



    <!-- Job Listings -->
    <section>
      <div class="container mx-auto p-4 mt-4">
        <div class="text-center text-3xl mb-4 font-bold border border-gray-300 p-3">All Tasks</div>

        <?php if(isset($_SESSION['success_message'])) : ?>
          <div class = "message bg-reen-100 p-3 my-3">
              <?= $_SESSION['success_message'] ?>
          </div>
          <?php unset($_SESSION['success_message']) ?>
        <?php endif  ?>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
          <?php if(isset($listings)): ?>
           <?php foreach($listings as $listing): ?>
                <div class="rounded-lg shadow-md bg-white">
                  <div class="p-4">
                    <h2 class="text-xl font-semibold"><?= $listing['title']?></h2>
                    <p class="text-gray-700 text-lg mt-2">
                      <?= $listing['description'] ?? '' ?>
                    </p>
                    <a href="/listing?id=<?= $listing['id']?>"
                      class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium text-indigo-700 bg-indigo-100 hover:bg-indigo-200"
                    >
                      Details
                    </a>
                  </div>
                </div>
            <?php endforeach ?>
          <?php endif ?>
          </div>
        </div>
      </section>

<?php

loadPartials('footer');

?>