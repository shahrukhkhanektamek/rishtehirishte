<?php include"../include/header.php"; ?>
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Dashboard</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">

					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							
							<?php include"nav.php" ?>
							
						</div>
						
						<div class="col-md-7 col-lg-8 col-xl-9">

							<div class="row">
								<div class="col-md-12">
									<div class="card dash-card">
										<div class="card-body">
											<div class="row">
												<div class="col-md-12 col-lg-4">
													<div class="dash-widget dct-border-rht">
														<div class="circle-bar">
																<img src="assets/img/icon-01.png" class="img-fluid" alt="student">
														</div>
														<div class="dash-widget-info">
															<h6>Total Students</h6>
															<h3>1500</h3>
															<p class="text-muted">Till Today</p>
														</div>
													</div>
												</div>
												
												<div class="col-md-12 col-lg-4">
													<div class="dash-widget dct-border-rht">
														<div class="circle-bar">
																<img src="assets/img/icon-02.png" class="img-fluid" alt="student">
														</div>
														<div class="dash-widget-info">
															<h6>Today Students</h6>
															<h3>160</h3>
															<p class="text-muted">06, Nov 2019</p>
														</div>
													</div>
												</div>
												
												<div class="col-md-12 col-lg-4">
													<div class="dash-widget">
														<div class="circle-bar">
																<img src="assets/img/icon-03.png" class="img-fluid" alt="student">
														</div>
														<div class="dash-widget-info">
															<h6>Classes</h6>
															<h3>10</h3>
															<p class="text-muted">06, Apr 2019</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<h4 class="mb-4">student Appoinment</h4>
									<div class="appointment-tab">
									
										<!-- Appointment Tab -->
										<ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
											<li class="nav-item">
												<a class="nav-link active" href="#upcoming-appointments" data-bs-toggle="tab">Upcoming</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#today-appointments" data-bs-toggle="tab">Today</a>
											</li> 
										</ul>
										<!-- /Appointment Tab -->
										
										<div class="tab-content">
										
											<!-- Upcoming Appointment Tab -->
											<div class="tab-pane show active" id="upcoming-appointments">
												<div class="card card-table mb-0">
													<div class="card-body">
														<div class="table-responsive">
															<table class="table table-hover table-center mb-0">
																<thead>
																	<tr>
																		<th>Students Name</th>
																		<th>Joining Date</th>
																		<th>Purpose</th>
																		<th>Type</th>
																		<th class="text-center">Paid Amount</th>
																		<th></th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td>
																			<h2 class="table-avatar">
																				<a href="student-profile.php" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="assets/img/student/student-01.jpg" alt="User Image"></a>
																				<a href="student-profile.php">Richard Wilson <span>#PT0016</span></a>
																			</h2>
																		</td>
																		<td>11 Nov 2019 <span class="d-block text-info">10.00 AM</span></td>
																		<td>General</td>
																		<td>New student</td>
																		<td class="text-center">$150</td>
																		<td class="text-end">
																			<div class="table-action">
																				<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																					<i class="far fa-eye"></i> View
																				</a>
																				
																				<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																					<i class="fas fa-check"></i> Accept
																				</a>
																				<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																					<i class="fas fa-times"></i> Cancel
																				</a>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<h2 class="table-avatar">
																				<a href="student-profile.php" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="assets/img/student/student-02.jpg" alt="User Image"></a>
																				<a href="student-profile.php">Charlene Reed <span>#PT0001</span></a>
																			</h2>
																		</td>
																		<td>3 Nov 2019 <span class="d-block text-info">11.00 AM</span></td>
																		<td>General</td>
																		<td>Old student</td>
																		<td class="text-center">$200</td>
																		<td class="text-end">
																			<div class="table-action">
																				<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																					<i class="far fa-eye"></i> View
																				</a>
																				
																				<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																					<i class="fas fa-check"></i> Accept
																				</a>
																				<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																					<i class="fas fa-times"></i> Cancel
																				</a>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<h2 class="table-avatar">
																				<a href="student-profile.php" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="assets/img/student/student-03.jpg" alt="User Image"></a>
																				<a href="student-profile.php">Travis Trimble  <span>#PT0002</span></a>
																			</h2>
																		</td>
																		<td>1 Nov 2019 <span class="d-block text-info">1.00 PM</span></td>
																		<td>General</td>
																		<td>New student</td>
																		<td class="text-center">$75</td>
																		<td class="text-end">
																			<div class="table-action">
																				<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																					<i class="far fa-eye"></i> View
																				</a>
																				
																				<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																					<i class="fas fa-check"></i> Accept
																				</a>
																				<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																					<i class="fas fa-times"></i> Cancel
																				</a>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<h2 class="table-avatar">
																				<a href="student-profile.php" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="assets/img/student/student-04.jpg" alt="User Image"></a>
																				<a href="student-profile.php">Carl Kelly <span>#PT0003</span></a>
																			</h2>
																		</td>
																		<td>30 Oct 2019 <span class="d-block text-info">9.00 AM</span></td>
																		<td>General</td>
																		<td>Old student</td>
																		<td class="text-center">$100</td>
																		<td class="text-end">
																			<div class="table-action">
																				<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																					<i class="far fa-eye"></i> View
																				</a>
																				
																				<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																					<i class="fas fa-check"></i> Accept
																				</a>
																				<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																					<i class="fas fa-times"></i> Cancel
																				</a>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<h2 class="table-avatar">
																				<a href="student-profile.php" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="assets/img/student/student-05.jpg" alt="User Image"></a>
																				<a href="student-profile.php">Michelle Fairfax <span>#PT0004</span></a>
																			</h2>
																		</td>
																		<td>28 Oct 2019 <span class="d-block text-info">6.00 PM</span></td>
																		<td>General</td>
																		<td>New student</td>
																		<td class="text-center">$350</td>
																		<td class="text-end">
																			<div class="table-action">
																				<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																					<i class="far fa-eye"></i> View
																				</a>
																				
																				<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																					<i class="fas fa-check"></i> Accept
																				</a>
																				<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																					<i class="fas fa-times"></i> Cancel
																				</a>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<h2 class="table-avatar">
																				<a href="student-profile.php" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="assets/img/student/student-06.jpg" alt="User Image"></a>
																				<a href="student-profile.php">Gina Moore <span>#PT0005</span></a>
																			</h2>
																		</td>
																		<td>27 Oct 2019 <span class="d-block text-info">8.00 AM</span></td>
																		<td>General</td>
																		<td>Old student</td>
																		<td class="text-center">$250</td>
																		<td class="text-end">
																			<div class="table-action">
																				<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																					<i class="far fa-eye"></i> View
																				</a>
																				
																				<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																					<i class="fas fa-check"></i> Accept
																				</a>
																				<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																					<i class="fas fa-times"></i> Cancel
																				</a>
																			</div>
																		</td>
																	</tr>
																</tbody>
															</table>		
														</div>
													</div>
												</div>
											</div>
											<!-- /Upcoming Appointment Tab -->
									   
											<!-- Today Appointment Tab -->
											<div class="tab-pane" id="today-appointments">
												<div class="card card-table mb-0">
													<div class="card-body">
														<div class="table-responsive">
															<table class="table table-hover table-center mb-0">
																<thead>
																	<tr>
																		<th>Student Name</th>
																		<th>Joining Date</th>
																		<th>Purpose</th>
																		<th>Type</th>
																		<th class="text-center">Paid Amount</th>
																		<th></th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td>
																			<h2 class="table-avatar">
																				<a href="student-profile.php" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="assets/img/student/student-07.jpg" alt="User Image"></a>
																				<a href="student-profile.php">Elsie Gilley <span>#PT0006</span></a>
																			</h2>
																		</td>
																		<td>14 Nov 2019 <span class="d-block text-info">6.00 PM</span></td>
																		<td>General</td>
																		<td>Old student</td>
																		<td class="text-center">$300</td>
																		<td class="text-end">
																			<div class="table-action">
																				<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																					<i class="far fa-eye"></i> View
																				</a>
																				
																				<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																					<i class="fas fa-check"></i> Accept
																				</a>
																				<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																					<i class="fas fa-times"></i> Cancel
																				</a>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<h2 class="table-avatar">
																				<a href="student-profile.php" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="assets/img/student/student-08.jpg" alt="User Image"></a>
																				<a href="student-profile.php">Linda Gardner <span>#PT0006</span></a>
																			</h2>
																		</td>
																		<td>14 Nov 2019 <span class="d-block text-info">5.00 PM</span></td>
																		<td>General</td>
																		<td>Old student</td>
																		<td class="text-center">$100</td>
																		<td class="text-end">
																			<div class="table-action">
																				<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																					<i class="far fa-eye"></i> View
																				</a>
																				
																				<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																					<i class="fas fa-check"></i> Accept
																				</a>
																				<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																					<i class="fas fa-times"></i> Cancel
																				</a>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<h2 class="table-avatar">
																				<a href="student-profile.php" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="assets/img/student/student-09.jpg" alt="User Image"></a>
																				<a href="student-profile.php">Daniel Griffing <span>#PT0007</span></a>
																			</h2>
																		</td>
																		<td>14 Nov 2019 <span class="d-block text-info">3.00 PM</span></td>
																		<td>General</td>
																		<td>New student</td>
																		<td class="text-center">$75</td>
																		<td class="text-end">
																			<div class="table-action">
																				<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																					<i class="far fa-eye"></i> View
																				</a>
																				
																				<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																					<i class="fas fa-check"></i> Accept
																				</a>
																				<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																					<i class="fas fa-times"></i> Cancel
																				</a>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<h2 class="table-avatar">
																				<a href="student-profile.php" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="assets/img/student/student-09.jpg" alt="User Image"></a>
																				<a href="student-profile.php">Walter Roberson <span>#PT0008</span></a>
																			</h2>
																		</td>
																		<td>14 Nov 2019 <span class="d-block text-info">1.00 PM</span></td>
																		<td>General</td>
																		<td>Old student</td>
																		<td class="text-center">$350</td>
																		<td class="text-end">
																			<div class="table-action">
																				<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																					<i class="far fa-eye"></i> View
																				</a>
																				
																				<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																					<i class="fas fa-check"></i> Accept
																				</a>
																				<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																					<i class="fas fa-times"></i> Cancel
																				</a>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<h2 class="table-avatar">
																				<a href="student-profile.php" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="assets/img/student/student-11.jpg" alt="User Image"></a>
																				<a href="student-profile.php">Robert Rhodes <span>#PT0010</span></a>
																			</h2>
																		</td>
																		<td>14 Nov 2019 <span class="d-block text-info">10.00 AM</span></td>
																		<td>General</td>
																		<td>New student</td>
																		<td class="text-center">$175</td>
																		<td class="text-end">
																			<div class="table-action">
																				<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																					<i class="far fa-eye"></i> View
																				</a>
																				
																				<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																					<i class="fas fa-check"></i> Accept
																				</a>
																				<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																					<i class="fas fa-times"></i> Cancel
																				</a>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<h2 class="table-avatar">
																				<a href="student-profile.php" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="assets/img/student/student-02.jpg" alt="User Image"></a>
																				<a href="student-profile.php">Harry Williams <span>#PT0011</span></a>
																			</h2>
																		</td>
																		<td>14 Nov 2019 <span class="d-block text-info">11.00 AM</span></td>
																		<td>General</td>
																		<td>New student</td>
																		<td class="text-center">$450</td>
																		<td class="text-end">
																			<div class="table-action">
																				<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																					<i class="far fa-eye"></i> View
																				</a>
																				
																				<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																					<i class="fas fa-check"></i> Accept
																				</a>
																				<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																					<i class="fas fa-times"></i> Cancel
																				</a>
																			</div>
																		</td>
																	</tr>
																</tbody>
															</table>		
														</div>	
													</div>	
												</div>	
											</div>
											<!-- /Today Appointment Tab -->
											
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   
<?php include"../include/footer.php"; ?>