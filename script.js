
/* Dark mode */

//Creates function for on and off
function myFunction() {
    var element = document.body;
    element.classList.toggle("dark-mode");

    var element2 = document.header;
    element2.classList.toggle("dark-mode");
}

$("#toggleTheme").on('change', function(){
    if($(this).is(':checked')){
        $(this).attr('value', 'true');
        document.cookie = "theme-dark";
        location.reload();
    }
    else{
        $(this).attr('value', 'false');
        document.cookie = 'theme=; Max-Age=0';
        location.reload();
    }
});


/* Weather API */

$.get('https://api.openweathermap.org/data/2.5/weather?q=Stockholm&appid=eb05bb1d4707c64657317872a9e34b52&units=metric', function(data){
    let temp = Math.floor(data.main.temp);
    let mintemp = Math.floor(data.main.temp_min);
    let maxtemp = Math.floor(data.main.temp_max);
    let humidity = Math.floor(data.main.humidity);
    let iconimg = "http://openweathermap.org/img/wn/" + data.weather[0].icon + ".png";
    $("#temp").html(temp);
    $("#mintemp").html(mintemp);
    $("#maxtemp").html(maxtemp);
    $("#humidity").html(humidity);
    $("#icon").attr("src", iconimg);

});