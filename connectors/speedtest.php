<?php
  // Interpret the speedtest cache log to output on NEMS TV Dashboard
  // Requires NEMS Linux 1.6+
  if (file_exists('/var/log/nems/speedtest.log')) {
    $speedtest = file('/var/log/nems/speedtest.log');
  }
  if (is_array($speedtest)) {
    if ($speedtest[0] == 0) { // OK
      $color = '#8bff6e';
    } elseif ($speedtest[0] == 1) { // WARN
      $color = '#ffa100';
    } elseif ($speedtest[0] == 2) { // CRIT
      $color = '#ff686b';
    }
    echo '<b style="color:#fff;">Internet Status:</b><br /><span style="color:' . $color . '">Ping:' . $speedtest[1] . $speedtest[2] . ' Down: ' . $speedtest[3] . $speedtest[4] . ' Up: ' . $speedtest[5] . $speedtest[6] . '</span>';
  }
?>
