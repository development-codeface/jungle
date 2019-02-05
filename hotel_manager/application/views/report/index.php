
		<div id="page-wrapper" style="min-height: 610px;">

            <div class="container-fluid">
            	
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Report
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <!-- <i class="fa fa-fw fa-table"></i>  -->Report
                            </li>
                        </ol>
                        <!-- BreadCrumbs << -->
                    </div>
                </div>
            	
            	<!-- Over view Icons >> -->
                <div class="row report_cus">
                    <div class="col-lg-2 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading icons_cus_block1">
                                <div class="row ">
                                    <div class="col-xs-12">
                                        <i class="fa fa-plane fa-3x"></i>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="huge"></div>
                                        <div>Expected Arrivals</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url();?>report/monthly">
                                <div class="panel-footer">
                                    <span class="pull-left">View Report</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading icons_cus_block1">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <i class="fa fa-calendar fa-3x"></i>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="huge"></div>
                                        <div>Monthly Bookings</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url();?>report/monthly_bookings">
                                <div class="panel-footer">
                                    <span class="pull-left">View Report</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--<div class="col-lg-2 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading icons_cus_block1">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <i class="fa fa-building fa-3x"></i>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="huge"></div>
                                        <div>Agency Bookings</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url();?>report/agency">
                                <div class="panel-footer">
                                    <span class="pull-left">View Report</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading icons_cus_block1">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <i class="fa fa-calendar fa-3x"></i>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="huge"></div>
                                        <div>Direct Bookings</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url();?>report/direct">
                                <div class="panel-footer">
                                    <span class="pull-left">View Report</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                                    <div class="col-lg-2 col-md-6">
                        <div class="panel panel-magento">
                            <div class="panel-heading icons_cus_block1">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <i class="fa fa-calendar fa-3x"></i>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="huge"></div>
                                        <div>Online Bookings</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url();?>report/online">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                                       <div class="col-lg-2 col-md-6">
                        <div class="panel panel-orange">
                            <div class="panel-heading icons_cus_block1">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <i class="fa fa-calendar fa-3x"></i>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="huge"></div>
                                        <div>Check-in</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url();?>report/checkin">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    
                                    <div class="col-lg-2 col-md-6">
                        <div class="panel panel-blue-cus">
                            <div class="panel-heading icons_cus_block1">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <i class="fa fa-calendar fa-3x"></i>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="huge"></div>
                                        <div>Check-out</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url();?>report/checkout">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>-->
                                    <div class="col-lg-2 col-md-6">
                        <div class="panel panel-violet">
                            <div class="panel-heading icons_cus_block1">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <i class="fa fa-calendar fa-3x"></i>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="huge"></div>
                                        <div>No Show</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url();?>report/noshow">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                                       <div class="col-lg-2 col-md-6">
                        <div class="panel panel-blue3">
                            <div class="panel-heading icons_cus_block1">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <i class="fa fa-calendar fa-3x"></i>
                                    </div>
                                    <div class="col-xs-12">
                                        <div>Bookings</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url();?>report/bookings">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div> 
                                                  <div class="col-lg-2 col-md-6">
                        <div class="panel panel-blue6">
                            <div class="panel-heading icons_cus_block1">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <i class="fa fa-calendar fa-3x"></i>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="huge"></div>
                                        <div>Check-in / Check-out</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url();?>report/check_in_out">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    
                 
                </div>
                <!-- Over view Icons << -->

            </div>
            <!-- /.container-fluid -->
			
		</div>