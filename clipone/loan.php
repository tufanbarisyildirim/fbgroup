<!DOCTYPE html>
<!-- Template Name: Clip-One - Responsive Admin Template build with Twitter Bootstrap 3 Version: 1.0 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
    <!--<![endif]-->
    <!-- start: HEAD -->
    <head>
        <title>Realtime Loan Calculator</title>
        <!-- start: META -->
        <meta charset="utf-8" />
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- end: META -->
        <!-- start: MAIN CSS -->
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/fonts/style.css">
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="assets/css/main-responsive.css">
        <link rel="stylesheet" href="assets/plugins/iCheck/skins/all.css">
        <link rel="stylesheet" href="assets/plugins/perfect-scrollbar/src/perfect-scrollbar.css">
        <link rel="stylesheet" href="assets/css/theme_light.css" id="skin_color">
        <!--[if IE 7]>
        <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome-ie7.min.css">
        <![endif]-->
        <!-- end: MAIN CSS -->
        <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
        <link rel="stylesheet" href="assets/plugins/select2/select2.css">
        <link rel="stylesheet" href="assets/plugins/datepicker/css/datepicker.css">
        <link rel="stylesheet" href="assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
        <link rel="stylesheet" href="assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css">
        <link rel="stylesheet" href="assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css">
        <link rel="stylesheet" href="assets/plugins/jQuery-Tags-Input/jquery.tagsinput.css">
        <link rel="stylesheet" href="assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css">
        <link rel="stylesheet" href="assets/plugins/summernote/build/summernote.css">
        <link rel="stylesheet" href="assets/plugins/ckeditor/contents.css">
        <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
        <link rel="shortcut icon" href="favicon.ico" />
    </head>
    <!-- end: HEAD -->
    <!-- start: BODY -->
    <body>
        <!-- start: HEADER -->
        <div class="navbar navbar-inverse navbar-fixed-top">
            <!-- start: TOP NAVIGATION CONTAINER -->
            <div class="container">
                <div class="navbar-header">
                    <!-- start: RESPONSIVE MENU TOGGLER -->
                    <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                        <span class="clip-list-2"></span>
                    </button>
                    <!-- end: RESPONSIVE MENU TOGGLER -->
                    <!-- start: LOGO -->
                    <a class="navbar-brand" href="index.html">
                        LOAN<i class="clip-clip"></i>CALCULATOR
                    </a>
                    <!-- end: LOGO -->
                </div>
            </div>
            <!-- end: TOP NAVIGATION CONTAINER -->
        </div>
        <!-- end: HEADER -->
        <!-- start: MAIN CONTAINER -->
        <div class="main-container">
            <div class="container">
                <div class="row col-sm-12">
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="icon-external-link-sign"></i>
                                Loan Calculator
                                <div class="panel-tools">
                                    <a class="btn btn-xs btn-link panel-refresh tooltips" href="#">
                                        <i class="icon-refresh"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <form role="form" class="form-horizontal" id="loanform">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="form-field-1">
                                            Loan Purpose
                                        </label>
                                        <div class="col-sm-8">
                                            <select id="13" name="x13" class="form-control input-sm input-sm">
                                                <option value=""></option>
                                                <option value="1" selected="selected">Purchase</option>
                                                <option value="2">Cashout Refi</option>
                                                <option value="3">Rate / Term Refi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="form-field-2">
                                            Cashout Amount
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="text" placeholder="Loan Amount" id="13a" name="13a" class="form-control input-sm">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="form-field-2">
                                            Loan Amount
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="text" placeholder="Loan Amount" id="16" name="16" class="form-control input-sm">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="form-field-3">
                                            Property Value
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="text" id="17" name="17" class="form-control input-sm">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="form-field-4">
                                            Property Type
                                        </label>
                                        <div class="col-sm-8">
                                            <select id="18" name="18" class="form-control input-sm">
                                                <option value=""></option>
                                                <option value="1">Single Family Attached</option>
                                                <option value="2" selected="selected">Single Family Detached</option>
                                                <option value="3">2 Unit</option>
                                                <option value="4">3 Unit</option>
                                                <option value="5">4 Unit</option>
                                                <option value="6">Manufactured - Single Wide</option>
                                                <option value="7">Manufactured - Double Wide</option>
                                                <option value="8">Coop Low Rise (1-4 Stories)</option>
                                                <option value="9">Coop Mid Rise (5-8 Stories)</option>
                                                <option value="10">Coop High Rise (9  Stories)</option>
                                                <option value="11">Townhouse</option>
                                                <option value="12">Mixed Use</option>
                                                <option value="13">Condo Low Rise (1-4 Stories)</option>
                                                <option value="14">Condo Mid Rise (5-8 Stories)</option>
                                                <option value="17">Condo NonWarrantable 1-4 Stories</option>
                                                <option value="18">Planned Unit Development (PUD)</option>
                                                <option value="19">Condo High Rise (9  Stories)</option>
                                                <option value="20">Condo NonWarrantable 5-8 Stories</option>
                                                <option value="21">Condo NonWarrantable 9  Stories</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="form-field-5">
                                            Occupancy
                                        </label>
                                        <div class="col-sm-8">
                                            <select id="19" name="19" class="form-control input-sm">
                                                <option value=""></option>
                                                <option value="1" selected="selected">Owner Occupied</option>
                                                <option value="2">Second Home</option>
                                                <option value="3">Investment</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="form-field-6">
                                            Zip Code
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="text" placeholder="Zip Code" id="14" name="14" class="form-control input-sm">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="form-field-7">
                                            Lock Days
                                        </label>
                                        <div class="col-sm-7">
                                            <select id="21" name="21" class="form-control input-sm">
                                                <option value=""></option>
                                                <option value="15">15 Day</option>
                                                <option value="30" selected="selected">30 Day</option>
                                                <option value="45">45 Day</option>
                                                <option value="60">60 Day</option>
                                                <option value="90">90 Day</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="form-field-8">
                                            Owned Properties
                                        </label>
                                        <div class="col-sm-8">
                                            <span class="input-help">
                                                <input id="form-field-8" id="25" name="25" class="form-control input-sm tooltips" type="text" data-placement="top" title="" placeholder="Tooltip on hover" data-rel="tooltip" data-original-title="Hello Tooltip!">
                                            <i class="help-button popovers" title="" data-content="More details." data-placement="right" data-trigger="hover" data-rel="popover" data-original-title="Popover on hover"></i> </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            Credit Score
                                        </label>
                                        <div class="col-sm-8">
                                            <select id="15" name="15" class="form-control input-sm">
                                                <option value=""></option>
                                                <option value="800" selected="selected">800-850 Excellent</option>
                                                <option value="780">780-799 Excellent</option>
                                                <option value="760">760-779 Very Good</option>
                                                <option value="740">740-759 Very Good</option>
                                                <option value="720">720-739 Good</option>
                                                <option value="700">700-719 Good</option>
                                                <option value="680">680-699 Fair</option>
                                                <option value="660">660-679 Fair</option>
                                                <option value="640">640-659 Poor</option>
                                                <option value="620">620-639 Poor</option>
                                                <option value="600">600-619 Very Poor</option>
                                                <option value="580">580-599 Very Poor</option>
                                                <option value="560">300-579 Bad</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="form-field-12">
                                            Interset Only
                                        </label>
                                        <div class="col-sm-8">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="29" name="29" value="" class="red">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="form-field-13">
                                            Email
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="text"  placeholder="Email" id="4" name="4" class="form-control input-sm input-sm">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            First Name
                                        </label>
                                        <div class="col-sm-8">   
                                            <input type="text" placeholder="First Name" id="2" name="2" class="form-control input-sm">
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            Last Name
                                        </label>
                                        <div class="col-sm-8">

                                            <input type="text" placeholder="Last Name" id="3" name="3" class="form-control input-sm">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="form-field-20">
                                            Home Phone
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="text" placeholder="Text Field" id="10" name="10" class="form-control input-sm limited" maxlength="40">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <a href="javascript:;" class="btn btn-block btn-warning" onclick="ConsumerPortalObject.post($('#loanform').serialize());">Real-Time Quote</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="icon-external-link-sign"></i>
                                Result

                            </div>
                            <div class="panel-body">
                                 <iframe width="100%" height="600" scrolling="no" style="border:0px" src="loan.html" id="rtframe"></iframe>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end: MAIN CONTAINER -->
        <!-- start: FOOTER -->
        <div class="footer clearfix">
            <div class="footer-inner">
                2013 &copy; 
            </div>
            <div class="footer-items">
                <span class="go-top"><i class="clip-chevron-up"></i></span>
            </div>
        </div>
        <!-- end: FOOTER -->
        <!-- start: MAIN JAVASCRIPTS -->
        <!--[if lt IE 9]>
        <script src="assets/plugins/respond.min.js"></script>
        <script src="assets/plugins/excanvas.min.js"></script>
        <![endif]-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/blockUI/jquery.blockUI.js"></script>
        <script src="assets/plugins/iCheck/jquery.icheck.min.js"></script>
        <script src="assets/plugins/perfect-scrollbar/src/jquery.mousewheel.js"></script>
        <script src="assets/plugins/perfect-scrollbar/src/perfect-scrollbar.js"></script>
        <script src="assets/js/main.js"></script>
        <!-- end: MAIN JAVASCRIPTS -->
        <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script src="assets/plugins/jquery-inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
        <script src="assets/plugins/autosize/jquery.autosize.min.js"></script>
        <script src="assets/plugins/select2/select2.min.js"></script>
        <script src="assets/plugins/jquery.maskedinput/src/jquery.maskedinput.js"></script>
        <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
        <script src="assets/plugins/bootstrap-daterangepicker/moment.min.js"></script>
        <script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
        <script src="assets/plugins/bootstrap-colorpicker/js/commits.js"></script>
        <script src="assets/plugins/jQuery-Tags-Input/jquery.tagsinput.js"></script>
        <script src="assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
        <script src="assets/plugins/summernote/build/summernote.min.js"></script>
        <script src="assets/plugins/ckeditor/ckeditor.js"></script>
        <script src="assets/plugins/ckeditor/adapters/jquery.js"></script>
        <script src="assets/js/form-elements.js"></script>
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script>
            jQuery(document).ready(function() {
                Main.init();
                FormElements.init();

            });

            var ConsumerPortalObject={
                'iframe':document.getElementById('rtframe'),
                'src':('http://www.loansifter.com/consumerportal.aspx?uid=16801&'+top.location.search.substr(1)).replace(/&+$/ig,''),
                'parentURL':escape(top.location),
                'post':function(x){
                    if(!x.match(/^\w+=\w+/ig));
                    var i=ConsumerPortalObject.src.indexOf('&');
                    ConsumerPortalObject.iframe.src=(i<0?ConsumerPortalObject.src:ConsumerPortalObject.src.substr(0,i))+'&'+x.replace(/^&+| +|post=[a-z0-9]+/ig,'').match(new RegExp('\\b\\w+=[^&]+\\b','ig')).join('&')+'&post=1&sec='+(new Date()).getSeconds()+'#'+ConsumerPortalObject.parentURL;
                }
            };

        </script>
    </body>
    <!-- end: BODY -->
</html>