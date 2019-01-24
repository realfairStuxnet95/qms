<?php 
   require 'authorization.php';
   require 'classes_loader.php';
   ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Welcome <?php echo $_SESSION['user_names'].' |Queue Management System'; ?></title>
      <link type="text/css" href="assets/css/vendor-morris.css" rel="stylesheet">
      <link type="text/css" href="assets/css/vendor-bootstrap-datepicker.css" rel="stylesheet">
      <!-- Prevent the demo from appearing in search engines -->
      <meta name="robots" content="noindex">
      <?php 
         $router->loadView("Utils/stylesheet");
         ?>
   </head>
   <body>
      <div class="mdk-drawer-layout js-mdk-drawer-layout" data-fullbleed data-push data-responsive-width="992px" data-has-scrolling-region>
         <div class="mdk-drawer-layout__content">
            <!-- header-layout -->
            <div class="mdk-header-layout js-mdk-header-layout  mdk-header--fixed  mdk-header-layout__content--scrollable">
               <!-- header -->
               <?php 
                  $router->loadView("Utils/header");
                  ?>
               <!-- content -->
               <div class="mdk-header-layout__content top-navbar mdk-header-layout__content--scrollable h-100">
                  <!-- main content -->
                  <div class="container-fluid">
                     <div class="row font-1">
                        <div class="col-lg-4">
                           <div class="card card-body flex-row align-items-center">
                              <h5 class="m-0"><i class="material-icons align-middle text-muted md-18">content_paste</i> Today</h5>
                              <div class="text-primary ml-auto">$12,319</div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="card card-body flex-row align-items-center">
                              <h5 class="m-0"> Last 7 Days</h5>
                              <div class="text-primary ml-auto">$35,129</div>
                              <i class="material-icons text-success md-18 ml-1">arrow_upward</i>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="card card-body flex-row align-items-center">
                              <h5 class="m-0"> Past 30 Days</h5>
                              <div class="text-primary ml-auto">$142,545</div>
                              <i class="material-icons text-success md-18 ml-1">arrow_upward</i>
                           </div>
                        </div>
                     </div>
                     <div class="card card-earnings">
                        <div class="card-group">
                           <div class="card card-body mb-0">
                              <div class="media align-items-center">
                                 <div class="media-body">
                                    <p class="card-text text-muted mb-1">Earned today</p>
                                    <h1 class="mb-0 font-weight-normal">&dollar;6,120</h1>
                                 </div>
                                 <div class="badge badge-success">+52%</div>
                              </div>
                           </div>
                           <div class="card card-body mb-0">
                              <div class="media align-items-center">
                                 <div class="media-body">
                                    <p class="card-text text-muted mb-1">Earned this week</p>
                                    <h1 class="mb-0 font-weight-normal">&dollar;14,276</h1>
                                 </div>
                                 <div class="badge badge-primary">+16%</div>
                              </div>
                           </div>
                           <div class="card card-body mb-0">
                              <div class="media align-items-center">
                                 <div class="media-body">
                                    <p class="card-text text-muted mb-1">Earned this month</p>
                                    <h1 class="mb-0 font-weight-normal">&dollar;39,882</h1>
                                 </div>
                                 <div class="badge badge-warning">+5%</div>
                              </div>
                           </div>
                        </div>
                        <div class="p-2 bg-primary">
                           <div id="morris-area-chart" style="width: 100%; height: 250px;"></div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-4">
                           <div class="card card-body card-profile align-items-center justify-content-center">
                              <img src="assets/images/avatars/person-3.jpg" class="img-fluid rounded-circle mr-2 mb-1" width="100" alt="">
                              <p class="h3 mb-0">John Strehl</p>
                              <p>Top Seller (last month)</p>
                              <div class="text-center mb-2">
                                 <span class="badge badge-warning mr-2 mb-1">JavaScript</span>
                                 <span class="badge badge-primary mr-2 mb-1">Bootstrap</span>
                                 <span class="badge badge-danger mr-2 mb-1">PhotoShop</span>
                                 <span class="badge badge-info mr-2 mb-1">HTML</span>
                                 <span class="badge badge-gray mr-2 mb-1">Rails</span>
                              </div>
                              <a href="profile.html" class="btn btn-white align-middle">
                              <i class="material-icons md-18 align-middle">account_box</i>
                              <span class="align-middle">View Details</span>
                              </a>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="card">
                              <div class="card-header d-flex align-items-center">
                                 <div class="card-title">
                                    Top Earnings
                                 </div>
                                 <i class="material-icons ml-auto text-muted">local_atm</i>
                              </div>
                              <ul class="list-group list-group-flush">
                                 <li class="list-group-item d-flex flex-row">
                                    <img src="assets/images/avatars/person-1.jpg" alt="" class="rounded-circle mr-2" width="30" height="30">
                                    <div class="media-body">
                                       <span class="">Has earned</span>
                                       <strong>$1,742.00</strong>
                                       <div><small class="text-muted">5 minutes ago</small></div>
                                    </div>
                                 </li>
                                 <li class="list-group-item d-flex flex-row">
                                    <img src="assets/images/avatars/person-2.jpg" alt="" class="rounded-circle mr-2" width="30" height="30">
                                    <div class="media-body">
                                       <span class="">Has earned</span>
                                       <strong>$4,120.55</strong>
                                       <div><small class="text-muted">14 minutes ago</small></div>
                                    </div>
                                 </li>
                                 <li class="list-group-item d-flex flex-row">
                                    <img src="assets/images/avatars/person-3.jpg" alt="" class="rounded-circle mr-2" width="30" height="30">
                                    <div class="media-body">
                                       <span class="">Uploaded a new</span>
                                       <strong>video</strong>
                                       <div><small class="text-muted">32 minutes ago</small></div>
                                    </div>
                                 </li>
                                 <li class="list-group-item d-flex flex-row">
                                    <img src="assets/images/avatars/person-4.jpg" alt="" class="rounded-circle mr-2" width="30" height="30">
                                    <div class="media-body">
                                       <span class="">Has earned</span>
                                       <strong>$2,721.23</strong>
                                       <div><small class="text-muted">3 hours ago</small></div>
                                    </div>
                                 </li>
                                 <li class="list-group-item d-flex flex-row">
                                    <img src="assets/images/avatars/person-5.jpg" alt="" class="rounded-circle mr-2" width="30" height="30">
                                    <div class="media-body">
                                       <span class="">Uploaded a new</span>
                                       <strong>video</strong>
                                       <div><small class="text-muted">4 hours ago</small></div>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="card">
                              <div class="card-header d-flex align-items-center">
                                 <div class="card-title">
                                    Rankings
                                 </div>
                                 <i class="material-icons ml-auto text-muted">local_activity</i>
                              </div>
                              <ul class="list-group list-group-flush">
                                 <li class="list-group-item">
                                    <div class="media align-items-center">
                                       <span class="lead mr-1">1.</span>
                                       <img src="assets/images/avatars/person-5.jpg" class="img-fluid rounded-circle mr-2" width="30" alt="">
                                       <div class="media-body lh-12">
                                          <a href="#">John Mix</a><br/>
                                          <small class="text-muted">54 done</small>
                                       </div>
                                       <div class="lead">
                                          <strong class="align-middle">98%</strong> <i class="material-icons md-18 align-middle text-success">arrow_upward</i>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="list-group-item">
                                    <div class="media align-items-center">
                                       <span class="lead mr-1">2.</span>
                                       <img src="assets/images/avatars/person-3.jpg" class="img-fluid rounded-circle mr-2" width="30" alt="">
                                       <div class="media-body lh-12">
                                          <a href="#">Steven Short</a><br/>
                                          <small class="text-muted">11 done</small>
                                       </div>
                                       <div class="lead">
                                          <strong class="align-middle">33%</strong> <i class="material-icons md-18 align-middle text-danger">arrow_downward</i>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="list-group-item">
                                    <div class="media align-items-center">
                                       <span class="lead mr-1">3.</span>
                                       <img src="assets/images/avatars/person-6.jpg" class="img-fluid rounded-circle mr-2" width="30" alt="">
                                       <div class="media-body lh-12">
                                          <a href="#">Mark Ups</a><br/>
                                          <small class="text-muted">1 done</small>
                                       </div>
                                       <div class="lead">
                                          <strong class="align-middle">8%</strong> <i class="material-icons md-18 align-middle text-danger">arrow_downward</i>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="list-group-item">
                                    <div class="media align-items-center">
                                       <span class="lead mr-1">4.</span>
                                       <img src="assets/images/avatars/person-2.jpg" class="img-fluid rounded-circle mr-2" width="30" alt="">
                                       <div class="media-body lh-12">
                                          <a href="#">Tara Knows</a><br/>
                                          <small class="text-muted">35 done</small>
                                       </div>
                                       <div class="lead">
                                          <strong class="align-middle">86%</strong> <i class="material-icons md-18 align-middle text-success">arrow_upward</i>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="list-group-item">
                                    <div class="media align-items-center">
                                       <span class="lead mr-1">5.</span>
                                       <img src="assets/images/avatars/person-1.jpg" class="img-fluid rounded-circle mr-2" width="30" alt="">
                                       <div class="media-body lh-12">
                                          <a href="#">Lucas Kane</a><br/>
                                          <small class="text-muted">25 done</small>
                                       </div>
                                       <div class="lead">
                                          <strong class="align-middle">86%</strong> <i class="material-icons md-18 align-middle text-success">arrow_upward</i>
                                       </div>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="card">
                        <div class="card-header">
                           <div class="row align-items-center">
                              <div class="col-md-4">
                                 <div class="card-title">Recent Orders</div>
                              </div>
                              <div class="col-md-8 d-flex justify-content-md-end">
                                 <div class="dropdown mr-2">
                                    <button class="btn btn-white dropdown-toggle" type="button" id="sortOrdersDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Sort By
                                    </button>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="#">Date</a>
                                       <a class="dropdown-item" href="#">ID</a>
                                       <a class="dropdown-item" href="#">Name</a>
                                    </div>
                                 </div>
                                 <div class="dropdown mr-4">
                                    <button class="btn btn-white dropdown-toggle" type="button" id="filterOrdersDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Filter
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="filterOrdersDropdown">
                                       <a class="dropdown-item" href="#">Delivered</a>
                                       <a class="dropdown-item" href="#">Failed</a>
                                       <a class="dropdown-item" href="#">Pending</a>
                                    </div>
                                 </div>
                                 <form class="form-inline float-right">
                                    <div class="form-group mr-3">
                                       <label class="control-label mr-1">From:</label>
                                       <input type="text" class="datepicker form-control" value="10/24/2017">
                                    </div>
                                    <div class="form-group mb-0">
                                       <label class="control-label mr-1">To: </label>
                                       <input type="text" class="datepicker form-control" value="10/25/2017">
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <div class="table-responsive">
                           <table class="table m-0">
                              <thead>
                                 <tr class="bg-fade">
                                    <th style="width: 120px;">Date</th>
                                    <th>Name</th>
                                    <th style="width: 100px;"># INV</th>
                                    <th style="width: 140px;">Amount</th>
                                    <th style="width: 100px">Status</th>
                                    <th></th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td class="align-middle">23 Feb 2018</td>
                                    <td class="align-middle">
                                       <div><i class="material-icons align-middle md-18 text-link-color">contacts</i> <a href="#"> Tara Knows</a>
                                          <em class="text-muted ml-1">(Sales Manager)</em>
                                       </div>
                                    </td>
                                    <td class="align-middle">
                                       <a href="#">#31982</a>
                                    </td>
                                    <td class="align-middle">&dollar;8650.99</td>
                                    <td class="align-middle">
                                       <div class="badge badge-warning">pending</div>
                                    </td>
                                    <td class="align-middle" style="width:40px">
                                       <a class="btn btn-white btn-sm" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       <i class="material-icons md-18 align-middle">more_vert</i>
                                       </a>
                                       <div class="dropdown-menu">
                                          <a class="dropdown-item" href="#">
                                          <i class="material-icons md-14 align-middle">assignment</i>
                                          <span class="align-middle">Manage</span>
                                          </a>
                                          <a class="dropdown-item" href="#">
                                          <i class="material-icons md-14 align-middle">content_copy</i>
                                          <span class="align-middle">Duplicate</span>
                                          </a>
                                          <div class="dropdown-divider"></div>
                                          <a class="dropdown-item text-danger" href="#">
                                          <i class="material-icons md-14 align-middle">delete</i>
                                          <span class="align-middle">Delete</span>
                                          </a>
                                       </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td class="align-middle">09 Feb 2018</td>
                                    <td class="align-middle">
                                       <div><i class="material-icons align-middle md-18 text-link-color">contacts</i> <a href="#"> Karen Smith</a>
                                          <em class="text-muted ml-1">(Sales Representative)</em>
                                       </div>
                                    </td>
                                    <td class="align-middle">
                                       <a href="#">#11102</a>
                                    </td>
                                    <td class="align-middle">&dollar;3445.00</td>
                                    <td class="align-middle">
                                       <div class="badge badge-danger">failed</div>
                                    </td>
                                    <td class="align-middle" style="width:40px">
                                       <a class="btn btn-white btn-sm" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       <i class="material-icons md-18 align-middle">more_vert</i>
                                       </a>
                                       <div class="dropdown-menu">
                                          <a class="dropdown-item" href="#">
                                          <i class="material-icons md-14 align-middle">assignment</i>
                                          <span class="align-middle">Manage</span>
                                          </a>
                                          <a class="dropdown-item" href="#">
                                          <i class="material-icons md-14 align-middle">content_copy</i>
                                          <span class="align-middle">Duplicate</span>
                                          </a>
                                          <div class="dropdown-divider"></div>
                                          <a class="dropdown-item text-danger" href="#">
                                          <i class="material-icons md-14 align-middle">delete</i>
                                          <span class="align-middle">Delete</span>
                                          </a>
                                       </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td class="align-middle">08 Jan 2017</td>
                                    <td class="align-middle">
                                       <div><i class="material-icons align-middle md-18 text-link-color">contacts</i> <a href="#"> Steven Short</a>
                                          <em class="text-muted ml-1">(Sales Manager)</em>
                                       </div>
                                    </td>
                                    <td class="align-middle">
                                       <a href="#">#11990</a>
                                    </td>
                                    <td class="align-middle">&dollar;2390.75</td>
                                    <td class="align-middle">
                                       <div class="badge badge-success">delivered</div>
                                    </td>
                                    <td class="align-middle" style="width:40px">
                                       <a class="btn btn-white btn-sm" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       <i class="material-icons md-18 align-middle">more_vert</i>
                                       </a>
                                       <div class="dropdown-menu">
                                          <a class="dropdown-item" href="#">
                                          <i class="material-icons md-14 align-middle">assignment</i>
                                          <span class="align-middle">Manage</span>
                                          </a>
                                          <a class="dropdown-item" href="#">
                                          <i class="material-icons md-14 align-middle">content_copy</i>
                                          <span class="align-middle">Duplicate</span>
                                          </a>
                                          <div class="dropdown-divider"></div>
                                          <a class="dropdown-item text-danger" href="#">
                                          <i class="material-icons md-14 align-middle">delete</i>
                                          <span class="align-middle">Delete</span>
                                          </a>
                                       </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td class="align-middle">18 Dec 2017</td>
                                    <td class="align-middle">
                                       <div><i class="material-icons align-middle md-18 text-link-color">contacts</i> <a href="#"> Mark Ups</a>
                                          <em class="text-muted ml-1">(CEO / Co-Founder)</em>
                                       </div>
                                    </td>
                                    <td class="align-middle">
                                       <a href="#">#40915</a>
                                    </td>
                                    <td class="align-middle">&dollar;19231.50</td>
                                    <td class="align-middle">
                                       <div class="badge badge-success">delivered</div>
                                    </td>
                                    <td class="align-middle" style="width:40px">
                                       <a class="btn btn-white btn-sm" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       <i class="material-icons md-18 align-middle">more_vert</i>
                                       </a>
                                       <div class="dropdown-menu">
                                          <a class="dropdown-item" href="#">
                                          <i class="material-icons md-14 align-middle">assignment</i>
                                          <span class="align-middle">Manage</span>
                                          </a>
                                          <a class="dropdown-item" href="#">
                                          <i class="material-icons md-14 align-middle">content_copy</i>
                                          <span class="align-middle">Duplicate</span>
                                          </a>
                                          <div class="dropdown-divider"></div>
                                          <a class="dropdown-item text-danger" href="#">
                                          <i class="material-icons md-14 align-middle">delete</i>
                                          <span class="align-middle">Delete</span>
                                          </a>
                                       </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td class="align-middle">17 Nov 2017</td>
                                    <td class="align-middle">
                                       <div><i class="material-icons align-middle md-18 text-link-color">contacts</i> <a href="#"> Steven Short</a>
                                          <em class="text-muted ml-1">(Sales Assistant Manager)</em>
                                       </div>
                                    </td>
                                    <td class="align-middle">
                                       <a href="#">#40912</a>
                                    </td>
                                    <td class="align-middle">&dollar;19231.50</td>
                                    <td class="align-middle">
                                       <div class="badge badge-success">delivered</div>
                                    </td>
                                    <td class="align-middle" style="width:40px">
                                       <a class="btn btn-white btn-sm" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       <i class="material-icons md-18 align-middle">more_vert</i>
                                       </a>
                                       <div class="dropdown-menu">
                                          <a class="dropdown-item" href="#">
                                          <i class="material-icons md-14 align-middle">assignment</i>
                                          <span class="align-middle">Manage</span>
                                          </a>
                                          <a class="dropdown-item" href="#">
                                          <i class="material-icons md-14 align-middle">content_copy</i>
                                          <span class="align-middle">Duplicate</span>
                                          </a>
                                          <div class="dropdown-divider"></div>
                                          <a class="dropdown-item text-danger" href="#">
                                          <i class="material-icons md-14 align-middle">delete</i>
                                          <span class="align-middle">Delete</span>
                                          </a>
                                       </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td class="align-middle">08 Oct 2017</td>
                                    <td class="align-middle">
                                       <div><i class="material-icons align-middle md-18 text-link-color">contacts</i> <a href="#"> Karen Smith</a>
                                          <em class="text-muted ml-1">(Sales Representative)</em>
                                       </div>
                                    </td>
                                    <td class="align-middle">
                                       <a href="#">#1928</a>
                                    </td>
                                    <td class="align-middle">&dollar;1100.50</td>
                                    <td class="align-middle">
                                       <div class="badge badge-danger">failed</div>
                                    </td>
                                    <td class="align-middle" style="width:40px">
                                       <a class="btn btn-white btn-sm" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       <i class="material-icons md-18 align-middle">more_vert</i>
                                       </a>
                                       <div class="dropdown-menu">
                                          <a class="dropdown-item" href="#">
                                          <i class="material-icons md-14 align-middle">assignment</i>
                                          <span class="align-middle">Manage</span>
                                          </a>
                                          <a class="dropdown-item" href="#">
                                          <i class="material-icons md-14 align-middle">content_copy</i>
                                          <span class="align-middle">Duplicate</span>
                                          </a>
                                          <div class="dropdown-divider"></div>
                                          <a class="dropdown-item text-danger" href="#">
                                          <i class="material-icons md-14 align-middle">delete</i>
                                          <span class="align-middle">Delete</span>
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
            </div>
         </div>
         <!-- // END drawer-layout__content -->
         <!-- drawer -->
         <?php $router->loadView("Utils/sidebar"); ?>
         <!-- // END drawer -->
         <!-- drawer -->
         <?php $router->loadView("Utils/drawer"); ?>
         <!-- // END drawer -->
      </div>
      <!-- // END drawer-layout -->
      <!-- jQuery -->
      <script src="assets/vendor/jquery.min.js"></script>
      <!-- Bootstrap -->
      <script src="assets/vendor/popper.js"></script>
      <script src="assets/vendor/bootstrap.min.js"></script>
      <!-- Simplebar -->
      <!-- Used for adding a custom scrollbar to the drawer -->
      <script src="assets/vendor/simplebar.js"></script>
      <!-- Vendor -->
      <script src="assets/vendor/Chart.min.js"></script>
      <script src="assets/vendor/moment.min.js"></script>
      <!-- APP -->
      <script src="assets/js/color_variables.js"></script>
      <script src="assets/js/app.js"></script>
      <script src="assets/vendor/dom-factory.js"></script>
      <!-- DOM Factory -->
      <script src="assets/vendor/material-design-kit.js"></script>
      <!-- MDK -->
      <script>
         (function() {
             'use strict';
             // Self Initialize DOM Factory Components
             domFactory.handler.autoInit()
         
         
             // Connect button(s) to drawer(s)
             var sidebarToggle = document.querySelectorAll('[data-toggle="sidebar"]')
         
             sidebarToggle.forEach(function(toggle) {
                 toggle.addEventListener('click', function(e) {
                     var selector = e.currentTarget.getAttribute('data-target') || '#default-drawer'
                     var drawer = document.querySelector(selector)
                     if (drawer) {
                         if (selector == '#default-drawer') {
                             $('.container-fluid').toggleClass('container--max');
                         }
                         drawer.mdkDrawer.toggle();
                     }
                 })
             })
         })()
      </script>
      <script src="assets/vendor/morris.min.js"></script>
      <script src="assets/vendor/raphael.min.js"></script>
      <script src="assets/vendor/bootstrap-datepicker.min.js"></script>
      <script src="assets/js/datepicker.js"></script>
      <script>
         $(function() {
             window.morrisDashboardChart = new Morris.Area({
                 element: 'morris-area-chart',
                 data: [{
                         year: '2017-01',
                         a: 6352.27
                     },
                     {
                         year: '2017-02',
                         a: 4309.98
                     },
                     {
                         year: '2017-03',
                         a: 1465.98
                     },
                     {
                         year: '2017-04',
                         a: 1298.25
                     },
                     {
                         year: '2017-05',
                         a: 3209
                     },
                     {
                         year: '2017-06',
                         a: 2083
                     },
                     {
                         year: '2017-07',
                         a: 1285.23
                     },
                     {
                         year: '2017-08',
                         a: 1289
                     },
                     {
                         year: '2017-09',
                         a: 4430
                     },
                     {
                         year: '2017-10',
                         a: 8921.19
                     }
                 ],
                 xkey: 'year',
                 ykeys: ['a'],
                 labels: ['Earnings'],
                 lineColors: ['#fff'],
                 fillOpacity: '0.2',
                 gridEnabled: true,
                 gridTextColor: '#ffffff',
                 resize: true
             });
         
         });
      </script>
   </body>
</html>