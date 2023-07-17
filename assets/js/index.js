window.addEventListener("DOMContentLoaded", function() {
    
    let url = "https://laurelineagabibrac.sites.3wa.io/PHP/php-simple-api/index.php?route=read-all-users";
    
    fetch(url)
    .then(function(response)
    {
        return response.json();
    })
    .then(function(result)
    {
        console.log(result);
    })
})