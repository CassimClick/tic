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
</style>
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

                <td><?= $reg->firstName ?></td>
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
                const { token, msg, status, approval, button } = data;

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

</script>
<?= $this->endSection() ?>