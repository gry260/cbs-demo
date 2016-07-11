<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>CBS Demo</title>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
        integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"
          integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
          integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
          crossorigin="anonymous"></script>
  <script src="js/auth.js" type="text/javascript"></script>
  <script>
    $( document ).ready(function() {
      $("#cbs_test_form").formAuth({"NameSelector":$("#userName"), "PassSelector": $("#passwordCBS") });
    });
  </script>
</head>
<body class="login">
<div class="login_wrapper">
  <div class="animate form login_form">
    <section class="login_content">
      <form id="cbs_test_form">
        <h1>Login Form</h1>
        <div>
          <input type="text" class="form-control" id="userName" placeholder="Username" required="">
        </div>
        <div>
          <input type="password" class="form-control" id="passwordCBS" placeholder="Password" required="">
        </div>
        <div>
          <input type="submit" class="btn btn-default submit" value="Log in"/>
        </div>
        <div class="clearfix"></div>
      </form>
    </section>
  </div>
</div>
</body>
</html>