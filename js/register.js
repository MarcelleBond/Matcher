$('form').submit(function (event) {
    event.preventDefault();
    value = $('form').serialize();
    check = register(value)
    if (check == 1) {
        $('#content').load("includes/UI/loggedout.php #login", function () {
            $('h2').after('<div class="w3-panel w3-green w3-center"><h3> Registration Success!</h3><p>Please check your email to activate account </p></div>');
            managescript('login.js', 'add');
            managescript('register.js', 'remove');
        })
    }
    else {
        if (document.getElementById('error'))
            $('#error').html(check);
        else
        {
            $('h2').after('<div class="w3-panel w3-red w3-center"><h3>ERROR!</h3><p id="error"></p></div>');
            $('#error').html(check);
        }
    }
    return false;
});

function register (value)
{
    request = Ajax('functions/register.php','POST',value, false);
    return request;
}