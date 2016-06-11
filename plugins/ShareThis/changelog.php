<?php

$lines = file('changelog.txt');
$show = FALSE;
$first = TRUE;

echo '<div class="changelog">';

foreach ($lines as $line_num => $line):
  if (trim($line)):
    if ($show):
      if (substr( $line, 0, 7 ) === "version"):
        if ($first):
          $first = FALSE;
        else:
          echo "</ul>";
        endif;
        echo "<h3>" . htmlspecialchars(str_replace("version ", "", $line)) . "</h3>\n<ul>";
      else:
        echo "<li>" . htmlspecialchars($line) . "</li>\n";
      endif;
    elseif (trim($line) == "=== Changelog ==="):
      $show = TRUE;
    endif;
  endif;
endforeach;
echo "</ul></div>";
