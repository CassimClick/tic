<?= $this->extend('Layout/FrontEndLayout') ?>
<?= $this->section('content') ?>

<section class="parallax_window_in" data-parallax="scroll" data-image-src="<?= base_url('frontend/assets/img/office2.jpg') ?>" data-natural-width="1400" data-natural-height="800">
    <div id="sub_content_in">
        <h1>Tanzania Investment Centre (TIC)</h1>
        <p></p>
        <a href="<?= base_url('registration') ?>" type="button" class="btn_1 add_bottom_15">Register Now</a>
    </div>
</section>
<!-- /section -->

<main id="general_page">
    <div class="container_styled_1">
        <div class="container margin_60_35">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="nomargin_top"> INVITATION TO PARTICIPATE IN THE TANZANIA — NETHERLANDS
                        I BUSINESS AND INVESTMENT FORUM </h2>
                    <p>
                        Tanzania Investment Centre (TIC) in collaboration with the Embassy ofTanzania
                        in Netherlands and other respective stakeholders have organized the Tanzania
                        Netherlands Business and Investment Forum to be held from 14t1 to 15th
                        November 2023, The Hague Netherlands.
                        The forum will focus on the promotion of Business and Investment
                        Opportunities in the Agriculture and Agro business, Livestock and Fisheries,
                        Energy, Infrastructure and Construction sectors.
                        The program of the forum will include B2B discussions and Site visits to the
                        industrial areas around the sectors of focus.

                        There are no participation fees in any of the events in the program of this
                        Business and Investment Forum. Every Participants will have to bear travel and
                        accommodation cost.
                    </p>
                    <br>
                    <p>
                        If you are interested to participate in the forum, Please register your company
                        and list of participants through this link <a href="<?= base_url('registration') ?>">Registration</a>;
                    </p>
                </div>
                <div class="col-lg-5 ml-lg-5 add_top_30">
                    <img src="<?= base_url('frontend/assets/img/image1.jpg') ?>" alt="" class="img-fluid">
                </div>
            </div>
            <!-- End row -->
        </div>
    </div>

    <!-- End container -->
</main>

<?= $this->endSection() ?>