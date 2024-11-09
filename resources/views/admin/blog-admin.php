<?php
include ('../../helper/auth-helper.php');

include ('../templates/database.php');

$sql = "SELECT * FROM blog";
$result = mysqli_query($connection, $sql);

$blogs = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $blogs[] = [
            'id' => $row['id'],
            'image_url' => $row['image_url'],
            'title' => $row['title'],
            'description' => $row['description'],
            'article' => $row['article']
        ];
    }
} else {
    echo "0 hasil";
}

mysqli_close($connection);

$title = "Admin | Blog";
include ('../templates/sidebarAdmin.php');
?>
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <a href="<?php echo BASE_URL; ?>/views/admin/blog-add-admin.php"><button type="button"
                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Add</button></a>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-16 py-3">
                            <span class="sr-only">Image</span>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($blogs as $blog) { ?>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="p-4">
                                <img src="../../public/images/<?php echo $blog['image_url'] ?>" class="w-16 md:w-32 max-w-full max-h-full"
                                    alt="blog">
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                <?php echo $blog['title'] ?>
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                <?php echo $blog['description'] ?>
                            </td>
                            <td class="px-6 py-4">
                                <a href="<?php echo BASE_URL; ?>/views/admin/blog-edit-admin.php?id=<?php echo $blog['id'] ?>"
                                    class="font-medium text-blue-600 hover:underline">Edit</a>
                                <a href="<?php echo BASE_URL; ?>/views/admin/blog-delete-admin.php?id=<?php echo $blog['id'] ?>"
                                    class="font-medium text-red-600 hover:underline">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>




<script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
</body>

</html>