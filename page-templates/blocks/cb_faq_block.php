<!-- faq_block -->
<section class="faq_block">
    <div class="container">
        <div class="faq_block__inner">
            <?php if(get_field('faq_title')) { ?>
                <h2 class="h2 section_title mb-4" data-aos="fade-right"><?php echo get_field('faq_title')?></h4>
            <?php }?>

            <?php
    $accordion = random_str(5);

    echo '<div itemscope="" itemtype="https://schema.org/FAQPage" id="accordion' .  $accordion . '" class="accordion accordion-flush">';
    $counter = 0;
    $show = 'show';
    $collapsed = '';
    while (have_rows('faqs')) {
        the_row();
        $ac = $accordion . '_' . $counter;
        ?>
        <div itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question" class="accordion-item" data-aos="fade-right">
            <div class="accordion-head accordion-collapse <?=$collapsed?>" itemprop="name" data-bs-toggle="collapse" id="heading_<?=$ac?>" data-bs-target="#c<?=$ac?>" aria-expanded="true" aria-controls="collapse_<?=$ac?>">
                <div class="pb-1"><?=get_sub_field('question')?></div>
            </div>
            <div class="collapse <?=$show?>" itemscope="" itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" id="c<?=$ac?>" aria-labelledby="heading_<?=$ac?>" data-bs-parent="#accordion<?=$accordion?>">
                <div itemprop="text" class="faq__answer"><?=get_sub_field('answer')?></div>
            </div>
        </div>
        <?php
        $counter++;
        $show = '';
        $collapsed = 'collapsed';
    }
    echo '</div>';
    /*
    // if(have_rows('faqs')) {
    //     ?>
    //     <div class="faq_block__content accordion" id="faqs">
    //         <?php
    //         $show = 'show';
    //         $n = 1;
    //         while(have_rows('faqs')) {
    //             the_row();
    //             ?>
    //             <div class="accordion-item" data-aos="fade-right">
    //                 <div class="accordion-head">
    //                     <div class="accordion-collapse collapse" data-bs-toggle="collapse" data-bs-target="#cs<?=$n?>"><?php echo get_sub_field('question');?></div>
    //                 </div>
    //                 <div class="accordion-body collapse <?=$show?>" id="cs<?=$n?>" data-bs-parent="#faqs">
    //                     <?php echo get_sub_field('answer');?>
    //                 </div>
    //             </div>
    //             <?php
    //             $show = '';
    //             $n++;
    //         }
    //         ?>
    //     </div>
    //     <?php
    // }
    //
    */
     ?>
    </div>
</section>