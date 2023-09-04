<?php /**
 * Template Name: CreateNewAccount
 */


get_header() ?>

<div class="container register-form">
    <div class="row">
        <div class="col-12">
            <p class="register_title">
                CREATE ACCOUNT
            </p>
            <?php echo do_shortcode('[contact-form-7 id="30ae893" title="register form"]')?>
        </div>
    </div>
</div>

<?php get_footer() ?>