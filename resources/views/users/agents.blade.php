@extends('layouts.master')
@section('PageTitle', 'Agents ')


@section('content')

		<!-- Main Content -->
		<div class="hk-pg-wrapper pb-0">
			<!-- Page Body -->
			<div class="hk-pg-body py-0">
				<div class="contactapp-wrap">

					<div class="contactapp-content">
						<div class="contactapp-detail-wrap">
							<header class="contact-header">
								<div class="d-flex align-items-center">
									<div class="dropdown">
										<a class="contactapp-title dropdown-toggle link-dark" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
											<h1>Contacts</h1>
										</a>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="users"></i></span><span>All Contacts</span></a>
											<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="star"></i></span><span>Important</span></a>
											<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="archive"></i></span><span>Archive</span></a>
											<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="edit"></i></span><span>Pending</span></a>
											<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="trash-2"></i></span><span>Deleted</span></a>
										</div>
									</div>
									<div class="dropdown ms-3">
										<button class="btn btn-sm btn-outline-secondary flex-shrink-0 dropdown-toggle d-lg-inline-block d-none" data-bs-toggle="dropdown">Create New</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="#">Add New Contact</a>
											<a class="dropdown-item" href="#">Add New Department</a>
											<a class="dropdown-item" href="#">Add Category</a>
											<a class="dropdown-item" href="#">Add New Tag</a>
										</div>
									</div>
								</div>
								<div class="contact-options-wrap">	
									<a class="btn btn-icon btn-flush-dark flush-soft-hover dropdown-toggle no-caret active" href="#" data-bs-toggle="dropdown"><span class="icon"><span class="feather-icon"><i data-feather="list"></i></span></span></a>
									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item active" href="contact.html"><span class="feather-icon dropdown-icon"><i data-feather="list"></i></span><span>List View</span></a>
										<a class="dropdown-item" href="contact-cards.html"><span class="feather-icon dropdown-icon"><i data-feather="grid"></i></span><span>Grid View</span></a>
									</div>
									<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover no-caret d-sm-inline-block d-none" href="#" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Refresh"><span class="icon"><span class="feather-icon"><i data-feather="refresh-cw"></i></span></span></a>
									<div class="v-separator d-lg-block d-none"></div>
									
									
									<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover hk-navbar-togglable d-sm-inline-block d-none" href="#" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Collapse">
										<span class="icon">
											<span class="feather-icon"><i data-feather="chevron-up"></i></span>
											<span class="feather-icon d-none"><i data-feather="chevron-down"></i></span>
										</span>
									</a>
								</div>
							</header>
							<div class="contact-body">
								<div data-simplebar class="nicescroll-bar">
									<div class="collapse" id="collapseQuick">
										<div class="quick-access-form-wrap">
											<form class="quick-access-form border">
												<div class="row gx-3">
													<div class="col-xxl-10">
														<div class="position-relative">
															<div class="dropify-square">
																<input type="file"  class="dropify-1"/>
															</div>
															<div class="col-md-12">
																<div class="row gx-3">
																	<div class="col-lg-4">
																		<div class="form-group">
																			<input class="form-control" placeholder="First name*" value="" type="text">
																		</div>
																		<div class="form-group">
																			<input class="form-control" placeholder="Last name*" value="" type="text">
																		</div>
																	</div>
																	<div class="col-lg-4">
																		<div class="form-group">
																			<input class="form-control" placeholder="Email Id*" value="" type="text">
																		</div>
																		<div class="form-group">
																			<input class="form-control" placeholder="Phone" value="" type="text">
																		</div>
																	</div>
																	<div class="col-lg-4">
																		<div class="form-group">
																			<input class="form-control"  placeholder="Department" value="" type="text">
																		</div>
																		<div class="form-group">
																			<select id="input_tags" class="form-control" multiple="multiple">
																				<option selected="selected">Collaborator</option>
																				<option>Designer</option>
																				<option selected="selected">Developer</option>
																			</select>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-xxl-2">
														<div class="form-group">
															<button data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false"  class="btn btn-block btn-primary ">Create New
															</button>
														</div>
														<div class="form-group">
															<button data-bs-toggle="collapse" disabled  data-bs-target="#collapseExample" aria-expanded="false"  class="btn btn-block btn-secondary">Discard
															</button>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
									<div class="contact-list-view table-responsive">
										<table id="datable_14" class="table nowrap w-100 mb-5">
											<thead>
												<tr>
													<th>#</th>
													<th>Name</th>
													<th>Email Address</th>
													<th>Phone</th>
													<th>Address</th>
													<th>Actions</th>
												</tr>
											</thead>
											<tbody>
												@foreach ($agents as $key => $value)
												<tr>
													<td>{{ $key+1 }}</td>
													<td>
														<div class="media align-items-center">
															<div class="media-head me-2">
																<div class="avatar avatar-xs avatar-rounded">
																	<img src="/backend/dist/img/avatar1.jpg" alt="user" class="avatar-img">
																</div>
															</div>
															<div class="media-body">
																<span class="d-block text-high-em">{{ $value->name }}</span> 
															</div>
														</div>
													</td>
													<td class="text-truncate">{{ $value->email }}</td>
													<td>{{ $value->phone1 }}, {{ $value->phone2 }}</td>
													<td></td>
													<td>
														<div class="d-flex align-items-center">
															<div class="d-flex">
																<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Archive" href="#"><span class="icon"><span class="feather-icon"><i data-feather="archive"></i></span></span></a>
																<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit" href="edit-contact.html"><span class="icon"><span class="icon"><i class="fa fa-edit"></span></i></a>
																<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover del-button" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Delete" href="#"><span class="icon"><span class="feather-icon"><i data-feather="trash"></i></span></span></a>
															</div>
															<div class="dropdown">
																<button class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" aria-expanded="false" data-bs-toggle="dropdown"><span class="icon"><span class="feather-icon"><i data-feather="more-vertical"></i></span></span></button>
																<div class="dropdown-menu dropdown-menu-end">
																	<a class="dropdown-item" href="edit-contact.html"><span class="feather-icon dropdown-icon"><i data-feather="edit"></i></span><span>Edit User</span></a>
																	<a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="trash-2"></i></span><span>Delete</span></a>
																	<div class="dropdown-divider"></div>
																	<h6 class="dropdown-header dropdown-header-bold">Change Role</h6>
																	<a class="dropdown-item" href="#">Agent</a>
																	<a class="dropdown-item" href="#">Mobilizer</a>
																	<a class="dropdown-item" href="#">Admin</a>
																	<a class="dropdown-item" href="#">Ward Coordinator</a>
																	<a class="dropdown-item" href="#">LGA Coordinator</a>
						
																</div>
															</div>
														</div>
													</td>
												</tr>
												@endforeach
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<!-- Edit Info -->
						<div id="add_new_contact" class="modal fade add-new-contact" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-body">
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
										<h5 class="mb-5">Create New Conatct</h5>
										<form>
											<div class="row gx-3">
												<div class="col-sm-2 form-group">
													<div class="dropify-square">
														<input type="file"  class="dropify-1"/>
													</div>
												</div>
												<div class="col-sm-10 form-group">
													<textarea class="form-control mnh-100p" rows="4" placeholder="Add Biography"></textarea>
												</div>
											</div>
											<div class="title title-xs title-wth-divider text-primary text-uppercase my-4"><span>Basic Info</span></div>
											<div class="row gx-3">
												<div class="col-sm-4">
													<div class="form-group">
														<label class="form-label">First Name</label>
														<input class="form-control" type="text"/>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label class="form-label">Middle Name</label>
														<input class="form-control" type="text"/>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label class="form-label">Last Name</label>
														<input class="form-control" type="text"/>
													</div>
												</div>
											</div>
											<div class="row gx-3">
												<div class="col-sm-6">
													<div class="form-group">
														<label class="form-label">Email ID</label>
														<input class="form-control" type="text"/>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label class="form-label">Phone</label>
														<input class="form-control" type="text"/>
													</div>
												</div>
											</div>
											<div class="row gx-3">
												<div class="col-sm-4">
													<div class="form-group">
														<label class="form-label">City</label>
														<select class="form-select">
															<option selected="">--</option>
															<option value="1">One</option>
															<option value="2">Two</option>
															<option value="3">Three</option>
														</select>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label class="form-label">State</label>
														<select class="form-select">
															<option selected="">--</option>
															<option value="1">One</option>
															<option value="2">Two</option>
															<option value="3">Three</option>
														</select>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label class="form-label">Country</label>
														<select class="form-select">
															<option selected="">--</option>
															<option value="1">One</option>
															<option value="2">Two</option>
															<option value="3">Three</option>
														</select>
													</div>
												</div>
											</div>
											<div class="title title-xs title-wth-divider text-primary text-uppercase my-4"><span>Company Info</span></div>
											<div class="row gx-3">
												<div class="col-sm-6">
													<div class="form-group">
														<label class="form-label">Company Name</label>
														<input class="form-control" type="text"/>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label class="form-label">Designation</label>
														<input class="form-control" type="text"/>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label class="form-label">Website</label>
														<input class="form-control" type="text"/>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label class="form-label">Work Phone</label>
														<input class="form-control" type="text"/>
													</div>
												</div>
											</div>
											<div class="title title-xs title-wth-divider text-primary text-uppercase my-4"><span>Additional Info</span></div>
											<div class="row gx-3">
												<div class="col-sm-12">
													<div class="form-group">
														<label class="form-label">Tags</label>
														<select id="input_tags_2" class="form-control" multiple="multiple">
														</select>
														<small class="form-text text-muted">
														   You can add upto 4 tags per contact
														</small>
													</div>
												</div>
											</div>
											<div class="row gx-3">
												<div class="col-sm-6">
													<div class="form-group">
														<input class="form-control" type="text" placeholder="Facebook"/>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<input class="form-control" type="text" placeholder="Twitter"/>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<input class="form-control" type="text" placeholder="LinkedIn"/>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<input class="form-control" type="text" placeholder="Gmail"/>
													</div>
												</div>
											</div>
										</form>
									</div>
									<div class="modal-footer align-items-center">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Discard</button>
										<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Create Contact</button>
									</div>
								</div>
							</div>
						</div>
						<!-- /Edit Info -->
						
					</div>
				</div>
			</div>
			<!-- /Page Body -->
		</div>
		<!-- /Main Content -->

@endsection