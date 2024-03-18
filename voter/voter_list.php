<?php
require "dash_header.php";
require "login_check.php";
require "db_connect.php";

	$select = "SELECT * FROM users WHERE role != 1 and deleted_at = 0";
	$voters_list =mysqli_query($db_connect, $select);
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
        <?php if(isset($_SESSION["soft_delete"])){ ?>
          <div class="alert alert-info mt-3 text-capitalize text-white"><?=$_SESSION["soft_delete"] ; unset($_SESSION["soft_delete"])?>
          </div>
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

          <?php foreach($voters_list as $sl=>$voter_list) {?>
            <tr>
              <td><?=$sl+1?></td>
              <td class="text-capitalize"><?=$voter_list['name']?></td>
              <td><?=$voter_list['email']?></td>
              <td><?=$voter_list['phone']?></td>
              <td><?=$voter_list['nid']?></td>
              <td><?=$voter_list['date']?></td>
              <td class="text-capitalize"><?=$voter_list['division']?></td>
              <td class="text-capitalize"><?=$voter_list['district']?></td>
              <td class="text-capitalize"><?=$voter_list['subdistrict']?></td>
              <td>
                <img width="40" src="./asset/uploads/users/<?=$voter_list['photo']?>" alt="">
              </td>
              <td>
                <?php if($voter_list['vote'] == 0) { ?>
									<span class="text-warning">Not Yet</span>
								<?php } ?>
								<?php if($voter_list['vote'] == 1) { ?>
									<span class="text-success">Done</span>
								<?php } ?>
              </td>
              <td>
                <a href="./edit_voter.php?voter_id=<?=$voter_list['id']?>" class="btn btn-primary shadow btn-xs sharp mr-1">
                  <i class="fa fa-pencil"></i>
                </a>
                <a href="./voter_soft_delete_post.php?voter_id=<?=$voter_list['id']?>" class="btn btn-warning shadow btn-xs sharp">
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
require "dash_footer.php";
?>