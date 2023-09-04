<footer id="ambious-footer">
    <div class="container">
        <div class="row">
            <?php if(have_rows('item','option')):?>
            <?php while(have_rows('item','option')): the_row();?>
            <div class="col-lg-3">
                <div class="fter">
                    <ul>
                        <p><?php echo get_sub_field('label')?></p>
                        <?php
                        // Check rows existexists.
                        if( have_rows('tag_link','option') ):

                            // Loop through rows.
                            while( have_rows('tag_link','option') ) : the_row();?>

                        <li><a href="<?php echo get_sub_field('link');?>"><?php echo get_sub_field('tag');?></a>
                        </li>
                        <?php endwhile;?>

                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <?php endwhile ?>
            <?php endif ?>


        </div>
    </div>
</footer>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
</script>
<script src="https://kit.fontawesome.com/9e8a8858d4.js" crossorigin="anonymous"></script>
<script src="<?php bloginfo('template_directory')?>/src/app.js"></script>
<?php wp_footer();?>
</body>

</html>