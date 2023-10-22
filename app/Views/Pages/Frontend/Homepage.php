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
                    <h2 class="nomargin_top">Welcome</h2>
                    <p>
                        You are warmly welcome to invest in Tanzania, one of the fastest-growing economies in Africa. Tanzania offers a friendly business environment, has abundant natural resources, and endless opportunities for investors.

                        The country’s sustained economic growth of 7% during the past decade, has been rewarded by climbing a ladder of development from a low-income to middle-income-country effectively July 1st, 2020 (World Bank, 2020). This achievement was witnessed five years before the time anticipated in the country’s Vision 2025 Strategy.

                        Consequently, notable achievements have been realized in various sectors including infrastructure, social services, minerals, and management of natural resources, land, and environment as well as good governance.

                        To sustain the economic growth success, the Government under the firm leadership of Her Excellency Samia Suluhu Hassan, President of the United Republic of Tanzania is implementing an industrial driven economy, which emphasizes on the attraction of investments in identified key priority sectors.

                        The manufacturing sector has been given the highest priority in attracting investors in Tanzania, particularly the establishment of industries which utilize domestic available raw materials such as processing of various agricultural products (sugarcane, cashew nuts, cotton, processing of edible oil from sunflower, sesame, cotton seeds, groundnuts, oil palm, etc), fruits and vegetable farming for the export market, fishing and fish processing, livestock value chain, mining and mineral processing, woodworks, manufacturing of pharmaceutical products and medical devices.

                        Due to the maintenance of consistent conducive economic governance reforms, Tanzania has attained an attractive global ranking in different aspects. According to the RMB report on “Where to Invest in Africa 2019” Tanzania is ranked 7th, out of 54 countries. Most importantly, Tanzania boasts as a country of peace and tranquility as confirmed by the 2019 Global Peace Index which measures the level of peace and stability. The report placed Tanzania at the 54th position worldwide and ranked the first among East African Countries.
                    </p>
                </div>
                <div class="col-lg-5 ml-lg-5 add_top_30">
                    <img src="<?=base_url('frontend/assets/img/image1.jpg')?>" alt="" class="img-fluid">
                </div>
            </div>
            <!-- End row -->
        </div>
    </div>
  
    <!-- End container -->
</main>

<?= $this->endSection() ?>