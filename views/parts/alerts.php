<?php if(isset($_SESSION['success'])): ?>
    <!-- Success message -->
    <div class="col-lg-3 col-md-3 col-4" id="success-message">
        <div class="alert alert-success fade show alert-dismissible">
            <strong class="text-dark">
                <?php echo $_SESSION['success']; ?>
            </strong>
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div> 
    </div>
<?php elseif(isset($_SESSION['error'])): ?>
    <!-- Error message -->
    <div class="col-lg-3 col-md-3 col-3" id="error-message">
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>
                <?php echo $_SESSION['error']; ?>
            </strong>
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    </div>
<?php endif; ?>