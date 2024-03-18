<?php
require "./dash_header.php";
require "./login_check.php";
require "./db_connect.php";



	$select = "SELECT * FROM users WHERE id = $user_id";
	// $select = "SELECT * FROM users";
	$voter_list =mysqli_query($db_connect, $select);
	$voter_assoc =mysqli_fetch_assoc($voter_list);

	// User Role
	$user_role = "SELECT * FROM users WHERE id = $user_id";
	$user_role_result = mysqli_query($db_connect,$user_role);
	$user_role_assoc =mysqli_fetch_assoc($user_role_result);

	$candidate_select = "SELECT * FROM candidates WHERE status = 0";
	$candidates_list =mysqli_query($db_connect, $candidate_select);

	$voter_select =  "SELECT * FROM votes WHERE voter_id = $user_id";
	$voter_select_res = mysqli_query($db_connect, $voter_select);
	$voter_select_assoc = mysqli_fetch_assoc($voter_select_res);

	// $candidates_id = $voter_select_assoc['candidate_id'];
	$voter_candidate_select = "SELECT * FROM candidates";
	$candidate_details = mysqli_query($db_connect, $voter_candidate_select);


?>

<div class="row">
	<h2 class="badge bg-info text-white w-100 text-capitalize">Welcome to the dashboard</h2>
</div>

	<?php if($user_role_assoc['role'] == 0) { ?>
		<div class="row">
			<div class="col-lg-6">
				<div class="card">
					<div class="card-header">
						<h2>Voter Info</h2>
					</div>
					<div class="card-header">
						<form action="">
							<div class="row">
								<div class="col-lg-12">
									<div class="mb-3">
										<label for="">Photo</label>
										<img src="./asset/uploads/users/<?=$voter_assoc['photo']?>" alt="" width="200" class="d-block">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="mb-3">
										<label for="" class="form-label text-capitalize">voting status</label>
										<?php if($voter_assoc['vote'] == 0) { ?>
											<div class="alert alert-warning">Not Yet</div>
										<?php } ?>
										<?php if($voter_assoc['vote'] == 1) { ?>
											<div class="alert alert-success">Done</div>
										<?php } ?>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="mb-3">
										<label for="" class="form-label text-capitalize">Name</label>
										<input type="text" disabled class="form-control text-capitalize" value="<?=$voter_assoc['name']?>">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="mb-3">
										<label for="" class="form-label text-capitalize">email</label>
										<input type="text" disabled class="form-control text-lowercase" value="<?=$voter_assoc['email']?>">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="mb-3">
										<label for="" class="form-label text-capitalize">phone</label>
										<input type="text" disabled class="form-control text-capitalize" value="<?=$voter_assoc['phone']?>">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="mb-3">
										<label for="" class="form-label text-capitalize">nid</label>
										<input type="text" disabled class="form-control text-capitalize" value="<?=$voter_assoc['nid']?>">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="mb-3">
										<label for="" class="form-label text-capitalize">date of birth</label>
										<input type="text" disabled class="form-control text-capitalize" value="<?=$voter_assoc['date']?>">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="mb-3">
										<label for="" class="form-label text-capitalize">gender</label>
										<input type="text" disabled class="form-control text-capitalize" value="<?=$voter_assoc['gender']?>">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="mb-3">
										<label for="" class="form-label text-capitalize">division</label>
										<input type="text" disabled class="form-control text-capitalize" value="<?=$voter_assoc['division']?>">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="mb-3">
										<label for="" class="form-label text-capitalize">district</label>
										<input type="text" disabled class="form-control text-capitalize" value="<?=$voter_assoc['district']?>">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="mb-3">
										<label for="" class="form-label text-capitalize">subdistrict</label>
										<input type="text" disabled class="form-control text-capitalize" value="<?=$voter_assoc['subdistrict']?>">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="card">
					<div class="card-header">
						<?php if($voter_assoc['vote'] == 0) { ?>
							<h3>Vote For Your Favourite Candidate</h3>
						<?php } ?>
						<?php if($voter_assoc['vote'] == 1) { ?>
							<h3>You Voted To</h3>
						<?php } ?>
					</div>
					<div class="card-body">
					
					<?php if($voter_assoc['vote'] == 0) { ?>
						<form action="./vote_post.php" method="POST">
					
								<table class="table table-bordered">
								<tr>
									<th>SL</th>
									<th>Name</th>
									<th>Symbol</th>
									<th>Symbol Photo</th>
									<th>Area</th>
									<th>Action</th>
								</tr>
		
								<?php foreach($candidates_list as $sl=>$candidate_list) { ?>
								<tr>
									<td><?=$sl+1?></td>
									<td class="text-capitalize"><?=$candidate_list['name']?></td>
									<td class="text-capitalize"><?=$candidate_list['symbol']?></td>
									<td>
										<img src="./asset/uploads/candidates_symbol/<?=$candidate_list['photo']?>" width="50" alt="">
									</td>
									<td class="text-capitalize"><?=$candidate_list['area']?></td>
									<td>
									<!-- <input class="form-check-input" type="radio" name="vote" value="" id=""> -->
									
									<a href="./vote_post.php?id=<?=$user_id?>&candidate_id=<?=$candidate_list['id']?>&name=<?=$candidate_list['name']?>&symbol=<?=$candidate_list['symbol']?>&photo=<?=$candidate_list['photo']?>&area=<?=$candidate_list['area']?>" class="btn btn-primary">Vote Now</a>
									<!-- <a href='specificAssignmentPage.php?assignName=$value2'teacherYes=$isTeacher>$value2</a> -->
									</td>
								</tr>
								<?php }?>
							</table>
		
							<!-- <button type="submit" class="btn btn-primary">Vote Now</button> -->
					
						</form>
						<?php } ?>	
		
						<?php if($voter_assoc['vote'] == 1) { ?>
							<div class="row">
								<div class="col-lg-12 text-center">
									<img src="./asset/uploads/candidates_symbol/<?=$voter_select_assoc['photo']?>" width="200" alt="">
									<div class="voting_details mt-3 text-capitalize">
										<h3>Name:- <?=$voter_select_assoc['name']?></h3>
										<p>Symbol Name:- <?=$voter_select_assoc['symbol']?></p>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>

	<?php if($user_role_assoc['role'] == 1) { ?>
		<div class="row">
			<div class="col-lg-12">
				<div class="card-header">
					<h3>Voter Candidate's info</h3>
				</div>
				<div class="card-body">
					<div class="row">
					<?php foreach($candidate_details as $candidates) {?>
							<div class="col-lg-4">
								<div class="card">
									<div class="card-header d-flex justify-content-center">
										<img src="./asset/uploads/candidates_symbol/<?=$candidates['photo']?>" width="150" alt="">
									</div>
									<div class="card-body">
										<h4 class="text-capitalize">Name:- <?=$candidates['name']?></h4>
										<span class="text-capitalize">Symbol Name:- <?=$candidates['symbol']?></span>
										<strong class="d-block">Votes:- <?=$candidates['votes']?></strong>
										<a>
											Status:- <span class="text-<?=$candidates['status'] == 0 ?'success' : 'danger'?>"><?=$candidates['status'] == 0 ?'Active' : 'Unactive'?></span>
                  	</a>
									</div>
								</div>
							</div>
							<?php  } ?>
						</div>
				</div>
			</div>
		</div>
	<?php } ?>


<?php
require "./dash_footer.php";
?>