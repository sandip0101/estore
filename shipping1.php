<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Shipping address form</title>
  <link rel="stylesheet" href="shipping1.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">
  <h1>Shipping</h1>
  <p>Please enter your shipping details.</p>
  <hr />
  <div class="form">
    
  <div class="fields fields--2">
    <label class="field">
      <span class="field__label" for="firstname">First name</span>
      <input class="field__input" type="text" id="firstname" value="John" />
    </label>
    <label class="field">
      <span class="field__label" for="lastname">Last name</span>
      <input class="field__input" type="text" id="lastname" value="Doe" />
    </label>
  </div>
  <label class="field">
    <span class="field__label" for="address">Address</span>
    <input class="field__input" type="text" id="address" />
  </label>
  <label class="field">
    <span class="field__label" for="country">Country</span>
    <select class="field__input" id="country">
      <option value=""></option>
      <option value="unitedstates">United States</option>
    </select>
  </label>
  <div class="fields fields--3">
    <label class="field">
      <span class="field__label" for="zipcode">Zip code</span>
      <input class="field__input" type="text" id="zipcode" />
    </label>
    <label class="field">
      <span class="field__label" for="city">City</span>
      <input class="field__input" type="text" id="city" />
    </label>
    <label class="field">
      <span class="field__label" for="state">State</span>
      <select class="field__input" id="state">
        <option value=""></option>
      </select>
    </label>
  </div>
  </div>
  <hr>
  <button class="button">Continue</button>
</div>
<!-- partial -->
  
</body>
</html>
