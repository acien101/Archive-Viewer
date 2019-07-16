<!DOCTYPE html>
<html>
<head>
  <?php include './assets/partials/head.php' ?>
</head>
<body>

  <?php
  $db = new CesarDatabase(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DATABASE);

  $observatoryNames = $db->getObservatoryNames();
  ?>

  <!-- Navigation -->
  <?php include './assets/partials/navbar.php'?>

  <!-- Page Content -->
  <div class="container">
    <div class="card main-block">
      <div class="card-body">
        <form action="search.php" method="get">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputSource">Since</label>
              <div class="input-group date" id="datetimepicker7" data-target-input="nearest">
                   <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker7" name="inputSince"/>
                   <div class="input-group-append" data-target="#datetimepicker7" data-toggle="datetimepicker">
                       <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                   </div>
               </div>
            </div>
            <div class="form-group col-md-6">
              <label for="inputSource">Until</label>
              <div class="input-group date" id="datetimepicker8" data-target-input="nearest">
                   <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker8" name="inputUntil"/>
                   <div class="input-group-append" data-target="#datetimepicker8" data-toggle="datetimepicker">
                       <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                   </div>
               </div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputSource">Source</label>
              <select id="inputsource" class="form-control" name="inputSource">
                <option value="" <?php if($_GET["inputSource"] == NULL) echo "selected" ?>>Whatever</option>
                <option <?php if($_GET["inputSource"] == "Sun") echo "selected" ?>>Sun</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="inputObs">Observatory</label>
              <select id="inputObs" class="form-control" name="inputObs">
                <option value="">Whatever</option>
                <?php
                foreach($observatoryNames as $observatory){
                  if($observatory == $_GET["inputObs"]){
                    echo "<option selected>" . $observatory . "</option>";
                  } else{
                    echo "<option>" . $observatory . "</option>";
                  }
                }
                ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="inputFilter">Filter</label>
              <select id="inputFilter" class="form-control" name="inputFilter">
                <option value="" <?php if($_GET["inputFilter"] == NULL) echo "selected" ?>>Whatever</option>
                <option <?php if($_GET["inputFilter"] == "halpha") echo "selected" ?>>halpha</option>
                <option <?php if($_GET["inputFilter"] == "visible") echo "selected" ?>>visible</option>
              </select>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Search</button>
        </form>
      </div>
    </div>

    <div class="card mt-2 mb-5">
      <div class="card-body">
        <div class="row text-center">
          <?php
          $obj = new CesarDatabase(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DATABASE);
          $obsId = ($_GET['inputObs'] == "Helios Observatory")? 1 : 1;    // There is only one observatory, doesnt make sense
          $res = $obj->advanceSearch($_GET["inputSource"], $obsId, $_GET["inputFilter"], $_GET["inputSince"], $_GET["inputUntil"], "DESC",NULL);
          if($res != NULL){
            foreach($res as $pic){
              echo <<<END
              <div class="col-lg-3 col-md-6">
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#imageModal" data-image-id="{$pic->getId()}" data-image-src={$pic->getExtSrc()} data-date-obs="{$pic->getDateObs()}"
              data-date-updated="{$pic->getDateUpdated()}" data-observatory="{$pic->getObservatory()->getName()}" data-observatory-lat="{$pic->getMetadata()->getLatitude()}"
              data-observatory-long="{$pic->getMetadata()->getLongitud()}" data-observatory-alt="{$pic->getMetadata()->getAltitude()}" data-telecop="{$pic->getMetadata()->getTelescop()}" data-instrume="{$pic->getMetadata()->getInstrume()}"
              data-exposure="{$pic->getMetadata()->getExposure()}">
              <div class="image">
              <img class="card-img-top" src=" {$pic->getExtSrc()} " alt="">
              </div>
              </button>
              </div>
END;
            }
          } else {  // There is no coincidences
            echo "There is no coincidences";
          }
          ?>
        </div>
      </div>
    </div>
  <!-- /.container -->
  </div>

  <!-- Footer -->
  <?php include './assets/partials/footer.php'?>

  <!-- Datepicker scripts -->
  <script type="text/javascript">
      $(function () {
          $('#datetimepicker7').datetimepicker();
          $('#datetimepicker8').datetimepicker({
              useCurrent: false
          });
          $("#datetimepicker7").on("change.datetimepicker", function (e) {
              $('#datetimepicker8').datetimepicker('minDate', e.date);
          });
          $("#datetimepicker8").on("change.datetimepicker", function (e) {
              $('#datetimepicker7').datetimepicker('maxDate', e.date);
          });
      });
  </script>
</body>
</html>
