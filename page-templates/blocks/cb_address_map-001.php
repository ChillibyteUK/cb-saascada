<!-- address_map -->
<section class="address_map">
    <div class="container">
        <div class="row">
            <div class="col-lg-4" data-aos="fade-right">
                <h2>Find Us</h2>
                <ul class="fa-ul mb-4">
                    <li><span class="fa-li"><i class="fa-solid fa-location-dot"></i></span> <?=get_field('address','options')?></li>
                    <li><span class="fa-li"><i class="fa-solid fa-phone"></i></span> <a href="<?=parse_phone(get_field('phone','options'))?>"><?=get_field('phone','options')?></a></li>
                    <li><span class="fa-li"><i class="fa-solid fa-envelope"></i></span> <a href="mailto:<?=get_field('email','options')?>"><?=get_field('email','options')?></a></li>
                </ul>
                <div class="social_icons">
                    <?php
                    $social = get_field('social', 'options');
                    if ($social['twitter_url']) {
                        ?>
                    <a href="<?=$social['twitter_url']?>" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                        <?php
                    }
                    if ($social['linkedin_url']) {
                        ?>
                    <a href="<?=$social['linkedin_url']?>" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-lg-8" data-aos="fade-left">
                <iframe src="<?=get_field('maps_url','options')?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>
<section class="contact_form bg--grad-teal">
    <div class="overlay--dots-wo"></div>
    <div class="container">
        <div class="row" data-aos="fade-up">
            <div class="col-lg-8 offset-lg-2">
                <div class="card p-3">
                    <h2 class="text-center h2 mb-4">Contact Us</h2>
                    <?php
                    $e = get_field('hs_form');
                    ?>
                    <!--[if lte IE 8]>
                    <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
                    <![endif]-->
                    <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
                    <script>
                    hbspt.forms.create({
                        region: "<?=$e['region']?>",
                        portalId: "<?=$e['portal_id']?>",
                        formId: "<?=$e['form_id']?>",
                        // version: "V2_PRERELEASE",
                    });
                    </script>
                </div>
            </div>
        </div>
    </div>
</section>