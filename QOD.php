<?php
/*
Plugin Name: QOD
Plugin URI:
Description: 
Version: 1.0
Author: Anuj Rajak
Author URI: http://anujrajak.cf
License:
*/

// here start the code to get QOD from rest api
$service_url = 'http://quotes.rest/qod.json';
      $curl = curl_init($service_url);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_POST, false);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
      $curl_response = curl_exec($curl);
      curl_close($curl);
      $json_objekat=json_decode($curl_response);

function my_error_notice() {
    global $boom;
	global $json_objekat;
?>
    <div class="notice notice-success is-dismissible">
        <p><?php printf( esc_html__( '%s', 'my-plugin-textdomain' ),  $json_objekat->contents->quotes[0]->quote ); ?></p>
    </div>
<?php
}
add_action( 'admin_notices', 'my_error_notice' );
?>
