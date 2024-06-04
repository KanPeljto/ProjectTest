function getCookie(name) {
    var value = "; " + document.cookie;
    var parts = value.split("; " + name + "=");
    if (parts.length === 2) return parts.pop().split(";").shift();
}

$(document).ready(function() {
    const jwtToken= getCookie('jwt');

    if(jwtToken){
        $('#loginLogout').text('Sign out');
        $('#loginLogout').attr('href', '#');
    } else{
        $('#loginLogout').text('Sign in');
        $('#loginLogout').attr('href', 'login.php');
    }
});