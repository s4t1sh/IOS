<?php include('header.php'); ?>

	<!-- Our Dashbord -->
	<section class="our-dashbord dashbord bgc-f7 pb50">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-xl-2 dn-992 pl0"></div>
				<div class="col-lg-9 col-xl-10 maxw100flex-992">
					<div class="row">
						<div class="col-lg-12 mb10">
							<div class="breadcrumb_content style2">
								<h2 class="breadcrumb_title">Transactions</h2>
								<!-- <p>We are glad to see you again!</p> -->
							</div>
                        </div>
                        <div class="col-lg-12">
							<div class="my_dashboard_review mb40">
								<div class="col-lg-12">
									<div class="savesearched_table">
										<div class="table-responsive mt0">
											<table class="table" id="example" >
												<thead class="thead-light">
											    	<tr>
											    		<th scope="col">s.no</th>
											    		<th class="dn-lg" scope="col">Name</th>
											    		<th class="dn-lg" scope="col">Mobile</th>
											    		<th scope="col">Price</th>
											    		<th scope="col">Transaction ID</th>
											    		<th scope="col">Status</th>
											    	</tr>
												</thead>
												<tbody>
												<?php 
													$sql = "SELECT * from payments";
													$result = $conn->query($sql);

													$i = 1;
													if (mysqli_num_rows($result) > 0) {
														while($row = mysqli_fetch_assoc($result)) {?>
													<tr>
														<td><?= $i ?></td>
											    		<th class="title" scope="row"><?= $row["name"]?></th>
											    		<td class="dn-lg"><?= $row["mob"]?></td>
											    		<td class="dn-lg"><?= $row["price"]?></td>
											    		<td class="dn-lg"><?= $row["tnx_id"]?></td>
											    		<td class="dn-lg"><?= $row["status"]?></td>
											    		
											    	</tr>
													
													<?php $i++;	}
													}

												?>
											    	
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row mt50">
						<div class="col-lg-6 offset-lg-3">
							<div class="copyright-widget text-center">
								<p>2017 @ Copyright INTEGRA OFFICE SOLUTIONS ||developed by Beaming India</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php include('footer.php'); ?>