<?php /**
 * Template Name: Login
 */


get_header() ?>

<div class="container login">
    <div class="row">
        <div class="col-12">
            <p class="login_title">LOGIN</p>
            <?php  echo do_shortcode('[contact-form-7 id="e5b7620" title="login form"]')?>
            <?php $createNewAccountPageID = 156; ?>
            <a class="cre" href="<?php echo esc_url(get_permalink($createNewAccountPageID));?>">Create New Account</a>
            <p id="des">Register to receive a personalized shopping experience, faster checkouts and promotions.</p>

        </div>
    </div>
</div>



<?php get_footer() ?>