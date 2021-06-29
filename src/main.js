const apiActionNames = {
    "+":"add",
    "-":"subtract",
    "*":"multiply",
    "/":"divide",
    "^":"power",
    "V":"square"
};
let result = 0;
let action = null;
let previous = null;
setResult();
setSubscript();

function setResultAndSubscript() {
    setResult();
    setSubscript();
}
function setResult() {
    document.querySelector(".result p").innerHTML = result;
}
function setSubscript() {
    let actionString = !action ? "":action;
    let previousString = !previous ? "":previous;
    document.querySelector(".result sub").innerHTML = previousString + " " + actionString;
}
function resetSubscript() {
    action = null;
    previous = null;
}
function buttonClick(content) {
    switch (content) {
        case "=":
            if(previous && action) {
                result = getResult();
                resetSubscript();
                setResultAndSubscript();
            }
            break;
        case "+":
            if(previous === null) {
                previous = result;
                result = 0;
            } else {
                previous = getResult();
                result = 0;
            }
            action = '+';
            setResultAndSubscript();
            break;
        case "-":
            if(previous === null) {
                previous = result;
                result = 0;
            }else {
                previous = getResult();
                result = 0;
            }
            action = '-';
            setResultAndSubscript();
            break;
        case '*':
            if(previous === null) {
                previous = result;
                result = 0;
            }else {
                previous = getResult();
                result = 0;
            }
            action = '*';
            setResultAndSubscript();
            break;
        case "/":
            if(previous === null) {
                previous = result;
                result = 0;
            } else {
                previous = getResult();
                result = 0;
            }
            action = '/';
            setResultAndSubscript();
            break;
        case "^":
            if(previous === null) {
                previous = result;
                result = 0;
            }else {
                previous = getResult();
                result = 0;
            }
            action = '^';
            setResultAndSubscript();
            break;
        case "V":
            action = 'V';
            result = getResult();
            break;
        case "Undo":
            if(result === 0 && previous !== null)
            {
                result = previous;
                previous = null;
                action = null;
                setResultAndSubscript();
            } else if  (result > 0) {
                result = Math.floor(result / 10);
                setResult();
            }
            break;
        default:
            let number = parseInt(content);
            result *= 10;
            result += number;
            setResult();
            break;
    }
}

function getResult() {
    let request = new XMLHttpRequest();
    let url = "api.php";
    let paramAction = decodeAction(action);
    let params = `function=${paramAction}&a=${previous}&b=${result}`;
    console.log(url+"?"+params);
    request.open("GET", url+"?"+params, false);
    request.send( null );
    return request.responseText;
}

function decodeAction(action) {
    return apiActionNames[action];
}