





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


<!-- Modal -->
<div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Snow Editor</h4>
                                <p class="card-subtitle mb-4">Snow is a clean, flat toolbar theme.</p>

                                <div id="snow-editor" style="height: 300px;">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio magnam debitis at quod facere voluptatum, cupiditate dolorum quaerat consectetur harum!
                                </div> <!-- end Snow-editor-->
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col -->
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="sendEmail()">Send</button>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <div class="form-group col-2">
            <label for="">Bunch Action</label>
            <select class="form-control" name="" id="" onchange="openEditor(this.value)">
                <option value="0">Choose Action</option>
                <option value="1">Approve</option>
                <option value="0">Unapprove</option>
                
            </select>
        </div>
    </div>
    <div class="card-body">

        <table id="basic-datatable" class="table dt-responsive nowrap table-sm">
            <thead>
                <tr>
                    <!-- <th>#</th> -->
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Company Name</th>
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
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>


                </tr>
            </thead>


            <tbody>
                <?php $index = 0 ?>
                <?php foreach ($registers as $reg) : ?>
                    <tr id="regId<?= $reg->id ?>">

                        <td>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="" <?= $reg->approved == 1 ? 'disabled' : '' ?> id="check" value="<?= $reg->id ?>">
                                    <?= $reg->firstName ?>
                                </label>
                            </div>
                        </td>

                        <td><?= $reg->middleName ?></td>
                        <td><?= $reg->companyName ?></td>
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
                        <?php if ($reg->approved == 1) : ?>
                            <td>Approved</td>
                        <?php else : ?>
                            <td class="text-danger">Not Approved</td>
                        <?php endif; ?>
                        <td><?= $reg->createdAt ?></td>
                        <?php

                        ?>
                        <td class="box">
                            <button type="button" id="actionButton" class="btn btn-<?= $reg->approved == 1 ? 'danger' : 'success' ?> btn-sm" onclick="toggleApproval('<?= $index++ ?>','<?= $reg->id ?>','<?= $reg->approved == 0 ? 1 : 0 ?>')">
                                <?php if ($reg->approved == 1) : ?>
                                    Decline
                                <?php else : ?>
                                    </i> Accept
                                <?php endif; ?>
                            </button>



                        </td>

                    </tr>
                <?php endforeach; ?>


            </tbody>
        </table>
    </div>
</div>
<script>
    //a function to approve or un approve the  application
    function toggleApproval(index, id, approvalState) {
        const action = approvalState === 0 ? 'Decline' : 'Accept';

        Swal.fire({
            text: `Do you want to ${action} this application`,
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.value) {
                const table = $('#basic-datatable').DataTable();
                const actionButton = table.cell(index, 17);
                actionButton.data('<i class="fas fa-sync icon spin "></i>').draw();

                fetch('toggleApproval', {
                    method: 'post',
                    headers: {
                        'Content-Type': 'application/json;charset=utf-8',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('.token').value
                    },
                    body: JSON.stringify({
                        index,
                        id,
                        approvalState
                    })
                }).then(res => res.json()).then(data => {
                    const {
                        token,
                        msg,
                        status,
                        approval,
                        button
                    } = data;

                    actionButton.data(button);
                    table.cell(index, 15).data(approval).draw();

                    document.querySelector('.token').value = token;

                    Swal.fire({
                        text: msg,
                        type: status === 1 ? 'success' : 'warning',
                    });
                });
            }
        });
    }

    function openEditor(action) {
        if (action == 1) {
            $checkboxes = document.querySelector('.form-check-input')
            
            $('#message').modal('show')
        }
    }
</script>
<?= $this->endSection() ?>