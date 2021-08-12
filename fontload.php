 <style>
    <?php
    $fonts = [
      'Palette+Mosaic' => 'Palette Mosaic Fonte Bonita',
      'STIX+Two+Text' => 'STIX Two Text',
      'Roboto+Mono' => 'Roboto',
      'MonteCarlo' => 'MonteCarlo',
      'Lato' => 'Lato'  
    ];

    $fontsToUrl = '';
    foreach ($fonts as $key => $name) {
      $fontsToUrl .= "family=$key&";
    }
    
    ?>
    @import url('https://fonts.googleapis.com/css2?<?php echo $fontsToUrl ?>&display=swap');
  </style>
 


