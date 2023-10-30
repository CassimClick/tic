<?= $this->extend('Layout/BackendLayout') ?>
<?= $this->section('content') ?>
<style>
    .icon {
        color: #fff;
        font-size: 3rem;
    }
</style>
<div class="row">
    <div class="col-md-6 col-xl-4">
        <div class="card bg-primary border-primary">
            <div class="card-body">
                <div class="mb-4">

                    <h5 class="card-title mb-0 text-white">All Registrations</h5>
                </div>
                <div class="row d-flex align-items-center mb-4">
                    
                    <div class="col-8">
                        <h1 class="d-flex text-left text-white mb-0">
                            <?= $allRegistrations ?>
                        </h1>
                    </div>
                    <div class="col-4 text-right">
                        <i class="fas fa-users icon"></i>

                    </div>


                </div>


            </div>
        </div>
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-4">
        <div class="card bg-success border-success">
            <div class="card-body">
                <div class="mb-4">

                    <h5 class="card-title mb-0 text-white">Approved</h5>
                </div>
                <div class="row d-flex align-items-center mb-4">
                    
                    <div class="col-8">
                        <h1 class="d-flex text-left text-white mb-0">
                            <?= $approved ?>
                        </h1>
                    </div>
                    <div class="col-4 text-right">
                        <i class="fas fa-user-check icon"></i>

                    </div>


                </div>


            </div>
        </div>
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-4">
        <div class="card bg-danger border-warning">
            <div class="card-body">
                <div class="mb-4">

                    <h5 class="card-title mb-0 text-white">Un-Approved</h5>
                </div>
                <div class="row d-flex align-items-center mb-4">
                    
                    <div class="col-8">
                        <h1 class="d-flex text-left text-white mb-0">
                            <?= $unApproved ?>
                        </h1>
                    </div>
                    <div class="col-4 text-right">
                        <i class="fas fa-user-times icon"></i>

                    </div>


                </div>


            </div>
        </div>
    </div> <!-- end col-->


</div>
<?= $this->endSection() ?>