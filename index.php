<?php
    include_once 'heard.php'
?>

<div class="container">
  <div class="row">
    <?php
      include 'includes/dbh.inc.php';
      $stmt = $conn->prepare("SELECT * FROM product");
      $stmt->execute();
      $result = $stmt->get_result();
      while($row = $result->fetch_assoc()):
    ?>
    <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
      <div class="card-deck">
        <div class="card p-2 border-secondary mb-2"style="margin-top: 20px;">
          <img src="<?= $row['product_image'] ?>" class="card-img-top" height="250">
          <div class="card-body p-1">
            <h4 class="card-title text-center text-info"><?= $row['product_name'] ?></h4>
            <h5 class="card-text text-center text-danger">
              <i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;
              <?=number_format($row['product_price'], 2)?>/-
            </h5>
          </div>
          <div class="card-footer p-1 d-grid gap-2">
            <form action="" class="form-submit">
              <input type="hidden" class="pid" value="<?= $row['id'] ?>">
              <input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
              <input type="hidden" class="pprice" value="<?= $row['product_name'] ?>">
              <input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
              <div class="d-grid gap-2">
                <button class="btn btn-info addItemBtn"  type="button">
                <i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to cart
              </button>
              </div>
            </form>
          </div>
        </div>
      </div> 
    </div>
    <?php endwhile; ?>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $(".addItemBtn").click(function(e){
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var pid = $form.find(".pid").val();
      var pname = $form.find(".pname").val();
      var pprice = $form.find(".pprice").val();
      var pimage = $form.find(".pimage").val();
      var pcode = $form.find(".pcode").val();
    });
  });
</script>

<?php
    include_once 'footer.php'
?>