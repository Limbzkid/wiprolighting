<!-- Start lighBox -->
<?php global $user; ?>
<style>
.dnone {display:none;}
</style>
<?php if (!$user->uid): ?>
  <div class="lightboxWrp">
    <div class="popXbtn"><a href="javascript:;" class=""></a></div>
    <div class="loginPop">
      <div class="headBar">
        <h2>Login / <span class="semiBold">Register</span></h2>
      </div>
      <div class="popArea">
        <div class="lgtBox">
          <h3>Register to <span class="semiBold">stay Updated With</span></h3>
          <ul class="list">
            <li>The latest product launches </li>
            <li>What's happening at Wipro Lighting </li>
            <li>The latest company news</li>
          </ul>
          <a class="arrowLink" href="<?php echo base_path(); ?>user/register">Register Now <span class="arrowIco"></span></a> </div>
        <div class="rgtBox">
          <h3>Already <span class="semiBold">Registered?</span></h3>
          <div class="row">
            <div class="dnone"><?php print(drupal_render(drupal_get_form('user_login_block'))); ?></div>
            
            <div class="col2">
              <div class="fields">
                <label>Enter Email id*</label>
                <input type="text" id="userLoginName" autocomplete="false">
              </div>
            </div>
            <div class="col2">
              <div class="fields">
                <label>Enter Password*</label>
                <input type="password" id="userLoginPass" autocomplete="false">
              </div>
            </div>
          </div>
          <div class="row">
            <a href="javascript:;" class="arrowLink formBtn userLogin">Login <span class="arrowIco"></span></a>
            <a class="arrowLink fpbt" href="<?php echo base_path(); ?>user/password">Forgot Password?<span class="arrowIco"></span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<!-- End lighBox 





