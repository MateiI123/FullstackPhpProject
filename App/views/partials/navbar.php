  <!-- Nav -->


    <header class="bg-blue-900 text-white p-4">
       <div class="container mx-auto flex justify-between items-center">
         <nav class="space-x-4">
          <?php if(Session::exist('user')):?>
            
            <div class="flex justify-between items-center gap-4">

            <div>
              Welcome <?= Session::get('user')['name']?>
            </div>

             <form method = "POST" action = "/auth/logout">
                <button type = "submit" class = "text-white inline hover:underline">Logout</button>
             </form>
            
             <a
            href="/listings/create"
            class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded hover:shadow-md transition duration-300"
            ><i class="fa fa-edit"></i> Create a task</a
          >
          </div>
          <?php else: ?>
           <a href="/auth/login" class="text-white hover:underline">Login</a>
           <a href="/auth/register" class="text-white hover:underline">Register</a>
        
          <?php endif;?>

         
        </nav>
      </div>
    </header>