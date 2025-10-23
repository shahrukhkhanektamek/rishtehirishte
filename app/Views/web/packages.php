<!--  Start Header Area -->
<?php include"include/header.php"; ?>
<!-- End Header Area -->

    <div class="hom-top inner_style">

    <?php include"include/header-nav.php"; ?>
<style>
.plans-main {
    margin: -50px 0px 0px;
}
</style>
    <!-- PRICING PLANS -->
    <section>
        <div class="plans-ban">
            <div class="container">
                <div class="row">
                    <span class="pri">Packages</span>
                    <h1>Get Started <br> Pick your Plan Now</h1>
                    <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p> -->
                    <!-- <span class="nocre">No credit card required</span> -->
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- PRICING PLANS -->
    <section>
        
                <?php echo view("web/card/package-card") ?>
            
    </section>
    <!-- END -->


<!--  Start Footer Area -->
<?php include"include/footer.php"; ?>


<!-- End Footer Area --> 