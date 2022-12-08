<?php
  include_once("function/link.php");
?>
<!DOCTYPE html>
<html> 
<head>
  <title>Bootstrap-select Tests (Bootstrap 4)</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/dist/css/bootstrap-select.css">

  <style>
    body {
      padding-top: 70px;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-light bg-light fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Bootstrap-select usability tests</a>
    </div>
  </div>
</nav>

<div class="container">
  <form role="form">
    <div class="form-group row">
      <label for="basic" class="col-lg-2 control-label">Large Select (liveSearch enabled, container: 'body')</label>

      <div class="col-lg-5">
        <label>Standard xxx</label>
        <select class="selectpicker form-control" id="number" data-container="body" data-live-search="true" title="Select a number" data-hide-disabled="true"></select>
      </div>

      <div class="col-lg-5">
        <label>Multiple (no virtualScroll)</label>
        <select multiple class="selectpicker form-control" id="number-multiple" data-container="body" data-live-search="true" title="Select a number" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false"></select>
      </div>
    </div>
  </form>

  <form role="form">
    <div class="form-group row">
      <label for="basic" class="col-lg-2 control-label">Large Select (liveSearch disabled)</label>

      <div class="col-lg-5">
        <label>Standard</label>
        <select class="selectpicker form-control" id="number2" title="Select a number" data-hide-disabled="true"></select>
      </div>

      <div class="col-lg-5">
        <label>Multiple</label>
        <select class="selectpicker form-control" id="number2-multiple" title="Select a number" data-hide-disabled="true" multiple data-actions-box="true"></select>
      </div>
    </div>
  </form>

  <hr>

  <form role="form">
    <div class="form-group row">
      <label for="basic" class="col-lg-2 control-label">"Basic" (liveSearch disabled)</label>

      <div class="col-lg-10">
        <select id="basic" class="selectpicker show-tick form-control">
          <option>cow</option>
          <option data-subtext="option subtext">bull</option>
          <option class="get-class" disabled>ox</option>
          <optgroup label="test" data-subtext="optgroup subtext">
            <option>ASD</option>
            <option selected>Bla</option>
            <option>Ble</option>
          </optgroup>
        </select>
      </div>
    </div>
  </form>

  <hr>

  <form role="form">
    <div class="form-group row">
      <label for="basic" class="col-lg-2 control-label">"Basic" (liveSearch enabled)</label>

      <div class="col-lg-10">
        <select id="basic" class="selectpicker show-tick form-control" data-live-search="true">
          <option>cow</option>
          <option data-subtext="option subtext">bull</option>
          <option class="get-class" disabled>ox</option>
          <optgroup label="test" data-subtext="optgroup subtext">
            <option>ASD</option>
            <option selected>Bla</option>
            <option>Ble</option>
          </optgroup>
        </select>
      </div>
    </div>
  </form>

  <hr>
  <form role="form">
    <div class="form-group row">
      <label for="basic2" class="col-lg-2 control-label">"Basic" (multiple, maxOptions=1)</label>

      <div class="col-lg-10">
        <select id="basic2" class="show-tick form-control" multiple>
          <option>cow</option>
          <option>bull</option>
          <option class="get-class" disabled>ox</option>
          <optgroup label="test" data-subtext="another test">
            <option>ASD</option>
            <option selected>Bla</option>
            <option>Ble</option>
          </optgroup>
        </select>
      </div>
    </div>
  </form>

  <hr>
  <form role="form">
    <div class="form-group row">
      <label for="maxOption2" class="col-lg-2 control-label">multiple, show-menu-arrow, maxOptions=2</label>

      <div class="col-lg-10">
        <select id="maxOption2" class="selectpicker show-menu-arrow form-control" multiple data-max-options="2">
          <option>chicken</option>
          <option>turkey</option>
          <option disabled>duck</option>
          <option>goose</option>
        </select>
      </div>
    </div>
  </form>

  <hr>
  <form role="form">
    <div class="form-group row">
      <label for="error" class="col-lg-2 control-label">is-invalid class</label>

      <div class="col-lg-10">
        <select id="error" class="selectpicker show-tick form-control is-invalid form-control-lg" required>
          <option>pen</option>
          <option>pencil</option>
          <option selected>brush</option>
        </select>
      </div>
    </div>
  </form>

  <hr>
  <form role="form" class="was-validated">
    <div class="form-group row">
      <label class="control-label col-lg-2" for="country">:invalid/:valid pseudoclass</label>

      <div class="col-lg-10">
        <select id="country" name="country" class="form-control selectpicker form-control-sm" required multiple>
          <option>Argentina</option>
          <option>United States</option>
          <option>Mexico</option>
        </select>

        <p class="help-block">Selecting an option changes to the :valid pseudoclass</p>
      </div>
    </div>
  </form>

  <hr>
  <nav class="navbar navbar-light bg-light" role="navigation">
    <div class="container">
      <a class="navbar-brand" href="#">Navbar</a>

      <form class="form-inline" role="search">
        <div class="form-group">
          <select class="selectpicker" multiple data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
            <optgroup label="filter1">
              <option>option1</option>
              <option>option2</option>
              <option>option3</option>
              <option>option4</option>
            </optgroup>
            <optgroup label="filter2">
              <option>option1</option>
              <option>option2</option>
              <option>option3</option>
              <option>option4</option>
            </optgroup>
            <optgroup label="filter3">
              <option>option1</option>
              <option>option2</option>
              <option>option3</option>
              <option>option4</option>
            </optgroup>
          </select>
        </div>

        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search" name="q">

          <div class="input-group-btn">
            <button class="btn btn-dark" type="submit"><i class="fa fa-search"></i></button>
          </div>
        </div>
        <button type="submit" class="btn btn-dark">Search</button>
      </form>

    </div>
    <!-- .container-fluid -->
  </nav>

  <hr>
  <select id="first-disabled" class="selectpicker" data-hide-disabled="true" data-live-search="true">
    <optgroup disabled="disabled" label="disabled">
      <option>Hidden</option>
    </optgroup>
    <optgroup label="Fruit">
      <option>Apple</option>
      <option>Orange</option>
    </optgroup>
    <optgroup label="Vegetable">
      <option>Corn</option>
      <option>Carrot</option>
    </optgroup>
  </select>

  <hr>
  <select id="first-disabled2" class="selectpicker" multiple data-hide-disabled="true" data-size="5">
    <option>Apple</option>
    <option>Banana</option>
    <option>Orange</option>
    <option>Pineapple</option>
    <option>Apple2</option>
    <option>Banana2</option>
    <option>Orange2</option>
    <option>Pineapple2</option>
    <option>Apple2</option>
    <option>Banana2</option>
    <option>Orange2</option>
    <option>Pineapple2</option>
  </select>
  <button id="special" class="btn btn-light">Hide selected by disabling</button>
  <button id="special2" class="btn btn-light">Reset</button>
  <p>Just select 1st element, click button and check list again</p>

  <hr>
  <div class="input-group">
    <select class="form-control selectpicker">
      <option>One</option>
      <option>Two</option>
      <option>Three</option>
    </select>
    <div class="input-group-append">
      <span class="input-group-text">@</span>
    </div>
  </div>

  <hr>
  <div class="input-group">
    <div class="input-group-prepend">
      <span class="input-group-text">@</span>
    </div>
    <select class="form-control selectpicker" data-mobile="true">
      <option>One</option>
      <option>Two</option>
      <option>Three</option>
    </select>
  </div>
  <p>With <code>data-mobile="true"</code> option.</p>

  <hr>
  <select id="done" class="selectpicker" multiple data-done-button="true">
    <option>Apple</option>
    <option>Banana</option>
    <option>Orange</option>
    <option>Pineapple</option>
    <option>Apple2</option>
    <option>Banana2</option>
    <option>Orange2</option>
    <option>Pineapple2</option>
    <option>Apple2</option>
    <option>Banana2</option>
    <option>Orange2</option>
    <option>Pineapple2</option>
  </select>

  <hr>

  <div class="form-group">
    <label for="tokens">Key words (data-tokens)</label>
    <select id="tokens" class="selectpicker form-control" multiple data-live-search="true">
      <option data-tokens="first">I actually am called "one"</option>
      <option data-tokens="second">And me "two"</option>
      <option data-tokens="last">I am "three"</option>
    </select>
  </div>

  <hr>
  <form>
    <div class="form-group row">
      <label class="col-lg-2 control-label" for="lunchBegins">searchStyle: 'begins'</label>
      <div class="col-lg-10">
        <select id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Please select a lunch ...">
          <option>Hot Dog, Fries and a Soda</option>
          <option>Burger, Shake and a Smile</option>
          <option>Sugar, Spice and all things nice</option>
          <option>Baby Back Ribs</option>
          <option>A really really long option made to illustrate an issue with the live search in an inline form</option>
        </select>
      </div>
    </div>
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="assets/dist/js/bootstrap-select.js"></script>

<script>
function createOptions(number) {
  var options = [], _options;

  for (var i = 0; i < number; i++) {
    var option = '<option value="' + i + '">Option ' + i + '</option>';
    options.push(option);
  }

  _options = options.join('');
  
  $('#number')[0].innerHTML = _options;
  $('#number-multiple')[0].innerHTML = _options;

  $('#number2')[0].innerHTML = _options;
  $('#number2-multiple')[0].innerHTML = _options;
}

var mySelect = $('#first-disabled2');

createOptions(100);

$('#special').on('click', function () {
  mySelect.find('option:selected').prop('disabled', true);
  mySelect.selectpicker('refresh');
});

$('#special2').on('click', function () {
  mySelect.find('option:disabled').prop('disabled', false);
  mySelect.selectpicker('refresh');
});

$('#basic2').selectpicker({
  liveSearch: true,
  maxOptions: 1
});
</script>
</body>
</html>
