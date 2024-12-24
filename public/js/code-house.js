function displayNumber() {
    const selectedNumber = document.getElementById('numberSelect').value;
    document.getElementById('outputNumber').innerText = selectedNumber;
}
function displayLetter() {
    const selectedLetter = document.getElementById('LetterSelect').value;
    document.getElementById('outputLetter').innerText = selectedLetter;
}
function displayCode() {
    const inputField = document.getElementById('inputCode');
    const input = inputField.value;
    // منع المستخدم من إدخال أكثر من 5 محارف
    if (input.length > 5) {
        inputField.value = input.slice(0, 5);
    }
    document.getElementById('outputCode').innerText = inputField.value;
}
