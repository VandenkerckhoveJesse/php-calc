<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="style.css"
</head>
<body>
<h1>Calculator!</h1>
<h2>Made by Jesse Vandenkerckhove</h2>
<table>

    <tr><td colspan="4" class="result"><sub>+2</sub><p>Result</p></td></tr>
    <tr>
        <td onclick="buttonClick('V')" class="button">V</td>
        <td onclick="buttonClick('^')" class="button">^</td>
        <td onclick="buttonClick('/')" class="button">/</td>
        <td onclick="buttonClick('Undo')" class="button">Undo</td>
    </tr>
    <tr>
        <td onclick="buttonClick('7')" class="button">7</td>
        <td onclick="buttonClick('8')" class="button">8</td>
        <td onclick="buttonClick('9')" class="button">9</td>
        <td onclick="buttonClick('*')" class="button">*</td>
    </tr>
    <tr>
        <td onclick="buttonClick('4')" class="button">4</td>
        <td onclick="buttonClick('5')" class="button">5</td>
        <td onclick="buttonClick('6')" class="button">6</td>
        <td onclick="buttonClick('-')" class="button">-</td>
    </tr>
    <tr>
        <td onclick="buttonClick('1')" class="button">1</td>
        <td onclick="buttonClick('2')" class="button">2</td>
        <td onclick="buttonClick('3')" class="button">3</td>
        <td onclick="buttonClick('+')" class="button">+</td>
    </tr>
    <tr>
        <td class="secondary"></td>
        <td onclick="buttonClick('0')" class="button">0</td>
        <td class="secondary"></td>
        <td onclick="buttonClick('=')" class="button hint">=</td>
    </tr>
</table>

<script src="main.js"></script>

</body>
</html>