{{-- Extends layout --}}
@extends('layouts.dashboard')

@section('title')
Dashboard
@endsection

{{-- Content --}}
@section('content')
<!-- row -->
<div class="container-fluid">
  <div class="row">
    <div class="col-xl-12 col-xxl-12">
      <div class="row">
        <div class="col-sm-6">
          <div class="card avtivity-card">
            <div class="card-body">
              <div class="media align-items-center">
                <span class="activity-icon bgl-success mr-md-4 mr-7">
                  <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#27BC48" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22" ></polyline>
                  </svg>
                </span>
                <div class="media-body">
                  <p class="fs-14 mb-2">Weekly Progress</p>
                  <span class="title text-black font-w600">42%</span>
                </div>
              </div>
              <div class="progress" style="height:5px;">
                <div class="progress-bar bg-success" style="width: 42%; height:5px;" role="progressbar">
                  <span class="sr-only">42% Complete</span>
                </div>
              </div>
            </div>
            <div class="effect bg-success"></div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card avtivity-card">
            <div class="card-body">
              <div class="media align-items-center">
                <span class="activity-icon bgl-secondary  mr-md-4 mr-3">
                  <svg xmlns="http://www.w3.org/2000/svg" width="37" height="37" fill="#A02CFA" class="bi bi-tools" viewBox="0 0 16 16"> 
                    <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.356 3.356a1 1 0 0 0 1.414 0l1.586-1.586a1 1 0 0 0 0-1.414l-3.356-3.356a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0zm9.646 10.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708zM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11z"/>
                  </svg>            
                </span>
                <div class="media-body">
                  <p class="fs-14 mb-2">Weekly Progress</p>
                  <span class="title text-black font-w600">42km</span>
                </div>
              </div>
              <div class="progress" style="height:5px;">
                <div class="progress-bar bg-secondary" style="width: 82%; height:5px;" role="progressbar">
                  <span class="sr-only">42% Complete</span>
                </div>
              </div>
            </div>
            <div class="effect bg-secondary"></div>
          </div>
        </div>

       
        <!-- MODAL -->
        <div class="bootstrap-modal">
          <!-- Button trigger modal -->
           
          <!-- Large modal -->
          <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Detail</h5>
                  <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="col-xl-12 col-lg-12">
                    <div class="basic-form">
                      <form>
                        <div class="form-row">
                          <div class="form-group col-md-3">
                            <label>Nama pengaju</label>
                            <input type="text" class="form-control" placeholder="1234 Main St">
                          </div>
                          <div class="form-group col-md-3">
                            <label>NIM</label>
                            <input type="email" class="form-control" placeholder="Email">
                          </div>
                          <div class="form-group col-md-3">
                            <label>P.Jawab</label>
                            <input type="password" class="form-control" placeholder="Password">
                          </div>
                          <div class="form-group col-md-3">
                            <label>PIC</label>
                            <input type="text" class="form-control">
                          </div>
                          <div class="form-group col-md-3">
                            <label>Tanggal Peminjaman</label>
                            <input type="text" id="date-format" class="form-control" placeholder="1234 Main St">
                          </div>
                          <div class="form-group col-md-3">
                            <label>Tanggal Pengembalian</label>
                            <input type="text" id="date-format" class="form-control" placeholder="Saturday 24 June 2017 - 21:44">
                          </div>
                          <div class="form-group col-md-3">
                            <label>Status Penanggung Jawab</label>
                            <input style="color: #2BC155;" type="text" class="form-control light badge-success" placeholder="Approved" value="Approved">
                          </div>
                          <div class="form-group col-md-3">
                            <label>Status PIC</label>
                            <input type="text" class="form-control light badge-warning placeholder="Process" value="Process"">
                          </div>
                        </div>
                        <hr>
                        <label>Detail alat yang diajukan</label>
                        <!-- <h5 class="modal-title">Modal title</h5> -->
                        <div class="pt-4">
                          <div class="table-responsive">
                            <table id="example5" class="display min-w850">
                            <thead>
                                <tr>
                                  <th>Order ID</th>
                                  <th>Date Check in</th>
                                  <th>Name</th>
                                  <th>Assgined</th>
                                  <th>Disease</th>
                                  <th>Status</th>
                                  <th>Table no</th>
                                  <th>
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="checkAll" required="">
                                      <label class="custom-control-label" for="checkAll"></label>
                                    </div>
                                  </th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>#P-00001</td>
                                  <td>26/02/2020, 12:42 AM</td>
                                  <td>Tiger Nixon</td>
                                  <td>Dr. Cedric</td>
                                  <td>Cold & Flu</td>
                                  <td>
                                    <span class="badge light badge-danger">
                                      <i class="fa fa-circle text-danger mr-1"></i>
                                      New Patient
                                    </span>
                                  </td>
                                  <td>AB-001</td>	
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="customCheckBox1" required="">
                                      <label class="custom-control-label" for="customCheckBox1"></label>
                                    </div>
                                  </td>										
                                </tr>
                                <tr>
                                  <td>#P-00002</td>
                                  <td>26/02/2020, 12:42 AM</td>
                                  <td>Tiger Nixon</td>
                                  <td>Dr. Cedric</td>
                                  <td>Cold & Flu</td>
                                  <td>
                                    <span class="badge light badge-danger">
                                      <i class="fa fa-circle text-danger mr-1"></i>
                                      New Patient
                                    </span>
                                  </td>
                                  <td>AB-001</td>	
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
                                      <label class="custom-control-label" for="customCheckBox2"></label>
                                    </div>
                                  </td>										
                                </tr>
                                <tr>
                                  <td>#P-00003</td>
                                  <td>26/02/2020, 12:42 AM</td>
                                  <td>Tiger Nixon</td>
                                  <td>Dr. Cedric</td>
                                  <td>Cold & Flu</td>
                                  <td>
                                    <span class="badge light badge-danger">
                                      <i class="fa fa-circle text-danger mr-1"></i>
                                      New Patient
                                    </span>
                                  </td>
                                  <td>AB-001</td>		
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="customCheckBox3" required="">
                                      <label class="custom-control-label" for="customCheckBox3"></label>
                                    </div>
                                  </td>									
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                       </form>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Tutup</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!-- MODAL END -->
      </div>
    </div>
  </div>
</div>



<!-- DATA TABLE START-->
<div class="container-fluid">
  <div class="page-titles">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
      <li class="breadcrumb-item active"><a href="javascript:void(0)">Datatable</a></li>
    </ol>
  </div>
  <!-- row -->
  
  
  <div class="row">
    <!-- TABEL APPROVAL START -->
    <div class="col-xl-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Proses Approve</h4>
            </div>
            <div class="card-body">
              <!-- Nav tabs -->
              <div class="custom-tab-1">
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home1"><i class="la la-home mr-2"></i> Ruangan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#alat1"><i class="la la-tools mr-2"></i> Alat</a>
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="home1" role="tabpanel">
                    <div class="pt-4">
                      <div class="col-12">
                        <div class="table-responsive">
                          <table id="example5" class="display min-w850">
                            <thead>
                              <tr>
                                <th>Order ID</th>
                                <th>Date Check in</th>
                                <th>Name</th>
                                <th>Assgined</th>
                                <th>Disease</th>
                                <th>Status</th>
                                <th>Table no</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>#P-00001</td>
                                <td>26/02/2020, 12:42 AM</td>
                                <td>Tiger Nixon</td>
                                <td>Dr. Cedric</td>
                                <td>Cold & Flu</td>
                                <td>
                                  <span class="badge light badge-danger">
                                    <i class="fa fa-circle text-danger mr-1"></i>
                                    New Patient
                                  </span>
                                </td>
                                <td>AB-001</td>
                                <td>
                                  <div class="dropdown ml-auto text-right">
                                    <div class="btn-link" data-toggle="dropdown">
                                      <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right">
                                      <a class="dropdown-item" href="#">Accept Patient</a>
                                      <a class="dropdown-item" href="#">Reject Order</a>
                                      <a class="dropdown-item" data-toggle="modal" data-target=".bd-example-modal-lg" href="#">View Details</a>
                                    </div>
                                  </div>
                                </td>												
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="alat1">
                    <div class="pt-4">
                    <div class="col-12">
                        <div class="table-responsive">
                          <table id="example5" class="display min-w850">
                            <thead>
                              <tr>
                                <th>Order ID</th>
                                <th>Date Check in</th>
                                <th>Name</th>
                                <th>Assgined</th>
                                <th>Disease</th>
                                <th>Status</th>
                                <th>Table no</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>#P-00001</td>
                                <td>26/02/2020, 12:42 AM</td>
                                <td>Tiger Nixon</td>
                                <td>Dr. Cedric</td>
                                <td>Cold & Flu</td>
                                <td>
                                  <span class="badge light badge-danger">
                                    <i class="fa fa-circle text-danger mr-1"></i>
                                    New Patient
                                  </span>
                                </td>
                                <td>AB-001</td>
                                <td>
                                  <div class="dropdown ml-auto text-right">
                                    <div class="btn-link" data-toggle="dropdown">
                                      <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right">
                                      <a class="dropdown-item" href="#">Accept Patient</a>
                                      <a class="dropdown-item" href="#">Reject Order</a>
                                      <a class="dropdown-item" data-toggle="modal" data-target=".bd-example-modal-lg" href="#">View Details</a>
                                    </div>
                                  </div>
                                </td>												
                              </tr>
                              <tr>
                                <td>#P-00001</td>
                                <td>26/02/2020, 12:42 AM</td>
                                <td>Tiger Nixon</td>
                                <td>Dr. Cedric</td>
                                <td>Cold & Flu</td>
                                <td>
                                  <span class="badge light badge-danger">
                                    <i class="fa fa-circle text-danger mr-1"></i>
                                    New Patient
                                  </span>
                                </td>
                                <td>AB-001</td>
                                <td>
                                  <div class="dropdown ml-auto text-right">
                                    <div class="btn-link" data-toggle="dropdown">
                                      <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right">
                                      <a class="dropdown-item" href="#">Accept Patient</a>
                                      <a class="dropdown-item" href="#">Reject Order</a>
                                      <a class="dropdown-item" data-toggle="modal" data-target=".bd-example-modal-lg" href="#">View Details</a>
                                    </div>
                                  </div>
                                </td>												
                              </tr>
                              <tr>
                                <td>#P-00001</td>
                                <td>26/02/2020, 12:42 AM</td>
                                <td>Tiger Nixon</td>
                                <td>Dr. Cedric</td>
                                <td>Cold & Flu</td>
                                <td>
                                  <span class="badge light badge-danger">
                                    <i class="fa fa-circle text-danger mr-1"></i>
                                    New Patient
                                  </span>
                                </td>
                                <td>AB-001</td>
                                <td>
                                  <div class="dropdown ml-auto text-right">
                                    <div class="btn-link" data-toggle="dropdown">
                                      <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right">
                                      <a class="dropdown-item" href="#">Accept Patient</a>
                                      <a class="dropdown-item" href="#">Reject Order</a>
                                      <a class="dropdown-item" data-toggle="modal" data-target=".bd-example-modal-lg" href="#">View Details</a>
                                    </div>
                                  </div>
                                </td>												
                              </tr>
                              <tr>
                                <td>#P-00001</td>
                                <td>26/02/2020, 12:42 AM</td>
                                <td>Tiger Nixon</td>
                                <td>Dr. Cedric</td>
                                <td>Cold & Flu</td>
                                <td>
                                  <span class="badge light badge-danger">
                                    <i class="fa fa-circle text-danger mr-1"></i>
                                    New Patient
                                  </span>
                                </td>
                                <td>AB-001</td>
                                <td>
                                  <div class="dropdown ml-auto text-right">
                                    <div class="btn-link" data-toggle="dropdown">
                                      <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right">
                                      <a class="dropdown-item" href="#">Accept Patient</a>
                                      <a class="dropdown-item" href="#">Reject Order</a>
                                      <a class="dropdown-item" data-toggle="modal" data-target=".bd-example-modal-lg" href="#">View Details</a>
                                    </div>
                                  </div>
                                </td>												
                              </tr>
                              <tr>
                                <td>#P-00001</td>
                                <td>26/02/2020, 12:42 AM</td>
                                <td>Tiger Nixon</td>
                                <td>Dr. Cedric</td>
                                <td>Cold & Flu</td>
                                <td>
                                  <span class="badge light badge-danger">
                                    <i class="fa fa-circle text-danger mr-1"></i>
                                    New Patient
                                  </span>
                                </td>
                                <td>AB-001</td>
                                <td>
                                  <div class="dropdown ml-auto text-right">
                                    <div class="btn-link" data-toggle="dropdown">
                                      <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right">
                                      <a class="dropdown-item" href="#">Accept Patient</a>
                                      <a class="dropdown-item" href="#">Reject Order</a>
                                      <a class="dropdown-item" data-toggle="modal" data-target=".bd-example-modal-lg" href="#">View Details</a>
                                    </div>
                                  </div>
                                </td>												
                              </tr>
                              <tr>
                                <td>#P-00001</td>
                                <td>26/02/2020, 12:42 AM</td>
                                <td>Tiger Nixon</td>
                                <td>Dr. Cedric</td>
                                <td>Cold & Flu</td>
                                <td>
                                  <span class="badge light badge-danger">
                                    <i class="fa fa-circle text-danger mr-1"></i>
                                    New Patient
                                  </span>
                                </td>
                                <td>AB-001</td>
                                <td>
                                  <div class="dropdown ml-auto text-right">
                                    <div class="btn-link" data-toggle="dropdown">
                                      <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right">
                                      <a class="dropdown-item" href="#">Accept Patient</a>
                                      <a class="dropdown-item" href="#">Reject Order</a>
                                      <a class="dropdown-item" data-toggle="modal" data-target=".bd-example-modal-lg" href="#">View Details</a>
                                    </div>
                                  </div>
                                </td>												
                              </tr>
                              <tr>
                                <td>#P-00001</td>
                                <td>26/02/2020, 12:42 AM</td>
                                <td>Tiger Nixon</td>
                                <td>Dr. Cedric</td>
                                <td>Cold & Flu</td>
                                <td>
                                  <span class="badge light badge-danger">
                                    <i class="fa fa-circle text-danger mr-1"></i>
                                    New Patient
                                  </span>
                                </td>
                                <td>AB-001</td>
                                <td>
                                  <div class="dropdown ml-auto text-right">
                                    <div class="btn-link" data-toggle="dropdown">
                                      <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right">
                                      <a class="dropdown-item" href="#">Accept Patient</a>
                                      <a class="dropdown-item" href="#">Reject Order</a>
                                      <a class="dropdown-item" data-toggle="modal" data-target=".bd-example-modal-lg" href="#">View Details</a>
                                    </div>
                                  </div>
                                </td>												
                              </tr>
                              <tr>
                                <td>#P-00001</td>
                                <td>26/02/2020, 12:42 AM</td>
                                <td>Tiger Nixon</td>
                                <td>Dr. Cedric</td>
                                <td>Cold & Flu</td>
                                <td>
                                  <span class="badge light badge-danger">
                                    <i class="fa fa-circle text-danger mr-1"></i>
                                    New Patient
                                  </span>
                                </td>
                                <td>AB-001</td>
                                <td>
                                  <div class="dropdown ml-auto text-right">
                                    <div class="btn-link" data-toggle="dropdown">
                                      <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right">
                                      <a class="dropdown-item" href="#">Accept Patient</a>
                                      <a class="dropdown-item" href="#">Reject Order</a>
                                      <a class="dropdown-item" data-toggle="modal" data-target=".bd-example-modal-lg" href="#">View Details</a>
                                    </div>
                                  </div>
                                </td>												
                              </tr>
                              <tr>
                                <td>#P-00001</td>
                                <td>26/02/2020, 12:42 AM</td>
                                <td>Tiger Nixon</td>
                                <td>Dr. Cedric</td>
                                <td>Cold & Flu</td>
                                <td>
                                  <span class="badge light badge-danger">
                                    <i class="fa fa-circle text-danger mr-1"></i>
                                    New Patient
                                  </span>
                                </td>
                                <td>AB-001</td>
                                <td>
                                  <div class="dropdown ml-auto text-right">
                                    <div class="btn-link" data-toggle="dropdown">
                                      <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right">
                                      <a class="dropdown-item" href="#">Accept Patient</a>
                                      <a class="dropdown-item" href="#">Reject Order</a>
                                      <a class="dropdown-item" data-toggle="modal" data-target=".bd-example-modal-lg" href="#">View Details</a>
                                    </div>
                                  </div>
                                </td>												
                              </tr>
                              <tr>
                                <td>#P-00001</td>
                                <td>26/02/2020, 12:42 AM</td>
                                <td>Tiger Nixon</td>
                                <td>Dr. Cedric</td>
                                <td>Cold & Flu</td>
                                <td>
                                  <span class="badge light badge-danger">
                                    <i class="fa fa-circle text-danger mr-1"></i>
                                    New Patient
                                  </span>
                                </td>
                                <td>AB-001</td>
                                <td>
                                  <div class="dropdown ml-auto text-right">
                                    <div class="btn-link" data-toggle="dropdown">
                                      <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right">
                                      <a class="dropdown-item" href="#">Accept Patient</a>
                                      <a class="dropdown-item" href="#">Reject Order</a>
                                      <a class="dropdown-item" data-toggle="modal" data-target=".bd-example-modal-lg" href="#">View Details</a>
                                    </div>
                                  </div>
                                </td>												
                              </tr>
                              <tr>
                                <td>#P-00001</td>
                                <td>26/02/2020, 12:42 AM</td>
                                <td>Tiger Nixon</td>
                                <td>Dr. Cedric</td>
                                <td>Cold & Flu</td>
                                <td>
                                  <span class="badge light badge-danger">
                                    <i class="fa fa-circle text-danger mr-1"></i>
                                    New Patient
                                  </span>
                                </td>
                                <td>AB-001</td>
                                <td>
                                  <div class="dropdown ml-auto text-right">
                                    <div class="btn-link" data-toggle="dropdown">
                                      <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right">
                                      <a class="dropdown-item" href="#">Accept Patient</a>
                                      <a class="dropdown-item" href="#">Reject Order</a>
                                      <a class="dropdown-item" data-toggle="modal" data-target=".bd-example-modal-lg" href="#">View Details</a>
                                    </div>
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
            </div>
          </div>
        </div>
        <!-- TABEL APPROVAL END -->
  </div>
</div>
<!-- DATA TABLE END-->

@endsection