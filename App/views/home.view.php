

<?php
    loadPartials('head');
    loadPartials('navbar');
    loadPartials('top-banner');
?>



    <!-- Job Listings -->
    <section>
      <div class="container mx-auto p-4 mt-4">
        <div class="text-center text-3xl mb-4 font-bold border border-gray-300 p-3">Recent Tasks</div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
          <!-- Job Listing 1: Software Engineer -->
        <?php if(isset($listings)): ?>
        <?php foreach($listings as $listing): ?>
          <div class="job-card relative rounded-lg shadow-md bg-white transition-all">
            <!-- Complete Button -->
            <button
               onclick="markAsCompleted(this)" 
               class="bg-indigo-100 text-indigo-700 px-4 py-2 rounded-md font-medium hover:bg-indigo-200 transition">
              Complete
            </button>

            <div class="p-4">
              <h2 class="text-xl font-semibold"><?= $listing['title']?></h2>
              <p class="text-gray-700 text-lg mt-2">
                <?= $listing['description'] ?? ''?>
              </p>
              <a href="/listing?id=<?= $listing['id']?>"
                class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
                Details
                </a>
              </div>
            </div>
        <?php endforeach ?>
        <?php endif ?>
          <!-- Job Listing 2: Marketing Specialist -->
          
        </div>
        <a href="/listings" class="block text-xl text-center">
          <i class="fa fa-arrow-alt-circle-right"></i>
          Show All Tasks
        </a>
      </section>
      <script>
       function markAsCompleted(button) {
        button.textContent = 'Completed ';
        button.classList.remove('bg-indigo-100', 'text-indigo-700', 'hover:bg-indigo-200');
        button.classList.add('bg-green-600', 'text-indigo', 'cursor-not-allowed');
        button.disabled = true;
  }
</script>

<?php 

loadPartials("footer");


?>