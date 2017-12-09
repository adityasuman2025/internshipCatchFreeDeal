<?php
session_start();
require_once __DIR__ . '/src/Facebook/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '240540669813559',
  'app_secret' => '5f373a4ac7c5471edff095f8ab1fc5e6',
  'default_graph_version' => 'v2.11'
]);

$helper = $fb->getJavaScriptHelper();

try {
  $accessToken = $helper->getAccessToken();
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
} catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
}

if (isset($accessToken)) {
   $fb->setDefaultAccessToken($accessToken);

  try {
  
    $requestProfile = $fb->get("/me?fields=name,email");
    $profile = $requestProfile->getGraphNode()->asArray();
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
  } catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
  }

  //$_SESSION['name'] = $profile['name'];

  //registering the user from fb into database

    include('../php/connect_db.php');

    $name_reg = $profile['name'];
    $mob_reg = "0";
    $email_reg =  $profile['email'];
    $pass_reg =  "0";
    
    include ('../php/reg_fb.php');

  header('location: ../');
  exit;
} else {
    echo "Unauthorized access!!!";
    exit;
}
