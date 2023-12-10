import "./bootstrap";
import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("alpine:init", () => {
	Alpine.store("cart", {
		count: 0,

		increment() {
			this.count++;
		},
	});
});
