$('#middle_content').fadeOut('slow', async function () {
   
    person = await Ajax('view_profile.php', 'POST', 'stats=getstats', false);
    person = JSON.parse(person)
    console.log(person);
    statsElem = "";
    person.forEach(element => {
        statsElem += "<p>"+element.notification+"</p>";
    });
    // data = person[0].profile;
    // data = JSON.parse(data);
    // console.log(person);
    $('#middle_content').html(statsElem);
}).fadeIn('slow');