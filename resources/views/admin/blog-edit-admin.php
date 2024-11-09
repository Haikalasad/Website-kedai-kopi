<?php
include ('../../config/config.php');

include ('../templates/database.php');

if (isset($_POST['update'])) {

    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $article = $_POST['article'];

    if ($_FILES['image_url']["name"] != "") {
        $namaFile = $_FILES["image_url"]["name"];
        $ukuranFile = $_FILES["image_url"]["size"];
        $tmpName = $_FILES["image_url"]["tmp_name"];
        $error = $_FILES["image_url"]["error"];

        $folderTujuan = "../../public/images/";
        move_uploaded_file($tmpName, $folderTujuan . $namaFile);
        $image_url = $namaFile;

        $result = mysqli_query($connection, "UPDATE blog SET image_url='$image_url', title='$title', description='$description', article='$article' WHERE id=$id");
    } else {
        $result = mysqli_query($connection, "UPDATE blog SET title='$title', description='$description', article='$article' WHERE id=$id");
    }


    header("Location: blog-admin.php");

} else {
    $id = $_GET['id'];

    $sql = "SELECT * FROM blog WHERE id=" . $id;
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
        $blog = $blogs[0];
    } else {
        echo "Data tidak ada";
    }
    mysqli_close($connection);
}

$title = "Admin | Blog edit";
include ('../templates/sidebarAdmin.php');
?>
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

        <form action="<?php echo BASE_URL; ?>/views/admin/blog-edit-admin.php" method="post"
            enctype="multipart/form-data">
            <p class="font-semibold text-xl">Edit</p>
            <br>
            <img src="../../public/images/<?php echo $blog['image_url'] ?>" alt="error" class="w-40">
            <br>
            <div class="grid gap-6 mb-6 md:grid-cols-2 w-[60%]">
                <input type="text" name="id" value="<?php echo $blog['id'] ?>" hidden>
                <div>
                    <label for="title"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <input type="text" id="title" name="title" value="<?php echo $blog['title'] ?>"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Title" required />
                </div>
                <div>
                    <label for="description"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <input type="text" id="description" name="description" value="<?php echo $blog['description'] ?>"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Deskripsi" required />
                </div>
                <div>
                    <label for="article"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Article</label>
                    <textarea id="article" name="article"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Article"><?php echo $blog['article'] ?></textarea>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload
                        file</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="file_input" type="file" name="image_url">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or
                        GIF (MAX.
                        800x400px).</p>
                </div>
            </div>
            <button type="submit" name="update"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Submit</button>
            <a href="<?php echo BASE_URL; ?>/views/admin/blog-admin.php"><button type="button"
                    class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Cancel</button></a>
        </form>

    </div>
</div>

<?php
include ('../templates/footerAdmin.php');
?>