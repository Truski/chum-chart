<p><a id="start-now" class="button" href="/App/quiz">Create New Chart</a></p>
<p> - OR - </p>
<p><input type="text" id="urlidthing" name="urlid" placeholder="Friend code" /></p>
<p><a class="button" id="join-existing" href="#">Join Existing</a></p>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script>

$('#join-existing').click(function() {
  window.location.href = "/App/quiz/" + $('#urlidthing').val();
});

</script>