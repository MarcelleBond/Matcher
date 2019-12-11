var where_i_stay = ''

$(document).ready(function()
{
    getLocation();
})

$('form').submit(async function (event) {
    event.preventDefault();
    value = $('form').serializeArray();
    value.push({name: 'location', value: where_i_stay});
    console.log('form submition');
    console.log(value);
    check = await register(value)
    if (check == 1) {
        $('#content').fadeOut('slow', function () {
            $('#content').load("includes/UI/loggedout.php #login", function () {
                $('h2').after('<div class="w3-panel w3-green w3-center"><h3> Registration Success!</h3><p>Please check your email to activate account </p></div>');
                managescript('login.js', 'add');
                managescript('register.js', 'remove');
            }).fadeIn('slow');
        });
    }
    else {
        if (document.getElementById('error'))
            $('#error').html(check);
        else {
            $('h2').after('<div class="w3-panel w3-red w3-center"><h3>ERROR!</h3><p id="error"></p></div>');
            $('#error').html(check);
        }
    }
    return false;
});

async function register(value) {
    request = await Ajax('register.php', 'POST', value, false);
    return request;
}


function getLocation() {

    if (navigator.geolocation) {
        // alert("it works");
         navigator.geolocation.getCurrentPosition(showPosition, showError);
    }
    else {
        // alert("Geolocation is not supported by this browser.");
        ipFetch();
    }
}
function showPosition(position) {
    url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=" + position.coords.latitude + "," + position.coords.longitude + "&key=AIzaSyDwMhLbkQbBk7091NEYpSx9T_ykXnwgPuI";
    $.post(url, function (response) {
        console.log(response)
        console.log("G API START");
        console.log(response.results[4]["geometry"]["location"]["lat"] + " , " + response.results[4]["geometry"]["location"]["lng"]);
        console.log("G API END");
        console.log(response.results[4]['formatted_address'])
        where_i_stay = response.results[4]['formatted_address'];
        // alert(where_i_stay)
    });

}

function showError(error) {
    //run IP geoloc on failure
  switch(error.code) {
    case error.PERMISSION_DENIED:
      alert("User denied the request for Geolocation.");
      ipFetch();
      break;
    case error.POSITION_UNAVAILABLE:
      alert("Location information is unavailable.");
      ipFetch();
      break;
    case error.TIMEOUT:
      alert("The request to get user location timed out.");
      ipFetch();
      break;
    case error.UNKNOWN_ERROR:
      alert("An unknown error occurred.");
      ipFetch();
      break;
  }
}

function ipFetch() {

    ///////////IP search start

    url = "http://api.ipstack.com/check?access_key=d115280486eb2f2f8ebb6038c3dd4423";
    //  url = "https://geoip-db.com/jsonp/";
    $.post(url, function (response) {
        //var jsonified = response.slice(9,-1);
        //var test = JSON.parse(jsonified);
        console.log("IPFETCh");
        console.log(response['city']);
        where_i_stay = response['city']
       // console.log(response['latitude']);
       // console.log(response["longitude"]);
       // gMapSrch(response);
    });
}


  function gMapSrch(res){

          //////////googlemaps start
          url = "https://maps.googleapis.com/maps/api/geocode/json?latlng="+res['latitude']+","+res["longitude"]+"&key=AIzaSyA47t1t0JjL53u3KznXoMF_6oeVVjWTYaM";
          $.post(url, function (response2) {
            console.log("gmaps");
          console.log(response2.results[4]['formatted_address']);
              where_i_stay = response2.results[4]['formatted_address'];
            // alert(where_i_stay)

          });   
    
          //////////googlemaps end

  }
