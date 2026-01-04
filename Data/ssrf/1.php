<?php
include "../navigation.php";
?>
<style>
    .content-container01 {
    position: relative;
    width: 95%;
    min-height: 80vh;
    background: white;
    margin: 20px auto;
    border-radius: var(--border-radius);
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    padding: 30px;
    box-sizing: border-box;
}


</style>
<div class='content-container01'>
          <?php
               $curl=curl_init();
                curl_setopt($curl, CURLOPT_URL, $_GET['url']);
                 $data = curl_exec($curl);
                 curl_close($curl);
                  print_r($data);
          ?>
</div>