<?php
require "./dash_header.php";
require "./login_check.php";
require "./db_connect.php";

	$select = "SELECT * FROM users WHERE deleted_at = 1";
	// $select = "SELECT * FROM users";
	$trash_voters_list =mysqli_query($db_connect, $select);
	// $voter_assoc =mysqli_fetch_assoc($voter_list);

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
        <h2>Voter's List</h2>
      </div>
      <div class="card-body">
        <?php if(isset($_SESSION["restore"])){ ?>
          <div class="alert alert-success mt-3 text-capitalize "><?=$_SESSION["restore"] ; unset($_SESSION["restore"])?>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION["delete"])){ ?>
          <div class="alert alert-success mt-3 text-capitalize "><?=$_SESSION["delete"] ; unset($_SESSION["delete"])?>
          </div>delete
        <?php } ?>
        <table class="table table-bordered">
          <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>NID</th>
            <th>DOB</th>
            <th>Division</th>
            <th>District</th>
            <th>Subdistrict</th>
            <th>Photo</th>
            <th>Voting Status</th>
            <th>Action</th>
          </tr>

          <?php foreach($trash_voters_list as $sl=>$trash_voter_list) {?>
            <tr>
              <td><?=$sl+1?></td>
              <td class="text-capitalize"><?=$trash_voter_list['name']?></td>
              <td><?=$trash_voter_list['email']?></td>
              <td><?=$trash_voter_list['phone']?></td>
              <td><?=$trash_voter_list['nid']?></td>
              <td><?=$trash_voter_list['date']?></td>
              <td class="text-capitalize"><?=$trash_voter_list['division']?></td>
              <td class="text-capitalize"><?=$trash_voter_list['district']?></td>
              <td class="text-capitalize"><?=$trash_voter_list['subdistrict']?></td>
              <td>
                <img width="40" src="./asset/uploads/users/<?=$trash_voter_list['photo']?>" alt="">
              </td>
              <td>
                <?php if($trash_voter_list['vote'] == 0) { ?>
									<span class="text-warning">Not Yet</span>
								<?php } ?>
								<?php if($trash_voter_list['vote'] == 1) { ?>
									<span class="text-success">Done</span>
								<?php } ?>
              </td>
              <td>
                <a href="./trash_voter_restore.php?voter_id=<?=$trash_voter_list['id']?>" class="btn btn-success shadow btn-xs sharp mr-1">
                  <i class="fa fa-rotate-left"></i>
                </a>
                <a href="./trash_voter_delete.php?voter_id=<?=$trash_voter_list['id']?>" class="btn btn-danger shadow btn-xs sharp">
                  <i class="fa fa-trash"></i>
                </a>
              </td>
            </tr>
          <?php }?>
        </table>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<?php
require "./dash_footer.php";
?>