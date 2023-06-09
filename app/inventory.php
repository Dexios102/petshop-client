<!DOCTYPE html>
<html lang="en">
<?php 
   include '../controls/inventory/inventory_con.php';
   include '../resources/includes/inventory_validate.php';
?>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Inventory</title>
   <link rel="stylesheet" href="../styles/main.css">
   <script src="https://cdn.tailwindcss.com"></script>
   <script type="text/javascript" src="../node_modules/tw-elements/dist/js/tw-elements.umd.min.js"></script>
   <link href="/dist/output.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>

<body>
   <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200">
      <div class="px-3 py-3 lg:px-5 lg:pl-3">
         <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
               <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                  type="button" class="inline-flex items-center
           p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none
            focus:ring-2 focus:ring-gray-200 dark:text-gray-400">
                  <span class="sr-only">Open sidebar</span>
                  <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                     <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012
                  4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                     </path>
                  </svg>
               </button>
               <a href="../index.html" class="flex ml-2 md:mr-24">
                  <img src="../resources/images/098cfa107b3fa97496db3f892419d5fc.png" class="h-12 w-12 mr-3"
                     alt="Petshop Logo" />
                  <span class="self-center text-xl font-bold sm:text-2xl whitespace-nowrap">Petshop
                     Inventory</span>
               </a>
            </div>
            <div class="flex items-center">
               <div class="flex items-center ml-3">
                  <div>
                     <button type="button"
                        class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300"
                        aria-expanded="false" data-dropdown-toggle="dropdown-user" onclick="toggleDropdown()">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 rounded-full" src="../resources/images/icon-256x256.png" alt="user photo">
                     </button>
                  </div>
                  <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow"
                     id="dropdown-user">
                     <div class="px-4 py-3" role="none">
                        <p class="text-sm text-gray-900" role="none">
                           <?php echo $_SESSION['fullname'] ?>
                        </p>
                        <p class="text-sm font-medium text-gray-900 truncate" role="none">
                           <?php echo $_SESSION['email'] ?>
                        </p>
                     </div>
                     <ul class="py-1" role="none">
                        <li>
                           <a href="../index.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                              role="menuitem">Dashboard</a>
                        </li>
                        <li>
                           <a href="../controls/logout.php"
                              class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign
                              out</a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </nav>

   <aside id="logo-sidebar"
      class="fixed top-0 left-0 z-40 w-60 h-screen pt-28 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
      aria-label="Sidebar">
      <div class="h-full px-2 pb-4 overflow-y-auto">
         <ul class="space-y-6 font-medium">
            <li>
               <a href="../index.php" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 pl-7">
                  <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                     fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                     <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                     <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                  </svg>
                  <span class="ml-5">Dashboard</span>
               </a>
            </li>
            <li>
               <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 pl-7">
                  <svg aria-hidden="true"
                     class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                     fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                     <path
                        d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z">
                     </path>
                     <path
                        d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z">
                     </path>
                  </svg>
                  <span class="flex-1 ml-5 whitespace-nowrap">Inventory</span>
               </a>
            </li>
            <li>
               <a href="orders.php" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 pl-7">
                  <svg aria-hidden="true"
                     class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                     fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                        clip-rule="evenodd"></path>
                  </svg>
                  <span class="flex-1 ml-5 whitespace-nowrap">Orders</span>
               </a>
            </li>
            <li>
               <a href="components/auth/login.html"
                  class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 pl-7">
                  <svg aria-hidden="true"
                     class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                     fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd"
                        d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                        clip-rule="evenodd"></path>
                  </svg>
                  <span class="flex-1 ml-5 whitespace-nowrap">Logout</span>
               </a>
            </li>
         </ul>
      </div>
   </aside>
   <div class="p-10 sm:ml-64">
      <div class="container items-center px-1 py-10 m-auto mt-5">
         <h1 class="text-3xl font-bold text-gray-600 uppercase tracking-wide mb-5">
            Inventory Data</h1>
         <div class="flex items-center justify-between pb-4">
            <button id="addButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
               <i class="fa-sharp fa-regular fa-plus" style="color: #fafafa;"></i>
               Add
            </button>
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
               <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                  <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd"></path>
                  </svg>
               </div>
               <input type="text" id="table-search-users"
                  class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-200 focus:ring-blue-500 focus:border-blue-500"
                  placeholder="Search for products">
            </div>
         </div>
         <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500" id="table">
               <thead class="text-base text-white uppercase bg-blue-500 text-center">
                  <tr>
                     <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Image</span>
                     </th>
                     <th scope="col" class="px-6 py-3">
                        Product
                     </th>
                     <th scope="col" class="px-6 py-3">
                        Description
                     </th>
                     <th scope="col" class="pl-20 text-left">
                        Qty
                     </th>
                     <th scope="col" class="px-6 py-3">
                        Price
                     </th>
                     <th scope="col" class="px-6 py-3">
                        Action
                     </th>
                  </tr>
               </thead>
               <tbody>
               <?php
                  $select = "SELECT * FROM tbl_inventory";
                  $selectstatement = $pdo -> query($select);
                  $result = $selectstatement->fetchAll(PDO::FETCH_ASSOC);
                  if ($result) {
                     foreach ($result as $r) {
                           ?>
                              <tr class="bg-gray-100 border-b hover:bg-gray-200 text-center">
                                 <td class="w-32 p-4">
                                    <img
                                       src="<?php echo "../controls/media/".$r['img'] ?>"
                                       alt="Product Image">
                                 </td>
                                 <td class="px-6 py-4 font-semibold text-gray-900">
                                    <?php echo $r['product_name'] ?>
                                 </td>
                                 <td class="px-6 py-4 font-semibold text-gray-900">
                                    <?php echo $r['description'] ?>
                                 </td>
                                 <td class="px-6 py-4 pl-10">
                                    <div class="flex items-center space-x-3">
                                       <button onclick="deductProd('<?php echo $r['inv_id'] ?>')" class="inline-flex items-center p-1 text-sm font-medium text-gray-500 bg-white border border-gray-300
                                    rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200"
                                          type="button">
                                          <span class="sr-only">Quantity button</span>
                                          <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                             xmlns="http://www.w3.org/2000/svg">
                                             <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                                clip-rule="evenodd"></path>
                                          </svg>
                                       </button>
                                       <div>
                                          <div
                                          id="first_product_<?php echo $r['inv_id'] ?>" class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                          focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1" 
                                          > <?php echo $r['quantity'] ?> </div>
                                       </div>
                                       <button onclick="addProd('<?php echo $r['inv_id'] ?>')" class="inline-flex items-center p-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none
                                    hover:bg-gray-100 focus:ring-4 focus:ring-gray-200" type="button">
                                          <span class="sr-only">Quantity button</span>
                                          <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                             xmlns="http://www.w3.org/2000/svg">
                                             <path fill-rule="evenodd"
                                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                clip-rule="evenodd"></path>
                                          </svg>
                                       </button>
                                    </div>
                                 </td>
                                 <td class="px-6 py-4 font-semibold text-gray-900">
                                    <?php echo "₱".$r['price'] ?>
                                 </td>
                                 <td class="px-6 py-4">
                                    <a href="../controls/inventory/delete_inventory.php?a=<?php echo $r['inv_id'] ?>" class="font-medium text-red-600 hover:underline">Remove</a>
                                 </td>
                              </tr>
                           <?php
                           }
                     }
                     
                  
               ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
         <script>
            function addProd(id){
               var prod_input = document.getElementById('first_product_'+id).innerHTML;
               new_val = prod_input;
               new_val++
               document.getElementById('first_product_'+id).innerHTML = new_val;

               $.ajax({
                  url: '../controls/inventory/update_inventory.php',
                  type: 'POST',
                  data: {
                        id: id,
                        quantity: new_val
                  },
                  cache: false,
                  success: function(){
                     document.getElementById('first_product_'+id).innerHTML = new_val;
                  }
               })
            }

            function deductProd(id){
               var prod_input = document.getElementById('first_product_'+id).innerHTML;
               new_val = prod_input;
               new_val--

               $.ajax({
                  url: '../controls/inventory/update_inventory.php',
                  type: 'POST',
                  data: {
                        id: id,
                        quantity: new_val
                  },
                  cache: false,
                  success: function(){
                     document.getElementById('first_product_'+id).innerHTML = new_val;
                  }
               })
            }
         </script>
   <!-- Modal -->
   <div id="modal" class="fixed top-0 left-0 w-full h-full flex justify-center items-center bg-opacity-50 hidden">
      <div class="bg-white rounded shadow-lg p-8">
         <h2 class="text-2xl font-bold mb-4">Add Product</h2>
         <?php echo $msg ?>
         <form method="POST" enctype="multipart/form-data">   
            <div class="mb-4">
               <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image:</label>
               <input type="file" id="image" name="image" accept="image/png, image/gif, image/jpeg"
                  class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
               <label for="productName" class="block text-gray-700 text-sm font-bold mb-2">Product Name:</label>
               <input type="text" id="productName" name="product_name"
                  class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
               <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
               <textarea id="description" name="description"
                  class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>
            <div class="mb-4">
               <label for="quantity" class="block text-gray-700 text-sm font-bold mb-2">Quantity:</label>
               <input type="number" id="quantity" name="quantity"
                  class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
               <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price:</label>
               <input type="number" id="price" name="price"
                  class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="flex justify-end gap-2">
               <button type="submit" name="save" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                  Save
               </button>
               <button type="button" id="closeButton"
                  class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                  Close
               </button>
            </div>
         </form>
      </div>
   </div>

</body>
<script src="../function/dropdown-user.js"></script>
<script src="../function/search.js"></script>
<script>
   const addButton = document.getElementById('addButton');
   const modal = document.getElementById('modal');
   const closeButton = document.getElementById('closeButton');

   addButton.addEventListener('click', () => {
      modal.classList.remove('hidden');
      document.body.classList.add('modal-active');
   });

   closeButton.addEventListener('click', () => {
      modal.classList.add('hidden');
      document.body.classList.remove('modal-active');
   });

   document.addEventListener('click', (event) => {
      if (!modal.contains(event.target) && !event.target.matches('#addButton')) {
         modal.classList.add('hidden');
         document.body.classList.remove('modal-active');
      }
   });
</script>

</html>