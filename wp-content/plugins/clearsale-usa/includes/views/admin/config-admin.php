<?php
	settings_fields('clearsale-usa-settings');
	do_settings_sections('clearsale-usa-settings');
	$img = plugins_url('clearsale-usa/assets/images/clearsale_wp.png');

	if (isset($_POST['save'])) {
		$api_key = isset($_POST['api_key']) ? $_POST['api_key'] : '';
		$client_id = isset($_POST['client_id']) ? $_POST['client_id'] : '';
		$client_secret = isset($_POST['client_secret']) ? $_POST['client_secret'] : '';
		$methods  = isset( $_POST['methods'] )? $_POST['methods'] : '';
		$consult_freq = isset($_POST['consult_freq']) ? $_POST['consult_freq'] : '';
		$environment = isset($_POST['environment']) ? $_POST['environment'] : '';
		$passivemode = isset($_POST['passivemode']) && $_POST['passivemode'] == 'yes' ? true : false;
		$analysing_clearsale = isset($_POST['analysing_clearsale']) ? $_POST['analysing_clearsale'] : get_option('wc_clearsale_usa_analysing_clearsale');
		$approved_clearsale = isset($_POST['approved_clearsale']) ? $_POST['approved_clearsale'] : get_option('wc_clearsale_usa_approved_clearsale');
		$reproved_clearsale = isset($_POST['reproved_clearsale']) ? $_POST['reproved_clearsale'] : get_option('wc_clearsale_usa_reproved_clearsale');
		
		update_option('wc_clearsale_usa_api_key', $api_key);
		update_option('wc_clearsale_usa_client_id', $client_id);
		update_option('wc_clearsale_usa_client_secret', $client_secret);
		update_option('wc_clearsale_usa_app_id', substr($client_id, 0, 10));
		update_option('wc_clearsale_usa_methods', $methods);
		update_option('wc_clearsale_usa_consult_freq', $consult_freq);
		update_option('wc_clearsale_usa_environment', $environment);
		update_option('wc_clearsale_usa_debug', true);
		update_option('wc_clearsale_usa_passivemode', $passivemode);
		update_option('wc_clearsale_usa_analysing_clearsale', $analysing_clearsale);
		update_option('wc_clearsale_usa_approved_clearsale', $approved_clearsale);
		update_option('wc_clearsale_usa_reproved_clearsale', $reproved_clearsale);

		wp_clear_scheduled_hook('clearsale_cron');

		wp_schedule_event(time(), $consult_freq, 'clearsale_cron');
	}
	
	$gates = WC()->payment_gateways->payment_gateways();
	
	$statuses = wc_get_order_statuses();
	
	function GetWooStatusOrDefault($key) {
		if(in_array(get_option($key), array_keys(wc_get_order_statuses()), true)) {
			return get_option($key);
		}
		else {
			if($key == 'wc_clearsale_usa_analysing_clearsale') {
				return 'wc-on-hold';
			}
			elseif($key == 'wc_clearsale_usa_approved_clearsale') {
				return 'wc-approved-cs';
			}
			elseif($key == 'wc_clearsale_usa_reproved_clearsale'){
				return 'wc-failed';
			}
			else {
				return '';
			}
		}
	}
?>
<script src="<?php echo plugins_url('Js/noconflict.js', __FILE__); ?>"  type='text/javascript' /></script>
<script src="<?php echo plugins_url('Js/bootstrap.min.js', __FILE__); ?>"  type='text/javascript' /></script>
<script src="<?php echo plugins_url('Js/formats.js', __FILE__); ?>"  type='text/javascript' /></script>
<script src="<?php echo plugins_url('Js/timeago.js', __FILE__); ?>"  type='text/javascript' /></script>
<script src="<?php echo plugins_url('Js/Plugin/morris.min.js', __FILE__); ?>"  type='text/javascript' /></script>
<script src="<?php echo plugins_url('Js/Plugin/raphael.min.js', __FILE__); ?>"  type='text/javascript' /></script>
<link   href="<?php echo plugins_url('Css/bootstrap.min.css', __FILE__); ?>" rel="stylesheet" />
<link   href="<?php echo plugins_url('Css/dashboard.css', __FILE__); ?>" rel="stylesheet" />
<link   href="<?php echo plugins_url('Css/app.css', __FILE__); ?>" rel="stylesheet" />
<link   href="<?php echo plugins_url('Css/material-design-iconic-font.min.css', __FILE__); ?>" rel="stylesheet" />
<style>
    #head{
        margin-top: 25px;
        margin-bottom: 25px;
    }
    #head img{
        float: left;
        margin-right: 10px;
    }
    .original{
        border-collapse: inherit !important;
        border-spacing: 5px !important;
    }
</style>
<div id="head">
    <img src="<?php echo $img ?>"><h2><?php _e('ClearSale Options', 'clearsale-usa'); ?></h2>
</div>
<?php
    $api = get_option('wc_clearsale_usa_api_key');
    $c_id = get_option('wc_clearsale_usa_client_id');
    $c_sec = get_option('wc_clearsale_usa_client_secret');
    $app_id = get_option('wc_clearsale_usa_app_id');

    if( empty($api) || empty($c_id) || empty($c_sec) )
        $config = true;
    else
        $config = false;
?>
<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" <?php if($config){ ?>class="active"<?php } ?>><a href="#config" aria-controls="config" role="tab" data-toggle="tab"><?php _e('Settings', 'clearsale-usa'); ?></a></li>
    <li role="presentation" <?php if(!$config){ ?>class="active"<?php } ?>><a href="#dashboard" aria-controls="dashboard" role="tab" data-toggle="tab"><?php _e('Dashboard', 'clearsale-usa'); ?></a></li>
  </ul>

  <div class="tab-content">
      <div role="tabpanel" class="tab-pane <?php if($config){ ?>active<?php } ?>" id="config">
          <form method="post" action="">
              <table class="original">
                 <tr>
                     <td><label for="api_key" style="font-weight:bold"><?php _e('API Key', 'clearsale-usa')?></label></td>
                     <td><input type="text" value="<?php echo esc_attr( get_option('wc_clearsale_usa_api_key') ); ?>" name="api_key" id="api_key" placeholder="Insert the Api Key" style="width:295px;"/></td>
                 </tr>
                 <tr>
                     <td><label for="client_id" style="font-weight:bold"><?php _e('Client ID', 'clearsale-usa')?></label></td>
                     <td><input type="text" value="<?php echo esc_attr( get_option('wc_clearsale_usa_client_id') ); ?>" name="client_id" id="client_id" placeholder="Insert the Client ID" style="width:295px;"/></td>
                 </tr>
                 <tr>
                     <td><label for="client_secret" style="font-weight:bold"><?php _e('Client Secret', 'clearsale-usa')?></label></td>
                     <td><input type="text" value="<?php echo esc_attr( get_option('wc_clearsale_usa_client_secret') ); ?>" name="client_secret" id="client_secret" placeholder="Insert the Client Secret" style="width:295px;"/></td>
                 </tr>
                 <tr>
                     <td><br/></td>
                 </tr>
                 <tr>
                     <td style="vertical-align: top;"><label for="methods" style="font-weight:bold"><?php _e('Methods that will consult', 'clearsale-usa')?></label></td>
                     <td>
                          <?php foreach ($gates as $g) { ?>
                          <input type="checkbox" name="methods[]" value="<?php echo $g->id; ?>" <?php if(get_option('wc_clearsale_usa_methods') && in_array($g->id, get_option('wc_clearsale_usa_methods'))) echo 'checked' ?>/> <?php echo $g->method_title; ?><br/>
                          <?php } ?>
                     </td>
                 </tr>
                 <tr>
                     <td><br/></td>
                 </tr>
                 <tr>
                     <td style="vertical-align: top;"><label for="analysing_clearsale" style="font-weight:bold"><?php _e('Analysing ClearSale', 'clearsale-usa')?></label></td>
                     <td>
						 <select id="analysing_clearsale" name="analysing_clearsale">
							<?php foreach ($statuses as $status) { ?>
								<option value="<?php echo array_search($status, $statuses); ?>" <?php echo (GetWooStatusOrDefault('wc_clearsale_usa_analysing_clearsale') == array_search($status, $statuses) ? 'selected': '') ?>><?php echo $status; ?></option>
							<?php } ?>
						 </select>
                     </td>
                 </tr>
                 <tr>
                     <td></td>
                 </tr>
                 <tr>
                     <td style="vertical-align: top;"><label for="approved_clearsale" style="font-weight:bold"><?php _e('Approved ClearSale', 'clearsale-usa')?></label></td>
                     <td>
						 <select id="approved_clearsale" name="approved_clearsale">
							<?php foreach ($statuses as $status) { ?>
								<option value="<?php echo array_search($status, $statuses); ?>" <?php echo (GetWooStatusOrDefault('wc_clearsale_usa_approved_clearsale') == array_search($status, $statuses) ? 'selected': '') ?>><?php echo $status; ?></option>
							<?php } ?>
						 </select>
                     </td>
                 </tr>
                 <tr>
                     <td></td>
                 </tr>
                 <tr>
                     <td style="vertical-align: top;"><label for="reproved_clearsale" style="font-weight:bold"><?php _e('Reproved ClearSale', 'clearsale-usa')?></label></td>
                     <td>
						 <select id="reproved_clearsale" name="reproved_clearsale">
							<?php foreach ($statuses as $status) { ?>
								<option value="<?php echo array_search($status, $statuses); ?>" <?php echo (GetWooStatusOrDefault('wc_clearsale_usa_reproved_clearsale') == array_search($status, $statuses) ? 'selected': '') ?>><?php echo $status; ?></option>
							<?php } ?>
						 </select>
                     </td>
                 </tr>
                 <tr>
                     <td><br/></td>
                 </tr>
                 <tr>
                     <td><label for="environment" style="font-weight:bold"><?php _e('Environment', 'clearsale-usa')?></label></td>
                     <td>
                         <input type="radio" name="environment" id="env_test" value="test" <?php echo (get_option('wc_clearsale_usa_environment') == 'test' ? 'checked': '')  ?>/> <?php _e('Test', 'clearsale-usa'); ?>
                         <br/>
                         <input type="radio" name="environment" id="env_prod" value="production" <?php echo (get_option('wc_clearsale_usa_environment') == 'production' ? 'checked': '')  ?>/> <?php _e('Production', 'clearsale-usa'); ?>
                     </td>
                 </tr>
                 <tr>
                     <td></td>
                 </tr>
                 <tr>
                     <td><label for="passivemode" style="font-weight:bold"><?php _e('Passive Mode', 'clearsale-usa')?></label></td>
                     <td><input type="checkbox" name="passivemode" id="passivemode" value="yes" <?php echo (get_option('wc_clearsale_usa_passivemode')? 'checked': '')  ?>/> <?php _e('Enabled', 'clearsale-usa'); ?></td>
                 </tr>
                 <tr>
                     <td></td>
                 </tr>
             </table>
             <br>
             <input name="save" class="button-primary" type="submit" value="<?php _e('Save Changes', 'clearsale-usa') ?>">
          </form>
      </div>
      <div role="tabpanel" class="tab-pane <?php if(!$config){ ?>active<?php } ?>" id="dashboard">
          <?php include_once 'Dashboard.php'; ?>
      </div>
  </div>