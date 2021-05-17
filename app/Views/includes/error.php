<style>
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>

<section class="s-featured">
    <div class="row">
        <div class="col-full">
            <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            <p><strong style ="text-align:center;">Hay errores!</strong></p>
            <ul><?php
                foreach($errors as $key=>$value) {
                    echo "<li>" . $value .  "</li>";
                } ?>
            </ul>
            <div class="text-center">
              <a class="text-center btn btn--primary" href="<?php echo base_url() . $url; ?> ">Volver</a>
            </div>
        </div>
    </div>
  </div>
</section>