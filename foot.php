<script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

<script>
 $(document).ready(function () {
     $('.card').click(function () {
         $('#tipo').val($(this).attr('data-id'));
         console.log($('#tipo').val());
     });

     setTimeout(function() {
         $("#success-alert").alert('close');
     }, 2000);

     $('.cancelar').click(function () {
         let data = { id: $(this).attr('data-id') };

         $.post("cancelar.php", data , function () {
             
         })
          .done(function (){
              $("#" + data.id + "status").css("background","gray");
              $("#" + data.id + "cancelar").css("display","none");
              $("#" + data.id + "progreso").css("display","none");
          })
          .fail(function (){
              alert("Error!, reportelo a marco");
          });
     });

     $('.progreso').click(function () {
         let data = { id: $(this).attr('data-id') };

         $.post("progreso.php", data , function () {
             
         })
          .done(function (){
              $("#" + data.id + "status").css("background","orange");
              $("#" + data.id + "cancelar").css("display","none");
              $("#" + data.id + "progreso").css("display","none");
          })
          .fail(function (){
              alert("Error!, reportelo a marco");
          });
     });

     $('.terminado').click(function () {
         let data = { id: $(this).attr('data-id') };

         $.post("terminado.php", data , function () {
             
         })
          .done(function (){
              $("#" + data.id + "status").css("background","green");
              $("#" + data.id + "terminado").css("display","none");
              $("#" + data.id + "cancelar").css("display","none");
          })
          .fail(function (){
              alert("Error!, reportelo a marco");
          });
     });

 });
</script>
