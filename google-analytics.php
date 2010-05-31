<?php
function google_analytics() {
  if ( is_user_logged_in() ) {
    ?>
    <!--User is logged in, so this request will NOT be tracked by Google Analytics-->
    <?php
  } else {
    global $Panel;
    $GAEnabled = $Panel->Settings('GoogleAnalyticsEnabled');
    $GAID = $Panel->Settings('GoogleAnalyticsID');
    if ($GAEnabled == 'true') {
      if ($GAID != NULL) { ?>
      <!--Begin Google Analytics tracking script-->
      <script type="text/javascript">
        var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
        document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
      </script>
      <script type="text/javascript">
        try {
          var pageTracker = _gat._getTracker("<?php echo $GAID; ?>");
          pageTracker._trackPageview();
        } catch(err) {}
      </script>
      <!--End Google Analytics tracking script-->
      <?php } else {
        ?>
        <!--No user is logged in and Google Analytics is enabled, but there is not Google Analytics ID filled in-->
        <?php
      }
    } else {
      ?>
      <!--No user is logged in and Google Analytics is disabled-->
      <?php
    }
  } 
}

function async_google_analytics() {
  if ( is_user_logged_in() ) {
    ?>
    <!--User is logged in, so this request will NOT be tracked by Google Asynchronous Analytics-->
    <?php
  } else {
    global $Panel;
    $GAEnabled = $Panel->Settings('GoogleAnalyticsEnabled');
    $GAID = $Panel->Settings('GoogleAnalyticsID');
    if ($GAEnabled == 'true') {
      if ($GAID != NULL) { ?>
      <!--Begin Google Asynchronous Analytics tracking script-->
      <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', '<?php echo $GAID; ?>']);
        _gaq.push(['_trackPageview']);

        (function() {
          var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
          ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
          (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ga);
        })();
        }
      </script>
      <!--End Google Asynchronous Analytics tracking script-->
      <?php } else {
        ?>
        <!--No user is logged in and Google Asynchronous Analytics is enabled, but there is not Google Analytics ID filled in-->
        <?php
      }
    } else {
      ?>
      <!--No user is logged in and Google Asynchronous Analytics is disabled-->
      <?php
    }
  }
}
?>
