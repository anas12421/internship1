<?php
require "./dash_header.php";
require "./login_check.php";
require "./db_connect.php";

$voter_id = $_GET['voter_id'];

	$select = "SELECT * FROM users WHERE id = $voter_id";
	// $select = "SELECT * FROM users";
	$voter_list =mysqli_query($db_connect, $select);
	$voter_assoc =mysqli_fetch_assoc($voter_list);

	// User Role
	$user_role = "SELECT * FROM users WHERE id = $user_id";
	$user_role_result = mysqli_query($db_connect,$user_role);
	$user_role_assoc =mysqli_fetch_assoc($user_role_result);

?>

<?php if($user_role_assoc['role'] == 1) { ?>
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <h2>Voter Info Update</h2>
      </div>
      <div class="card-body">
        <?php if(isset($_SESSION["update"])){ ?>
          <div class="alert alert-success mt-3 text-capitalize "><?=$_SESSION["update"] ; unset($_SESSION["update"])?>
          </div>
        <?php } ?>
        <form action="./edit_voter_post.php" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="" class="form-label text-capitalize">Name</label>
                <input type="text"  name="name" class="form-control" value="<?=$voter_assoc['name']?>" id="">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="" class="form-label text-capitalize">Email</label>
                <input type="email"  name="email" class="form-control" value="<?=$voter_assoc['email']?>" id="">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="" class="form-label text-capitalize">phone</label>
                <input type="number"  name="phone" class="form-control" value="<?=$voter_assoc['phone']?>"
                  id="">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="" class="form-label text-capitalize">nid</label>
                <input type="number"  name="nid" class="form-control" value="<?=$voter_assoc['nid']?>" id="">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="" class="form-label text-capitalize">date of birth</label>
                <input type="date" name="date" class="form-control" value="<?=$voter_assoc['date']?>" id="">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="" class="form-label text-capitalize">gender</label>
                <input type="text"  name="gender" class="text-capitalize form-control" value="<?=$voter_assoc['gender']?>"
                  id="">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="" class="form-label text-capitalize">division</label>
                <input type="text" name="division" class="text-capitalize form-control" value="<?=$voter_assoc['division']?>"
                  id="">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="" class="form-label text-capitalize">district</label>
                <input type="text" name="district" class="text-capitalize form-control" value="<?=$voter_assoc['district']?>"
                  id="">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="" class="form-label text-capitalize">subdistrict</label>
                <input type="text" name="subdistrict" class="text-capitalize form-control" value="<?=$voter_assoc['subdistrict']?>"
                  id="">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="" class="form-label text-capitalize">Photo</label>
                <input type="file" name="photo"  class="form-control" onchange="document.getElementById('voter').src = window.URL.createObjectURL(this.files[0])">
                <img src="./asset/uploads/users/<?=$voter_assoc['photo']?>" width="200" id="voter" alt="">
              </div>
            </div>
            <input type="hidden" name="voter_id" value="<?=$voter_assoc['id']?>">
            <div class="col-lg-12">
              <button type="submit" class="btn btn-primary w-100 mt-3">Edit Voter</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<?php
require "./dash_footer.php";
?>