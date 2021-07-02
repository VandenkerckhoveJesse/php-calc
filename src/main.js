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
let sign = "";
let error = "";
display();

function display() {
    let actionString = !action ? "":action;
    let previousString = !previous ? "":previous;
    document.querySelector(".result sub").innerHTML = previousString + " " + actionString;
    document.querySelector(".result p").innerHTML = sign + result;
    document.querySelector("#error").innerHTML = error;
}

function buttonClick(content) {
    switch (content) {
        case "+":
        case "-":
        case '*':
        case "/":
        case "^":
            if(previous === null) {
                previous = result;
                result = "0";
                sign = "";
            } else {
                let calculated = calculateResult();
                previous = calculated.result;
                sign = calculated.sign;
                result = "0";
            }
            action = content;
            display();
            break;
        case "=":
            if(previous && action) {
                setResultAndSign(calculateResult());
                resetSubscript();
                display();
            }
            break;
        case "V":
            action = 'V';
            setResultAndSign(calculateResult());
            display();
            break;
        case "Undo":
            if(result === "0" && previous !== null)
            {
                result = previous;
                previous = null;
                action = null;
            } else if  (result !== "0") {
                result = result.slice(0, -1);
            }
            if(result === "") result = "0";
            display();
            break;
        case "+/-":
            if(sign === "-") sign = "";
            else sign = "-";
            display();
            break;
        default:
            if(result === "0") result = content;
            else result += content;
            display();
            break;
    }
}


function calculateResult() {
    try {
        return getResultAndSign(sendRequestToAPI(action, result, previous));
    } catch (e) {
        error = e;
        display();
    }

}



function setResultAndSign(object) {
    result = object.result;
    sign = object.sign;
}
function resetSubscript() {
    action = null;
    previous = null;
}

function getResultAndSign(response) {
    let parsed = parseInt(response);
    if (parsed > 0) return {sign: "", result: response};
    else return {sign: "-", result: -parsed.toString()}
}

function sendRequestToAPI(action, result, previous) {
    let request = new XMLHttpRequest();
    let url = "api.php";
    let paramAction = decodeAction(action);
    let params = `function=${paramAction}&a=${previous}&b=${result}`;
    request.open("GET", url+"?"+params, false);
    request.send( null );
    let response = JSON.parse(request.response);
    if(response["error"] !== "") throw response["error"];
    else {
        return response["result"].toString();
    }
}

function decodeAction(action) {
    return apiActionNames[action];
}