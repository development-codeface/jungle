
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading >> -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        Users
                        </h1>
                        <!-- BreadCrumbs >> -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-table"></i> Promotion
                            </li>
                        </ol>
                        <!-- BreadCrumbs << -->
                    </div>
                </div>
                <!-- Page Heading << -->
                

				
				<div class="row">
                    <div class="col-lg-10 col-sm-offset-1">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-paper-plane" aria-hidden="true"></i>   Promotion</h3>
                            </div>
                            <div class="panel-body panel_promo">
								<div class="panel panel_orange col-lg-5 pad_out left_promo">
									<div class="panel-heading">
										<div class="row">
											<div class="col-xs-3">
												<i class="fa fa-comments fa-5x"></i>
											</div>
											<div class="col-xs-9 text-right">
												
												<div class="sms-send">Send Sms</div>
											</div>
										</div>
									</div>
                            <a href="<?php echo base_url();?>dashboard/sms">
                                <div class="panel-footer promo_panel">
                                    <span class="pull-left">Click Here</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
							</div>
							<div class="panel promo_green col-lg-5 pad_out left_promo">
									<div class="panel-heading">
										<div class="row">
											<div class="col-xs-3">
												<i class="fa fa-envelope fa-5x"></i>
											</div>
											<div class="col-xs-9 text-right">
												
												<div class="sms-send">Send Email</div>
											</div>
										</div>
									</div>
                            <a href="">
                                <div class="panel-footer promo_panel_second">
                                    <span class="pull-left">Click Here</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
							</div>
						</div>
						
                        </div>
                    <div id="page">
                   <?php if(!empty($userid)): echo $pagination; endif;?></div>
                    </div>
                    
                </div>
                <!-- /.row -->
				