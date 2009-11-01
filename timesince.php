<?php

/*
Matt Rude <matt@mattrude.com> - 1 Nov 2009
This shortcode displays the years since the date provided.
To use this shortcode, add some text to a post or page simmiler to:

    [ts date='1983-09-02']

The date format is YYYY-MM-DD
*/

function mdr_timesince($atts, $content = null) {
  extract(shortcode_atts(array("date" => ''), $atts));
  if(empty($date)) {
    return "<br /><br />************No date provided************<br /><br />";
  }
  $mdr_unix_date = strtotime($date);
  $mdr_time_difference = time() - $mdr_unix_date ;
  $years = round($mdr_time_difference / 29030400 );
  $num_years_since = $years;
  return $num_years_since;
}

add_shortcode('ts', 'mdr_timesince');

?>
