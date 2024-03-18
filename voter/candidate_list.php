<?php
require "dash_header.php";
require "login_check.php";
require "db_connect.php";

	$select = "SELECT * FROM candidates";
	$candidates_list =mysqli_query($db_connect, $select);
	// $voter_assoc =mysqli_fetch_assoc($voter_list);

	// User Role
	$user_role = "SELECT * FROM users WHERE id = $user_id";
	$user_role_result = mysqli_query($db_connect,$user_role);
	$user_role_assoc =mysqli_fetch_assoc($user_role_result);

?>

<?php if($user_role_assoc['role'] == 1) { ?>
  <div class="row">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header">
          <h2>Candidate's List</h2>
        </div>
        <div class="card-body">
        <?php if(isset($_SESSION["delete"])){ ?>
            <div class="alert alert-success mt-3 text-capitalize"><?=$_SESSION["delete"]?></div>
          <?php } ?>
          <table class="table table-bordered">
            <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Symbol Name</th>
            <th>Symbol</th>
            <th>Election Area</th>
            <th>Status</th>
            <th>Action</th>
            </tr>

            <?php foreach($candidates_list as $sl=>$candidate_list) {?>
              <tr>
                <td><?=$sl+1?></td>
                <td class="text-capitalize"><?=$candidate_list['name']?></td>
                <td class="text-capitalize"><?=$candidate_list['symbol']?></td>
                <td>
                  <img src="./asset/uploads/candidates_symbol/<?=$candidate_list['photo']?>" width="100" alt="">
                </td>
                <td class="text-capitalize"><?=$candidate_list['area']?></td>
                <td>
                  <a class="btn btn-<?=$candidate_list['status'] == 0 ?'success' : 'light'?>" href="./candidate_status_post.php?candidate_id=<?=$candidate_list['id']?>">
                  <?=$candidate_list['status'] == 0 ?'Active' : 'Unactive'?>
                  </a>
                </td>
                <td>
                <a href="./candidate_delete.php?candidate_id=<?=$candidate_list['id']?>" class="btn btn-danger shadow btn-xs sharp">
                  <i class="fa fa-trash"></i>
                </a>
                </td>
              </tr>
            <?php } ?>
          </table>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card">
        <div class="card-header">
          <h4>Voter Candidate Registration</h4>
        </div>
        <div class="card-body">
          <?php if(isset($_SESSION["register_success"])){ ?>
            <div class="alert alert-success mt-3 text-capitalize"><?=$_SESSION["register_success"]?></div>
          <?php } ?>
          <form action="./candidate_post.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="" class="form-label text-capitalize">Voter Candidate Name</label>
              <input type="text" name="name" class="form-control text-capitalize" value="<?=(isset($_SESSION["old_name"])?$_SESSION["old_name"]:'')?>">
              <?php if(isset($_SESSION["name_err"])){ ?>
                <div class="alert alert-danger mt-3 text-capitalize"><?=$_SESSION["name_err"]?></div>
              <?php } ?>
            </div>
            <div class="mb-3">
              <label for="" class="form-label text-capitalize">Symbol Name</label>
              <input type="text" name="symbol" class="form-control text-capitalize" value="<?=(isset($_SESSION["old_symbol"])?$_SESSION["old_symbol"]:'')?>">
              <?php if(isset($_SESSION["symbol_err"])){ ?>
                <div class="alert alert-danger mt-3 text-capitalize"><?=$_SESSION["symbol_err"]?></div>
              <?php } ?>
            </div>
            <div class="mb-3">
              <label for="" class="form-label text-capitalize">Symbol Photo</label>
              <input type="file" name="photo" class="form-control" onchange="document.getElementById('symbol').src = window.URL.createObjectURL(this.files[0])">
              <img src="" width="150" id="symbol" alt="">
              <?php if(isset($_SESSION["photo_err"])){ ?>
                <div class="alert alert-danger mt-3 text-capitalize"><?=$_SESSION["photo_err"]?></div>
              <?php } ?>
            </div>
            <div class="mb-3">
              <label for="" class="form-label text-capitalize">election Area</label>
              <input type="text" name="area" class="form-control" value="<?=(isset($_SESSION["old_area"])?$_SESSION["old_area"]:'')?>">
              <?php if(isset($_SESSION["area_err"])){ ?>
                <div class="alert alert-danger mt-3 text-capitalize"><?=$_SESSION["area_err"]?></div>
              <?php } ?>
            </div>
            <div class="mb-3">
              <button type="submit" class="btn btn-primary">Add Candidate</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<?php
require "dash_footer.php";
?>

<?php
unset($_SESSION["register_success"]);
unset($_SESSION["delete"]);
unset($_SESSION["name_err"]);
unset($_SESSION["old_name"]);
unset($_SESSION["symbol_err"]);
unset($_SESSION["old_symbol"]);
unset($_SESSION["area_err"]);
unset($_SESSION["old_area"]);
unset($_SESSION["photo_err"]);
?>