<?= $this->extend('Layout/BackendLayout') ?>
<?= $this->section('content') ?>
<table id="basic-datatable" class="table dt-responsive nowrap table-sm">
    <thead>
        <tr>
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
        <?php foreach($registers as $person): ?>
            <tr>
                <td><?=$person->firstName?></td>
                <td><?=$person->middleName?></td>
                <td><?=$person->companyName?></td>
                <td><?=$person->phoneNumber?></td>
                <td><?=$person->alternativePhoneNumber?></td>
                <td><?=$person->passportNumber?></td>
                <td><?=$person->nidaNumber?></td>
                <td><?=$person->nationalityType?></td>
                <td><?=$person->country?></td>
                <td><?=$person->areaOfInterest?></td>
                <td><?=$person->email?></td>
                <td><?=$person->physicalAddress?></td>
                <td><?=$person->typeOfBusiness?></td>
                <td><?=$person->sector?></td>
                <td><?=$person->registrationBody?></td>
                <?php if($person->approved == 1): ?>
                    <td>Approved</td>
                <?php else: ?>
                   <td> Not Approved</td>
                <?php endif; ?>
                <td><?=$person->createdAt?></td>
                <td>
                <?php if($person->approved == 0): ?>
                    <button type="button" class="btn btn-primary btn-sm">Approve</button>
                    <?php else: ?>
                        <button type="button" class="btn btn-danger btn-sm">Un Approve</button>
                   <?php endif; ?>
                </td>
               
            </tr>
        <?php endforeach; ?>
        
    
    </tbody>
</table>
<?= $this->endSection() ?>