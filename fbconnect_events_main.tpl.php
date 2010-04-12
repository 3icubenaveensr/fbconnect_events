<div id="fbconnect">

  <?php if ($fbc_status == FBC_EVENTS_USER_NO_FB || $fbc_status == FBC_EVENTS_NO_LOGIN): ?>
    <div class="fb_no_pics"></div>
  <?php else: ?>
    <?php if ($members): ?>
      <div class="profile_pics">
        <?php foreach ($members as $uid): ?>
          <fb:profile-pic size="square" uid="<? echo $uid; ?>" facebook-logo="false" linked="true"></fb:profile-pic>
        <?php endforeach; ?>
        <span class="fb_see_all_button"><a href="http://www.connect.facebook.com/event.php?eid=<?php echo $event_id; ?>&amp;locale=en_US"><?php print t('See All') ?></a></span>
      </div>
    <?php endif; ?>
  <?php endif; ?>
  
  <?php if ($fbc_status > FBC_EVENTS_USER_NO_FB): ?>
  <div class="event_title"><fb:eventlink eid="<?php echo $event_id; ?>"></fb:eventlink></div>
  <?php endif; ?>
 
  <?php if ($fbc_status == FBC_EVENTS_FULL_CONNECT): ?>
	 <h2 class="status"><?php print ($event_status ? t('Current status: @status', array('@status' => $event_status)) : t('Are you going?'));?></h2>
    <?php if ($perm_status): ?>
      <?php print $event_form; ?>
    <?php else: ?>
      <div class="permission"><a href="#" onclick="FB.Connect.showPermissionDialog('rsvp_event', function(perms){window.location.reload()}); return false;"><?php print $signup_text; ?></a></div>
      <div class="fb_description"><?php print t('The site needs permission to talk to your Facebook, is this OK? If yes, please press the button.'); ?></div>
    <?php endif; ?>
  <?php else: ?>
    <h2 class="action"><?php print t('Are you going?'); ?></h2>
    <fb:login-button onlogin="facebook_onlogin_ready();" size="medium" background="dark" length="long"></fb:login-button>
    <div class="fb_description"><?php print t('Connect with Facebook to find out who\'s going and RSVP!') ?></div>
  <?php endif; ?>
</div>
        
        
        