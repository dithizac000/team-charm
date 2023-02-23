const MAIN = document.querySelector('main');

const MILK_TEAS = ["Milk Tea", "Green Tea", "Thai Tea"];
const FRUIT_FLAVORS = ["Passion Iced Tea", "Berry Much Iced Tea", "Mango Iced Tea"];
const SMOOTHIES_BUTTONS = ["avocadoSmoothie", "mangoIcy", "galaxySwirl"];
const SMOOTHIES = ["Avocado Smoothies", "Mango Icy", "Oreo Swirl"];
const SMOOTHIES_PRICE = [6.95, 6.95, 7.50];
let smoothiesStrings = "";

for (let i = 1; i <= 3; i++) {
    smoothiesStrings +=
        `<div class=\"modal fade\" id=\"${SMOOTHIES_BUTTONS[i]}+\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">\n` +
        "    <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">\n" +
        "        <div class=\"modal-content\">\n" +
        "            <div class=\"modal-header\">\n" +
        "                <h4 class=\"modal-title\">Add to Cart</h4>\n" +
        "                <button type=\"button\" class=\"btn-close\" data-dismiss=\"modal\" aria-label=\"Close\">\n" +
        "                    <span aria-hidden=\"true\"></span>\n" +
        "                </button>\n" +
        "            </div>\n" +
        "            <div class=\"modal-body\">\n" +
        "                <!-- title and price -->\n" +
        `                <input class=\"form-control bg-white\" type=\"text\" placeholder=\"${SMOOTHIES[i]}\" value=\"${SMOOTHIES[i]}\" readonly>\n` +
        "                <br>\n" +
        `                <input class=\"form-control\" type=\"text\" placeholder=\"${SMOOTHIES_PRICE[i]}\" value=\"${SMOOTHIES_PRICE[i]}\" readonly>\n` +
        "                <br>\n" +
        "                <!-- quantity amount label -->\n" +
        `                <label class=\"form-label\" for=\"typeNumber${i}\">Quantity:</label>\n"` +
        `                <input type=\"number\" id=\"typeNumber${i}\" class=\"form-control\"  value=\"1\" min=\"1\" max=\"99\"/>\n` +
        "                <br>\n" +
        "                <!-- sweetness level -->\n" +
        "                <label class=\"form-label\">Sweetness Level:</label>\n" +
        "                <div class=\"form-check\">\n" +
        "                    <input type=\"radio\" class=\"form-check-input\" name=\"sugar-level\" value=\"Normal\" checked>Normal\n" +
        "                    <label class=\"form-check-label\" for=\"radio1\"></label>\n" +
        "                </div>\n" +
        "                <div class=\"form-check\">\n" +
        "                    <input type=\"radio\" class=\"form-check-input\" name=\"sugar-level\" value=\"Extra Sweet\">Extra Sweet\n" +
        "                    <label class=\"form-check-label\" for=\"radio2\"></label>\n" +
        "                </div>\n" +
        "                <div class=\"form-check\">\n" +
        "                    <input type=\"radio\" class=\"form-check-input\" name=\"sugar-level\" value=\"Half Sweet\">Half Sweet\n" +
        "                    <label class=\"form-check-label\" for=\"radio3\"></label>\n" +
        "                </div>\n" +
        "                <br>\n" +
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


MAIN.innerHTML = smoothiesStrings;