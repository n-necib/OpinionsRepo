<div class="addColumnist" >
    <form  method="POST" enctype="multipart/form-data">
        <div>
            <label for="name">Name:</label><br>
            <input type="text" name="name" id="name"><br>
        </div>
       <div>
           <label for="image">Image:</label><br>
           <input type="file"  name="upImg" id="image" onchange="readURL(this)" ><br>
       </div>
        <div id="imgDiv">
            <img id="blah" src="#" alt="columnist's image" /><br>
        </div>
        <input type="submit" name="submit" value="Add">
    </form>

    <?php if(isset($_SERVER['message'])): ?>
        <div id="message" style="background-color:<?= $_SERVER['color']?>">
            <p><?= $_SERVER['message'] ?></p>
        </div>
    <?php endif ?>
</div>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)

            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

