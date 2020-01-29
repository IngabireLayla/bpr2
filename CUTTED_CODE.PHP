 <!-- Modal: Edit Service -->
   
    <div class="modal fade modal_cover_2" id="modalServiceDetails" tabindex="-1" role="dialog" aria-hidden="true">
        <button type="button" class="close btn-lg mt-5 mr-5 text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body rounded grey lighten-3">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="p-0 m-0 mb-2">Hair Style : <b><span class="text-uppercase" id="hairStyle"></span></b></h3>
                            <h5 class="p-0 m-0 text-muted">Salon : <b><span class="text-uppercase" id="hairSalon"></span></b></h3>
                        </div>
                    </div>
                    <div class="form-row">
					 
                        <!-- Service Details -->
                        <div class="col-md-6">
                            <!-- Service Logo -->
                            <div class="view overlay z-depth-1-half bg-white rounded">
                                <img id="hairImage" src="assets/pics/service_image/<?php echo $found_s_logo;?>" class="img-fluid mx-auto" style="height:150px;" >
                                <div class="mask rgba-white-slight"></div>
                            </div>
							

                            <!-- Service Details -->
                            <div class="my-3">
                                <table class="table table-striped table-bordered table-sm mb-0 pb-0 view overlay z-depth-1-half rounded" cellspacing="0" width="100%">
                                    <tbody class="black-text font-weight-bold">
                                        <tr class="bg-white"><td class="text-muted text-justify" id="hairDescr"></td></tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="">
                                <table class="table table-striped table-bordered table-sm mb-0 pb-0 view overlay z-depth-1-half rounded" cellspacing="0" width="100%">
                                    <tbody class="black-text font-weight-bold">
                                        <tr class="bg-white"><td class="text-muted text-center h3 font-weight-bold" id="hairPrice"></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- New Service Data -->
                        <div class="col-md-6">
                            <div class="card p-3">
                                <form method="POST">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <h4 class="my-0 py-0 text-muted text-center">ORDER DETAILS</h4>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <span class="">Enter Your Names</span>
                                            <input type="text" class="form-control text-uppercase" required name="hairCust" placeholder="Your Names" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-9">
                                            <span class="">Enter Phone No.</span>
                                            <input type="tel" class="form-control" required name="hairPhone" placeholder="Your Phone No." pattern="[0]{1}[7]{1}[0-9]{8}" />
                                        </div>

                                        <div class="col-sm-3">
                                            <span class="">Id</span>
                                            <input type="text" class="form-control" required readonly name="hairServ" id="hairServ" />
                                        </div>
                                    </div>

                                    <div class="form-row mb-3">                                    
                                        <div class="col-sm-6">
                                            <span class="">Set Date</span>
                                            <input type="date" class="form-control" required name="hairDate" min="<?php echo date("Y-m-d"); ?>" />
                                        </div>

                                        <div class="col-sm-6">
                                            <span class="">Set Time</span>
                                            <?php echo '<input type="time" class="form-control" required name="hairTime" min="'.$selectedSalon_open_from.'" max="'.$selectedSalon_open_to.'" />'; ?>
                                        </div>
                                    </div>

                                    <hr class="mb-3">
                                    
                                    <button type="submit" class="btn btn-block btn-unique px-2"><b>Place &nbsp&nbsp Order</b></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
	