
<?php if(isset($_SESSION['error'])): ?>

    <div class="col-lg-12 alert alert-danger alert-dismissible show fade">
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        <strong>
            <?php echo $_SESSION['error']; ?>
        </strong>
    </div>

<?php elseif(isset($_SESSION['success'])): ?>

    <div class="alert alert-success alert-dismissible col-lg-12 fade show">
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        <strong>
            <?php echo $_SESSION['success']; ?>
        </strong>
    </div>

<?php endif; ?>
