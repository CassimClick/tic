<?= $this->extend('Layout/BackendLayout') ?>
<?= $this->section('content') ?>
<style>
    .spin {
        display: inline-block !important;
        ;
        animation-name: spinner;
        animation-duration: 1000ms;
        animation-iteration-count: infinite;
        animation-timing-function: linear;
    }

    .hide {
        display: none !important;
        ;
    }

    /* 
            .swal-button--danger {
                background: #0075F2;
                color: #fff;
            }

            .swal-button--danger:hover {
                background: #2250CE !important;
            } */

    @keyframes spinner {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);

        }

    }

    #check {
        transform: scale(1.3);
    }
</style>


<div class="card">
    <div class="card-header">
        <div class="col-6">
            <div class="row form-inline">
                <div class="form-group">

                    <select class="form-control" name="" id="approvalState" required>
                        <option disabled selected value="">Choose Action</option>
                        <option value="1">Approve</option>
                        <option value="0">Unapprove</option>

                    </select>
                </div>
                <button class="btn btn-primary mx-2" type="button" onclick="batchToggleApproval()" >
                    <span class="spinner-border spinner-border-sm mr-1" id="spinner" role="status" aria-hidden="true" style="display: none;"></span>
                    Submit
                </button>
              
            </div>
        </div>
    </div>
    <div class="card-body">

        <table id="basic-datatable" class="table dt-responsive nowrap table-sm">
            <thead>
                <tr>
                    <!-- <th>#</th> -->
                    <th>Name</th>
                    <th>Company Name</th>
                    <th>Status</th>
                    <th>Phone Number</th>
                    <th>Alternative Phone Number</th>
                    <th>Passport Number</th>
                    <th>Nida Number</th>
                    <th>Nationality Type</th>
                    <th>country</th>
                    <th>AreaOf Interest</th>
                    <th>email</th>
                    <th>Physical Address</th>
                    <th>TypeOf Business</th>
                    <th>Sector</th>
                    <th>Registration Body</th>
                    <th>Date</th>
                  


                </tr>
            </thead>


            <tbody>
                <?php $index = 0 ?>
                <?php foreach ($registers as $reg) : ?>
                    <tr id="regId<?= $reg->id ?>">

                        <td>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input " name="registerId" id="check" value="<?= $reg->id ?>">
                                    <?= $reg->firstName  . ' ' . $reg->middleName . ' ' . $reg->lastName ?>
                                </label>
                            </div>
                        </td>


                        <td><?= $reg->companyName ?></td>
                        <?php if ($reg->approved == 1) : ?>
                            
                            <td>
                            <span class="badge badge-pill badge-success">Approved</span>
                                
                            </td>
                        <?php else : ?>
             
                            <td>
                            <span class="badge badge-pill badge-danger">Unapproved</span>
                            </td>
                        <?php endif; ?>
                        <td><?= $reg->phoneNumber ?></td>
                        <td><?= $reg->alternativePhoneNumber ?></td>
                        <td><?= $reg->passportNumber ?></td>
                        <td><?= $reg->nidaNumber ?></td>
                        <td><?= $reg->nationalityType ?></td>
                        <td><?= $reg->country ?></td>
                        <td><?= $reg->areaOfInterest ?></td>
                        <td><?= $reg->email ?></td>
                        <td><?= $reg->physicalAddress ?></td>
                        <td><?= $reg->typeOfBusiness ?></td>
                        <td><?= $reg->sector ?></td>
                        <td><?= $reg->registrationBody ?></td>
                       
                        <td><?= $reg->createdAt ?></td>
                        
                     

                    </tr>
                <?php endforeach; ?>


            </tbody>
        </table>
    </div>
</div>
<script>
    

    function batchToggleApproval() {
        const approvalState = document.querySelector('#approvalState').value
        const checkboxes = document.querySelectorAll('input[name="registerId"]:checked')
        const registerIds = [...checkboxes].map(checkbox => checkbox.value)

        if (registerIds.length) {


            const action = approvalState === 0 ? 'Decline' : 'Accept';

            Swal.fire({
                text: `Do you want to ${action} selected Applicants `,
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.value) {

                    const spinner = document.querySelector('#spinner')
                    spinner.style.display ='inline-block'


                    fetch('batchToggleApproval', {
                        method: 'post',
                        headers: {
                            'Content-Type': 'application/json;charset=utf-8',
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('.token').value
                        },
                        body: JSON.stringify({
                            approvalState,
                            registerIds
                        })
                    }).then(res => res.json()).then(data => {
                        spinner.style.display ='none'
                        const {
                            token,
                            msg,
                            status,
                            approval,
                            button
                        } = data;



                        document.querySelector('.token').value = token;

                        Swal.fire({
                            text: msg,
                            type: status === 1 ? 'success' : 'warning',
                        });
                        location.reload()
                    });
                }
            });



        } else {
            Swal.fire({
                text: 'Select at least one applicant ',
                type: 'warning',
            });
        }


    }
</script>
<?= $this->endSection() ?>