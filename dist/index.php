<?php
// Include the database connection
include 'db.php';

$sql = "SELECT * FROM blogs";
$result = $conn->query($sql);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dev Nexus</title>
    <link rel="stylesheet" href="output.css">
    <style>
        * {
            color: #0f0f;
        }

        img {
            height: 100%;
            height: 100px;
        }
    </style>
</head>

<body class="bg-black">

    <div class="grid md:grid-cols-5 sm:grid-cols-1 gap-4 p-4 w-full">
        <!-- Navbar (Left) -->
        <aside class="hidden md:block bg-black">
            <nav class="p-4 rounded-lg shadow-md col-span-1  fixed top-0 left-0 w-1/5 ">
                <ul class="space-y-2">
                    <h1 class="p-3 text-xl">👩‍💻DevNexus</h1>
                    <li class="rounded p-3 hover:bg-slate-600 transition-colors duration-300 ease-in"><a href="#"
                            class="text-blue-500 hover:underline">🏠 Home</a></li>
                    <li class="rounded p-3 hover:bg-slate-600 transition-colors duration-300 ease-in"><a href="#"
                            class="text-blue-500 hover:underline">🗃 Reading List</a></li>
                    <li class="rounded p-3 hover:bg-slate-600 transition-colors duration-300 ease-in"><a href="tags.php"
                            class="text-blue-500 hover:underline">📑 Tags</a></li>
                    <li class="rounded p-3 hover:bg-slate-600 transition-colors duration-300 ease-in"><a href="#"
                            class="text-blue-500 hover:underline">👨 About</a></li>
                    <li class="rounded p-3 hover:bg-slate-600 transition-colors duration-300 ease-in"><a href="#"
                            class="text-blue-500 hover:underline">📯 Contact</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content (Center) -->

        <main class="col-span-2 p-4" style="margin-top:50px;">

            <!-- Fixed Top Block -->
            <div class="flex flex-1  items-center fixed top-0 left-1/5 w-full  z-10 p-4 ">
                <div class="flex space-x-4">
                    <button class="rounded p-3 hover:bg-slate-600 transition-colors duration-300 ease-in">Relevant</button>
                    <button class="rounded p-3 hover:bg-slate-600 transition-colors duration-300 ease-in">Latest</button>
                    <button class="rounded p-3 hover:bg-slate-600 transition-colors duration-300 ease-in">Top</button>
                </div>
                <div class="flex space-x-4 items-center gap-4 " style="margin-left:388px;">
                    <input type="text" class="p-3 w-72 border rounded" placeholder="Search...">
                    <a href="write.html"> <button class="rounded border p-3">Create Post</button> </a>
                </div>
            </div>

            <!-- Blog Content -->
            <div class="grid grid-cols-1 gap-4 ">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<a href="post.php?id=' . $row["id"] .  '">';
                        echo ' <article class="p-4 rounded-lg shadow w-full border border-gray-300 flex">';
                        echo '<div class="img">';
                        // echo '<img src = "../src/img/1.avif">  ';
                        echo '</div>';
                        echo '<div style="display:block;margin-left:12px">';
                        echo '<h3>Raj Sharma </h3>';
                        echo '<p>29-08-24</p>';
                        echo '<h2 class="text-xl font-semibold">' . $row["title"] . "</h2>";
                        echo '<p class="text-white">' . $row["content"] . "</p>";
                        echo '<div class="flex" >';
                        echo '<p style="color:white;margin-left:12px;">#php</p>';
                        echo '<p style="color:white;margin-left:12px;">#html</p>';
                        echo '<p style="color:white;margin-left:12px">#css</p>';
                        echo '</div>';
                        echo '</div>';

                        echo '</article>';

                        echo '</a>';
                    }
                } else {
                    echo "No blog entries found.";
                }
                ?>
            </div>
        </main>

        <!-- Sidebar (Right) -->

        <aside class="p-4 rounded-lg col-span-2 h-[100vh]" style='margin-top:50px;'>
            <div class="p-4 rounded border h-52 ">
                <h2 class="text-lg font-semibold ">Image</h2>
            </div>
            <div class="mt-8 border p-4 rounded">
                <h2 class="text-lg font-semibold ">Popular Tags</h2>
                <ul class="space-y-2">
                    <li><a href="#" class="text-blue-500 hover:underline">Webdev</a></li>
                    <li><a href="#" class="text-blue-500 hover:underline">JavaScript</a></li>
                    <li><a href="#" class="text-blue-500 hover:underline">Python</a></li>
                </ul>
            </div>
        </aside>
    </div>

</body>

</html>