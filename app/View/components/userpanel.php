<?php
$user = $_SESSION['User'];
?>
<div class="login">
    <div class="account-panel">
        <div class="banner-section">
            <div class="banner-wrapper">
                <img src="css/img/profile-picture.png" alt="profile-picture">
                <h3><?php echo $user->getName()?></h3>
            </div>
        </div>
        <div class="account-tabs">
            <div class="info"  onclick="showPanelInfo();">
                Your Credentials
            </div>
            <div class="blog"  onclick="showPanelBlog();">
                Blogs
            </div>
        </div>
        <div class="account-info" id="account-info">
            <div class="content">
                <?php
                echo "<h3>".$user->getName(). ", ". $user->getEmail()."</h3>";
                ?>
                <div class="account-static-text">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores aspernatu
                    r cupiditate fuga laudantium molestiae quia tempora temporibus unde vero voluptas!
                </div>
            </div>
        </div>
        <div class="account-blog" id="account-blog">
            <div class="content">
                <a onclick="addBlog();">Write a blog</a><br />
                <a href="?">Edit your blog</a><br />
                <a href="?">Delete blog</a>
            </div>
        </div>
        <form action="logout" method="post">
            <input type="hidden" value="secret" name="passCode">
            <input type="Submit" class="btn" value="Logout" name="logout">
        </form>
    </div>
</div><!-- /.login -->
<script>
    function showPanelInfo(){
        document.getElementById("account-info").style.display="block";
        document.getElementById("account-blog").style.display="none";
    }
    function showPanelBlog(){
        document.getElementById("account-blog").style.display="block";
        document.getElementById("account-info").style.display="none";
    }

    function addBlog() {
        document.getElementById("blog-post").style.display="none";
        document.getElementById("sidebar").style.display="none";
        document.getElementById("pagination_controls").style.display="none";
        $(".blogs").load("view/addPost-component.php");
    }
</script>