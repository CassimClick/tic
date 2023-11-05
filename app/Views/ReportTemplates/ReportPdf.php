<?= $this->extend('Layout/PdfLayout'); ?>
<?= $this->section('content'); ?>

<?php

$sn = 1;

?>


        <h5 class="text-center"><?=$title ?></h5>
        <table  class="table table-bordered table-sm">
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
                
                    <th>Date</th>
                  


                </tr>
            </thead>


            <tbody>
                <?php $index = 0 ?>
                <?php foreach ($registers as $reg) : ?>
                  <?php
                    $date = dateFormatter($reg->createdAt)
                    ?>
                    <tr >

                        <td>
                        <?= $reg->firstName  . ' ' . $reg->middleName . ' ' . $reg->lastName ?>
                        </td>


                        <td><?= $reg->companyName ?></td>
                        <?php if ($reg->approved == 1) : ?>
                            
                            <td>
                           Approved
                                
                            </td>
                        <?php else : ?>
             
                            <td>
                           Unapproved
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
                      
                       
                        <td><?= $date ?></td>
                        
                     

                    </tr>
                <?php endforeach; ?>


            </tbody>
        </table>
   



<?= $this->endSection(); ?>