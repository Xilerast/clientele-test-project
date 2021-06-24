function submitBtn() {
    let resultString = '';
    let flag = true;

    if (document.getElementById('fName').value == '') {
        resultString += 'First name is null, please insert something. ';
        flag = false;
    }

    if (document.getElementById('lName').value == '') {
        resultString += 'Last name is null, please insert something. ';
        flag = false;
    }

    if (document.getElementById('phone').value == '') {
        resultString += 'Phone is null, please insert something. ';
        flag = false;
    }

    if (document.getElementById('email').value == '') {
        resultString += 'E-Mail is null, please insert something. ';
        flag = false;
    }

    if (isNaN(document.getElementById('phone').value)) {
        resultString += 'Phone is not a number. Please correct it.';
        flag = false;
    }

    if (!flag) {
        alert(resultString);
    }

    return flag;
}