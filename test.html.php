<?php 
if (isset($_POST['create_post'])) {
    $post_caption = $_POST["post_caption"];
    $user_id = $_SESSION["user_id"];
    $post_created_day = date('Y-m-d'); // Giữ lại ngày (nếu cần cho cột cũ)
    $post_created_time = date('H:i:s'); // Lấy giờ
    
    $last_modified = $post_created_datetime;

    // Kiểm tra và xử lý ảnh
    $image_path = NULL; // Mặc định là NULL nếu không có ảnh
    if (isset($_FILES['post_image']) && $_FILES['post_image']['error'] === 0) {
        $upload_dir = '../uploaded_imgs/';
        $filename = basename($_FILES['post_image']['name']);
        $target_path = $upload_dir . $filename;

        // Lưu file vào thư mục
        if (move_uploaded_file($_FILES['post_image']['tmp_name'], $target_path)) {
            // Lưu đường dẫn tương đối để sử dụng trong <img src="">
            $image_path = $target_path;
        }
    }

    // Chuẩn bị câu lệnh SQL để chèn vào bảng posts
    $query = "
        INSERT INTO posts (
            post_caption,
            post_created_day,
            post_created_time,
            post_last_modified,
            user_id,
            img_path,
            repost_check,
            repost_date,
            repost_caption,
            repost_user_tag,
            repost_user_name
        ) VALUES (
            :post_caption,
            :post_created_day,
            :post_created_time,
            :post_last_modified,
            :user_id,
            :img_path,
            0,
            NULL,
            NULL,
            NULL,
            NULL
        )
    ";

    $statement = $pdo->prepare($query);
    $statement->bindValue(":post_caption", $post_caption);
    $statement->bindValue(":post_created_day", $post_created_day);
    $statement->bindValue(":post_created_time", $post_created_time);
    $statement->bindValue(":post_last_modified", $last_modified);
    $statement->bindValue(":user_id", $user_id);
    $statement->bindValue(":img_path", $image_path); // Gán đường dẫn ảnh (hoặc NULL)

    $statement->execute();
    $_SESSION['success_message'] = '+1 post!';
    // Điều hướng sau khi tạo bài viết
    header("location: ../Homepage/homepage.php");
    exit();
}
$output = ob_get_clean();
include '../templates/user_layout.html.php';
?>

<div class="post-form">
    <div class="post-header">
        <img class="post-avatar" src="../images/profile.svg" alt="Avatar">
        <span class="post-username"><?= $_SESSION['username'] ?></span>
    </div>

    <div class="create-post-content">
        <form action="../Create_Post/create_post.php" method="POST" enctype="multipart/form-data">
            <div class="form-floating">
                <textarea class="form-control create-caption" placeholder="What are you thinking about?" name="post_caption" style="height: 80px;" required></textarea>
                <label style="color: #000;" for="floatingPostCaption">What are you thinking about?</label>
            </div>
            <!-- Preview ảnh khi đã chọn -->
            <div id="image-preview" style="display: none; position: relative; text-align: center;">
            <div class="image-background">
        <img id="preview-img" src="#" alt="Image Preview">
    </div>
                <button class="btn btn-outline-danger" id="remove-image" type="button">&times;</button>
            </div>
            <div class="post-footer">
                <!-- Nút SVG thay thế cho input file -->
                <div class="upload-button" style="display: flex; align-items: left; cursor: pointer;">
                    <img src="../images/add-image.svg" alt="Upload Image" width="32" height="32" style="cursor: pointer;">
                    <span style="margin-left: 8px;">Upload Image</span>
                    <input type="file" name="post_image" id="upload-image" accept="image/*" style="display: none;">
                </div>
            </div>
            <button style="margin-bottom:20px;" class="btn btn-primary" type="create_post" name="create_post">Post</button>
        </form>
    </div>

</div> 