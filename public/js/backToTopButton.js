const backToTopButton = document.querySelector("#back-to-top-btn");
const scrollOffset = 300;
const animationDuration = 750;

window.addEventListener("scroll", scrollFunction);
backToTopButton.addEventListener("click", smoothScrollBackToTop);

function scrollFunction() {
	if (window.pageYOffset > scrollOffset) {
		showBackToTopButton();
	} else {
		hideBackToTopButton();
	}
}

function showBackToTopButton() {
	if (!backToTopButton.classList.contains("btnEntrance")) {
		backToTopButton.classList.remove("btnExit");
		backToTopButton.classList.add("btnEntrance");
		backToTopButton.style.display = "block";
	}
}

function hideBackToTopButton() {
	if (backToTopButton.classList.contains("btnEntrance")) {
		backToTopButton.classList.remove("btnEntrance");
		backToTopButton.classList.add("btnExit");
		setTimeout(() => {
			backToTopButton.style.display = "none";
		}, animationDuration);
	}
}

function smoothScrollBackToTop() {
	const startPosition = window.pageYOffset;
	const targetPosition = 0;
	const distance = targetPosition - startPosition;
	let start = null;

	window.requestAnimationFrame(step);

	function step(timestamp) {
		if (!start) start = timestamp;
		const progress = timestamp - start;
		window.scrollTo(0, easeInOutCubic(progress, startPosition, distance, animationDuration));
		if (progress < animationDuration) window.requestAnimationFrame(step);
	}
}

function easeInOutCubic(t, b, c, d) {
	t /= d / 2;
	if (t < 1) return (c / 2) * t * t * t + b;
	t -= 2;
	return (c / 2) * (t * t * t + 2) + b;
}
