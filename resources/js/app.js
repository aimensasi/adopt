// const { default: flatpickr } = require('flatpickr');

require('./bootstrap');

require("alpinejs");
var flatpickr = require("flatpickr");

if (document.getElementById("expecting-date")) {
	flatpickr("#expecting-date", {
		altInput: true,
		altFormat: "F j, Y",
		dateFormat: "Y-m-d"
	});
}
