<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: LoginA.php");
    exit;
}
?>
<?php include('Inc/HeaderA.php');?>
    <div class="container" style="text-align:center;">
    <h3>Upload the Books here!</h3>
    <form method="post"  action="BookUpload1_action.php" enctype='multipart/form-data'>
        <div class="row">
        <div class="col-25">
        <label for="Bookname">Book Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="Bookname" name="Bookname" placeholder="Book name here.." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="Author">Author</label>
      </div>
      <div class="col-75">
        <input type="text" id="Author" name="Author" placeholder="Book Author name.." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="Genre">Genre</label>
      </div>
      <div class="col-75">
        <input type="text" id="Genre" name="Genre" placeholder="Book Genre.." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
      <label for="file">Select image:</label>
      </div>
      <div class="col-75">
        <input type="file" id="file" name="file" accept="image/*" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="cost">COST</label>
      </div>
      <div class="col-75">
        <input type="text" id="cost" name="cost" placeholder="Book cost.." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="description">Description of the Book</label>
      </div>
      <div class="col-75">
        <input type="text" id="description" name="description" placeholder="Book Description.." required>
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Submit" name="submit">
    </div>
  </form>
</div>
<?php include('Inc/Footer.php');?>
