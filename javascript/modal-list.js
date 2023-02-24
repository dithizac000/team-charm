// constant for main selection within menu.html
const MAIN = document.querySelector('main');

//arrays of constant for the boba series
const BUTTONS_NAMES = ["milkTea", "greenTea", "thaiTea","passionTea", "berryTea","mangoTea","avocadoSmoothie", "mangoIcy", "galaxySwirl"];
const BOBA_NAMES = ["Milk Tea", "Jasmine Green Tea", "Thai Tea", "Passion Fruit Iced Tea", "Berry Much Iced Tea",
    "Mango Iced Tea","Avocado Smoothie", "Mango Icy", "Galaxy Swirl"];
const BOBA_PRICE = [5.45, 5.45,5.95,5.95, 5.95, 5.95,6.95, 6.95, 7.50];

// div input for tea selection of black or green tea. Associated with fruit tea category
let teaSelect = "<!-- tea choice level -->\n" +
"                <label class=\"form-label\">Select Tea:</label>\n" +
"                <div class=\"form-check\">\n" +
"                    <input type=\"radio\" class=\"form-check-input\" name=\"black-tea\" value=\"Black Tea\" checked>Black Tea\n" +
"                    <label class=\"form-check-label\" for=\"radio1\"></label>\n" +
"                </div>\n" +
"                <div class=\"form-check\">\n" +
"                    <input type=\"radio\" class=\"form-check-input\" name=\"green-tea\" value=\"Green Tea\">Green Tea\n" +
"                    <label class=\"form-check-label\" for=\"radio2\"></label>\n" +
"                <br>\n";

// empty string variable
let displayModal = "";

//loop for all of the above constant arrays
for (let i = 0; i < BOBA_NAMES.length ; i++) {

    displayModal +=
    `<div class=\"modal fade\" id=\"${BUTTONS_NAMES[i]}\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">\n` +
    "    <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">\n" +
    "        <div class=\"modal-content\">\n" +
    "            <div class=\"modal-header\">\n" +
    "                <h4 class=\"modal-title\">Add to Cart</h4>\n" +
    "                <button type=\"button\" class=\"btn-close\" data-dismiss=\"modal\" aria-label=\"Close\">\n" +
    "                    <span aria-hidden=\"true\"></span>\n" +
    "                </button>\n" +
    "            </div>\n" +
    "        <div class=\"modal-body\">\n" +

    "                <!-- title and price -->\n" +
    `                <input class=\"form-control bg-white\" type=\"text\" placeholder=\"${BOBA_NAMES[i]}\" value=\"${BOBA_NAMES[i]}\" readonly>\n` +
    "                <br>\n" +
    `                <input class=\"form-control\" type=\"text\" placeholder=\"${BOBA_PRICE[i]}\" value=\"${BOBA_PRICE[i]}\" readonly>\n` +
    "                <br>\n" +
    "                <!-- quantity amount label -->\n" +
    `                <label class=\"form-label\" for=\"typeNumber${i}\">Quantity:</label>\n"` +
    `                <input type=\"number\" id=\"typeNumber${i}\" class=\"form-control\"  value=\"1\" min=\"1\" max=\"99\"/>\n` +
    "                <br>\n";
    // if array name matches these three, output the div input variable for tea selection
    if(BOBA_NAMES[i] == "Passion Fruit Iced Tea"|| BOBA_NAMES[i] ==  "Berry Much Iced Tea" || BOBA_NAMES[i] == "Mango Iced Tea") {
        displayModal += teaSelect;

    }   displayModal +=
    "                <!-- sweetness level -->\n" +
    "                <label class=\"form-label\">Sweetness Level:</label>\n" +
    "                <div class=\"form-check\">\n" +
    "                    <input type=\"radio\" class=\"form-check-input\" name=\"sugar-level\" value=\"Normal\" checked>Normal\n" +
    "                    <label class=\"form-check-label\" for=\"radio1\"></label>\n" +
    "                </div>\n" +
    "                <!-- Choose toppings -->\n" +
    "                <label class=\"form-label\">Choose Toppings:</label>\n" +
    "                <div class=\"form-check\">\n" +
    "                    <input type=\"radio\" class=\"form-check-input\" name=\"topping\" value=\"None\" checked> None\n" +
    "                    <label class=\"form-check-label\" for=\"radio4\"></label>\n" +
    "                </div>\n" +
    "                <div class=\"form-check\">\n" +
    "                    <input type=\"radio\" class=\"form-check-input\" name=\"topping\" value=\"Tapioca\"> Tapioca\n" +
    "                    <label class=\"form-check-label\" for=\"radio5\"></label>\n" +
    "                </div>\n" +
    "                <div class=\"form-check\">\n" +
    "                    <input type=\"radio\" class=\"form-check-input\" name=\"topping\" value=\"Rainbow Jelly\"> Rainbow Jelly\n" +
    "                    <label class=\"form-check-label\" for=\"radio6\"></label>\n" +
    "                </div>\n" +
    "                <div class=\"form-check\">\n" +
    "                    <input type=\"radio\" class=\"form-check-input\" name=\"topping\" value=\"Pudding\"> Pudding\n" +
    "                    <label class=\"form-check-label\" for=\"radio7\"></label>\n" +
    "                </div>\n" +
    "\n" +
    "            </div>\n" +
    "            <div class=\"modal-footer\">\n" +
    "                <button type=\"button\" class=\"btn btn-m btn-outline-warning \" data-dismiss=\"modal\">Cancel</button>\n" +
    "                <button type=\"button\" class=\"btn btn-m btn-outline-warning \">Save</button>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</div>";
}

//carry the displayModal string into the MAIN selection(main) via inner HTML
MAIN.innerHTML = displayModal;