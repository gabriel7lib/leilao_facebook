<!DOCTYPE html>
<?php
DEFINE('DS', DIRECTORY_SEPARATOR);
require __DIR__ . DS .'source'.DS.'Config'.DS.'FBConfig.php';


$fbConfig = new \Source\Config\FBConfig();

?>
<html>
<head>
<title>Teste Login JavaScript Example</title>
<meta charset="UTF-8">

</head>
<body>
<div id="fb-root"></div>
<script async defer src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.2&appId=<?php $fbConfig->appId ?>382438922489605&autoLogAppEvents=1"></script>
<div id="acesso">
	<div class="fb-login-button" data-size="large" data-button-type="login_with" data-auto-logout-link="true" data-use-continue-as="true"></div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script>

var id, nome;
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
	  var accessToken = response.authResponse.accessToken;
	  console.log(accessToken);
      testAPI();
	  $('#acesso').remove();
	  
    } else {
      // The person is not logged into your app or we are unable to tell.
      document.getElementById('status').innerHTML = 'Por favor ' +
        'entre no app.';
		$('#acesso').remove();
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '<?php $fbConfig->appId ?>',
      cookie     : true,  // enable cookies to allow the server to access 
                          // the session
      xfbml      : true,  // parse social plugins on this page
      version    : 'v3.2' // The Graph API version to use for the call
    });

    // Now that we've initialized the JavaScript SDK, we call 
    // FB.getLoginStatus().  This function gets the state of the
    // person visiting this page and can return one of three states to
    // the callback you provide.  They can be:
    //
    // 1. Logged into your app ('connected')
    // 2. Logged into Facebook, but not your app ('not_authorized')
    // 3. Not logged into Facebook and can't tell if they are logged into
    //    your app or not.
    //
    // These three cases are handled in the callback function.

    FB.getLoginStatus(function(response) {
		statusChangeCallback(response);
    });
	

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    FB.api('/me', function(response) {
		document.getElementById('status').innerHTML = 'Obrigado por entrar, ' + response.name + '!';
		
		nome = response.name;
		id = response.id;
    });
  }
  

	
	$(document).ready(function(){
		
		$.ajax({
			type: 'post',
			url: 'source/ver.php',
			data: { 'id': id , 'nome': nome,},
			success: function(ret) {
				console.log(ret);
				$('#adicionar').after(ret);
				$('#status').text('Você já detêm o lance atual!');
			}
		});
		
		$("#adicionar").click(function(){
			console.log(id);
						
			$.ajax({
				type: 'post',
				url: 'lance.php',
				data: { 'id': id , 'nome': nome,},
				success: function(ret) {
					console.log(ret);
					$('#status').after(ret);
					alert('Você já detêm o lance atual!');
				}
			});
			
		});
	});
	
	
	
	
</script>

<div id="leilao">
	<div id="btn_leilao">
		<button id="adicionar">Dar lance</button>
	</div>
	<div id="leilao_msg">
	</div>
	<div id="status">
	</div>
</div>



</body>
</html>