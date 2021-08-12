<?php   
  require("header.php");
?>

<div class="container">
  <div id="location">

    <form action="get">
      <input type="text" class="form-control" style="width:40%" placeholder="Dog Name" id="dog" />

      <div class="texts">
        <select class="form-control" name="font" id="secfont">
          <?php 
            foreach($fonts as $key => $name) {
              echo "<option value='$key'>$name</option>";
            }
          ?>
        </select>

        <select class="form-control" name="color" id="seccolor">
          <?php 
            $colors = [
              "green" => "Green",
              "red" => "Red",
              "yellow" => "Yellow",
              "purple" => "Purple",
              "blue" => "Blue"
            ];
            foreach($colors as $key => $name){
              echo "<option value='$key'>$name</option>";
            }
          ?>
        </select>
      
        <br>

      
        <br>

        <button type="button" class="btn btn-success" onclick="save()">Cadastrar</button>

      </div>
    </form>

    <form method="get">
      <div class="img-dog" name="image" style="position: relative">
        <?php 
          $url = "https://dog.ceo/api/breed/" . $_GET["sec"] . "/images/random";
          $img = json_decode(file_get_contents($url)); 
        ?>
        <img src="<?php echo $img->message ?>" alt="a">
        <h3 id="showName" style="position: absolute; left: 10px; top: 10px;"></h3>
      </div>

      <select class="form-control" name="sec" id="down-select" onchange="this.form.submit()">
        <?php
          $url = "https://dog.ceo/api/breeds/list/all";
          $doggs = json_decode(file_get_contents($url));
          foreach($doggs->message as $breeds => $variation) {
            echo "<option ".($_GET["sec"] == $breeds ?"selected":"")."> {$breeds} </option>";
          }
        ?>
      </select>
    </form>

  </div>
</div>

<script>
  var selectBreeds = document.getElementById('down-select');
  var inputDogName = document.getElementById('dog');
  var selectFont = document.getElementById('secfont');
  var selectColor = document.getElementById('seccolor');
  var h3DogName = document.getElementById('showName');

  function getFormValues() {
    return {
      name: inputDogName.value,
      font: selectFont.value,
      color: selectColor.value
    };
  }

  function setFormValues(data) {
    h3DogName.innerText = data.name;
    h3DogName.style.fontFamily = data.font;
    h3DogName.style.color = data.color;
    
    inputDogName.value = data.name;
    selectFont.value = data.font;
    selectColor.value = data.color;
  }

  function save() {
    const breed = selectBreeds.value;
    const formValues = getFormValues();
    setFormValues(formValues);
    localStorage.setItem(breed, JSON.stringify(formValues));
  }

  function load() {
    const breed = selectBreeds.value;
    const formValuesAsText = localStorage.getItem(breed);
    if (formValuesAsText) {
      setFormValues(JSON.parse(formValuesAsText));
    }
  }
  load();
</script>

</body>
</html>