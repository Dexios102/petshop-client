<!DOCTYPE html>
<html lang="en">
  <?php 
    include '../../controls/auth_control/register_con.php'
  ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an account</title>
    <link rel="stylesheet" href="styles/main.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="flex h-screen justify-center items-center">
        <div class="bg-white shadow-lg rounded-lg px-8 py-10 w-90">
          <h2 class="text-2xl font-bold mb-6">Register</h2>
          <?php echo $msg ?>
          <form method="POST">
            <div class="mb-4">
              <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
              <input type="text" id="name" name="fullname" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-4">
              <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
              <input type="email" id="email" name="email" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-6">
              <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
              <input type="password" id="password" name="password" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500">
            </div>
            <div class="flex items-center justify-between gap-8">
              <button type="submit" name="signup" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Register
              </button>
              <a href="./login.php" class="text-blue-500 text-sm">Already have an account? Login</a>
            </div>
          </form>
        </div>
      </div>
</body>
</html>