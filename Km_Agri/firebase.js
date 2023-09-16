window.onload = function() {
    render();
};

function render() {
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
    recaptchaVerifier.render();
}

function phoneAuth() {
    //get the number
    var number = document.getElementById('number').value;
    //it takes two parameter first one is number and second one is recaptcha
    firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult) {
        //s is in lowercase
        window.confirmationResult = confirmationResult;
        coderesult = confirmationResult;
        console.log(coderesult);
        alert("Message sent");
    }).catch(function(error) {
        alert(error.message);
    });
}
function ct(){

    window.open("index.php");
    location.reload();
}
function codeverify() {
    var code = document.getElementById('verificationCode').value;
    

    coderesult.confirm(code).then(function(result) {
        alert("Mobile verfied Sucessfuly");
        var user = result.user;
        console.log(user);
        document.getElementById('dat').removeAttribute('hidden');
        document.getElementById('veri').setAttribute('hidden', 'true');
    }).catch(function(error) {
        alert(error.message);
    });
}