<?= $this->extend('Layout/BackendLayout') ?>
<?= $this->section('content') ?>
<div class="card mb-2">
    <div class="card-body">
        <form id="reportForm">
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="">Status</label>
                    <select class="form-control" name="status" id="" required>
                        <option value="">-Status-</option>
                        <option value="1">Approved</option>
                        <option value="0">Un-Approved</option>
                        <option value="">All</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="">Month</label>
                    <select class="form-control" name="month" id="">
                        <option value="">-Month-</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="10">December</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="">Year</label>
                    <select class="form-control" name="year" id="">
                        <?php for ($year = date('Y'); $year >= 2023; $year--) : ?>
                            <option value="<?= $year ?>"><?= $year ?></option>
                        <?php endfor; ?>

                    </select>
                </div>
                <div class="form-group col-md-2">
                    <button type="submit" class="btn btn-primary btn-sm mt-4">Generate</button>
                </div>
            </div>
        </form>
    </div>

</div>
<div class="card mb4">
    <div class="card-body">
        <div id="report">

        </div>
    </div>
    <!-- <div class="card-footer">
        <a href="button" target="_blank" class="btn btn-primary btn-sm"><i class="fas fa-download"></i> Download</a>
    </div> -->
</div>
<script>
    const reportForm = document.querySelector('#reportForm');
    reportForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const formData = new FormData(reportForm);
        fetch('generateReports', {
            method: 'post',
            headers: {
                // 'Content-Type': 'application/json;charset=utf-8',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('.token').value
            },
            body: formData
        }).then(res => res.json()).then(data => {
            const {
                token,
                msg,
                report
            } = data;

            console.log(data);

            document.querySelector('#report').innerHTML = report;
            $('#basic-datatable').DataTable();
            document.querySelector('.token').value = token;
        });
    })
</script>
<?= $this->endSection() ?>