<!-- address_map -->
<section class="address_map">
    <div class="overlay--dots"></div>
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