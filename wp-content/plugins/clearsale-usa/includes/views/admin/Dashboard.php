<?php

include_once ABSPATH.'wp-content/plugins/clearsale-usa/libs/Auth/Business/Object.php';
require_once ABSPATH.'wp-content/plugins/clearsale-usa/libs/clearsale_helper.php';

$helper = new Clearsale_Helper();

if($helper->environment == 'test')
    $environment = Clearsale_Helper::CONFIG_ENVIRONMENT_SANDBOX;
else
    $environment = Clearsale_Helper::CONFIG_ENVIRONMENT_PRODUCTION;

$authBO =  new  Clearsale_Total_Model_Auth_Business_Object();
$authResponse = $authBO->login($environment);
$token = "";

if($authResponse)
{
$token = $authResponse->Token->Value;
}
$interval = "1";
$script = "<script> \n";
$script .= "var apiKey = \"".$helper->api_key."\"; \n";
$script .= "var loginToken = \"".$token."\"; \n";
$script .= "var user = \"".$helper->client_id."\"; \n";
$script .= "var password = \"".$helper->client_secret."\"; \n";
$script .= "var interval = ".$interval."; \n";
$script .= "var prefix = \"".$environment."\"; \n";
$script .= "</script>";

echo $script;

?>
<div class="container">
         <div class="block-header">
             <h2>Dashboard</h2>
             <ul class="actions">
                 <li class="width: 200px">
                     <i class="md md-event"></i>TIME VIEW
                 </li>
                 <li>
                     <select id="ReportFilter">
                         <option value="1">Today</option>
                         <option value="2">Last Week</option>
                         <option value="3">Last Month</option>
                         <option value="4">Last Year</option>
                     </select>
                     <i class=\"md md-signal-cellular-4-bar\"></i>
                 </li>
             </ul>
         </div>
         <div class="mini-charts">
             <div class="row">
                 <div class="col-sm-6 col-md-4">
                     <div class="mini-charts-item bgm-orange">
                         <div class="clearfix">
                             <div class="chart"><i class="md md-vertical-align-bottom"></i></div>
                             <div class="count">
                                 <small>SUBMITTED</small>
                                 <h2 id="Submited">Loading...</h2>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-sm-6 col-md-4">
                     <div class="mini-charts-item bgm-lightgreen">
                         <div class="clearfix">
                             <div class="chart"><i class="md md-done-all"></i></div>
                             <div class="count">
                                 <small>APPROVAL RATE</small>
                                 <h2 id="ApprovalRate">Loading...</h2>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-sm-6 col-md-4">
                     <div class="mini-charts-item bgm-cyan">
                         <div class="clearfix">
                             <div class="chart"><i class="md md-multitrack-audio"></i></div>
                             <div class="count">
                                 <small>IN ANALYSIS</small>
                                 <h2 id="InAnlaysis">Loading...</h2>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="dash-widgets">
             <div class="row">
                 <div class="col-md-3 col-sm-6">
                     <div class="card">
                         <div class="card-header">
                             <h2>Approval</h2>
                         </div>
                         <div class="card-body card-padding">
                             <div id="approval-chart" class="flot-chart-pie"></div>
                             <div class="flc-donut"></div>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-3 col-sm-6">
                     <div class="card">
                         <div class="card-header">
                             <h2>Decline</h2>
                         </div>
                         <div class="card-body card-padding">
                             <div id="decline-chart" class="flot-chart-pie"></div>
                             <div class="flc-donut"></div>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-6 col-sm-12">
                     <div class="card">
                         <div class="card-header">
                             <h2>SLA Description</h2>
                         </div>

                         <div class="card-body card-padding-sm">
                             <div id="description-chart" class="flot-chart"></div>
                             <div class="flc-bar"></div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="row bgm-white" style="margin:0 0px 50px 0">
             <div class="col-xs-12 col-md-3 col-sm-3">
                 <div class="card-header">
                     <h2>Last actions</h2>
                 </div>
                 <div style="padding: 10px">
                     <div class="col-xs-6 col-md-6 col-sm-6" style="padding:0">
                         <div class="f-500 c-green">APPROVED</div>
                         <div id="lastOrderApproved" class="c-green numbers">#</div>
                         <div class="f-500 c-brown">DECLINED</div>
                         <div id="lastOrderDeclined" class=" c-brown numbers">#</div>
                     </div>
                     <div class="col-xs-6 col-md-6 col-sm-6" style="padding:0">
                         <div class="f-500 c-cyan">ANALYSING</div>
                         <div id="lastOrderAnalysing" class="c-cyan numbers">#</div>
                         <div class="f-500 c-red">CANCELED</div>
                         <div id="lastOrderCanceled" class="c-red numbers">#</div>
                     </div>
                 </div>
             </div>
             <div id="lastorders" class="col-xs-12 col-md-9 col-sm-9" style="padding:0">
             </div>
         </div>
         <div class="row">
             <div class="col-md-12">
              <div class="card">
                     <div class="card-header">
                         <h2>submit total and approvals (US$)</h2>
                     </div>
                     <div class="card-body">
                         <div class="chart-edge">
                             <div id="curved-line-chart" class="flot-chart"></div>
                             <div class="flc-chart-edge"></div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
<script src='<?php echo plugins_url('Js/Graphs/graph-data.js', __FILE__); ?>' ></script>