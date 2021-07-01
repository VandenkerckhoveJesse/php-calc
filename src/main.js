const apiActionNames = {
    "+":"add",
    "-":"subtract",
    "*":"multiply",
    "/":"divide",
    "^":"power",
    "V":"square"
};
let result = "0";
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
function setErrorAs(error) {
    document.querySelector("#error").innerHTML = error;
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
                result = "0";
            } else {
                previous = getResult();
                result = "0";
            }
            action = '+';
            setResultAndSubscript();
            break;
        case "-":
            if(previous === null) {
                previous = result;
                result = "0";
            }else {
                previous = getResult();
                result = "0";
            }
            action = '-';
            setResultAndSubscript();
            break;
        case '*':
            if(previous === null) {
                previous = result;
                result = "0";
            }else {
                previous = getResult();
                result = "0";
            }
            action = '*';
            setResultAndSubscript();
            break;
        case "/":
            if(previous === null) {
                previous = result;
                result = "0";
            } else {
                previous = getResult();
                result = "0";
            }
            action = '/';
            setResultAndSubscript();
            break;
        case "^":
            if(previous === null) {
                previous = result;
                result = "0";
            }else {
                previous = getResult();
                result = "0";
            }
            action = '^';
            setResultAndSubscript();
            break;
        case "V":
            action = 'V';
            result = getResult();
            setResult();
            break;
        case "Undo":
            if(result === "0" && previous !== null)
            {
                result = previous;
                previous = null;
                action = null;
                setResultAndSubscript();
            } else if  (result !== "0") {
                result = result.slice(0, -1);
                setResult();
            }
            break;
        case "+/-":
            result = -result;
            setResult();
            break;
        default:
            if(result === "0") result = content;
            else result += content;
            setResult();
            break;
    }
}

function getResult() {
    let request = new XMLHttpRequest();
    let url = "api.php";
    let paramAction = decodeAction(action);
    let params = `function=${paramAction}&a=${previous}&b=${result}`;
    request.open("GET", url+"?"+params, false);
    request.send( null );
    console.log(request.response);
    let response = JSON.parse(request.response);
    if(response["error"] !== "") {
        setErrorAs(response["error"]);
        return 0;
    }
    else {
        return response["result"].toString();
    }
}

function decodeAction(action) {
    return apiActionNames[action];
}