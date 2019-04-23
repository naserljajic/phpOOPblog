<?php
include './app/views/layout/header.php';
use Blog\models\Posts;
use Blog\models\User;
use Blog\controllers\PostController;
?>
<!-- Page Header -->
  <header class="masthead" style="background-image: url('app/img/post.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Add new post</h1>
            
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      	<?php 
      		if ($_SERVER['REQUEST_METHOD'] == "POST") {
      			if(!empty($_POST['title']) && !empty($_POST['post'])) {
              $newPost= new Posts();
              $user=new User();
              $user->setID($_SESSION['username']);
      				$newPost->setTitle(htmlspecialchars($_POST['title']));
      				$newPost->setPost(htmlspecialchars($_POST['post']));
              $newPost->setAuthorID($user->getUserID());
      				$addNewPost=new PostController();
      				$check=$addNewPost->addnewPost($newPost);
      				if ($check) {
      					echo "<p> New post add successfully</p>";
      					echo "<p> ADD new </p>";
      				}

      			}else {
      				echo "<p>The title or post is empty!</p>";
      			}

      		}
      		if( !isset($_SESSION['username'])){
      			echo "You must be logged in to add a new post";
      		}else {
      			?> 
        <form action="addpost" method="POST">
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Title</label>
              <input type="text" class="form-control" placeholder="Title" id="title" name='title' required data-validation-required-message="Please enter a title.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post</label>
              <textarea rows="5" class="form-control" placeholder="Post" id="Post" name='post'required data-validation-required-message="Please enter a post."></textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Add new post</button>
          </div>
        </form>
        <?php
      		}
      	?>
      </div>
    </div>
  </div>
  <?php
 include './app/views/layout/footer.php';
  ?>