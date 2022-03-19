<script>
       <?php
  if($this->session->userdata('toastmsg')){
    ?>
    toastpopup("<?= $this->session->userdata('toastmsg') ?>");
    <?php
    $this->session->unset_userdata('toastmsg');
  }
    ?>
   
  

  function toastpopup(d) {
    var x = document.getElementById("snackbar");
    x.innerText = d;
    x.className = "show";
    setTimeout(function() {
      x.className = x.className.replace("show", "");
    }, 3000);
  }

  function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57)){
          return false;
        
        }
        return true;
      } 
    </script>