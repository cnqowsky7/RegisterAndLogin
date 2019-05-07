register = function () {
    reg = document.getElementById('reg');
    log = document.getElementById('log');
    change = document.getElementById('changePassword');

    reg.style.display = "grid";
    log.style.display = "none";
    change.style.display = "none";
}

login = function () {
    reg = document.getElementById('reg');
    log = document.getElementById('log');
    change = document.getElementById('changePassword');

    log.style.display = "grid";
    reg.style.display = "none";
    change.style.display = "none";
}

changePassword = function () {
    console.log('test');
    reg = document.getElementById('reg');
    log = document.getElementById('log');
    change = document.getElementById('changePassword');
    console.log(change);

    change.style.display = "grid";
    log.style.display = "none";
    reg.style.display = "none";
}

clear = function () {
    console.log('test');
    reg = document.getElementById('reg');
    log = document.getElementById('log');
    change = document.getElementById('changePassword');

    change.style.display = "none";
    log.style.display = "none";
    reg.style.display = "none";
}