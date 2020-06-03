let cours = document.getElementById("cours");
let toggleBtn;
toggleBtn = () => {
	let x = document.getElementById("togl");
	if (x.textContent === ">>>") {
		x.textContent = "<<<";
	} else {
		x.textContent = ">>>";
	}
};
$(function () {
	// Sidebar toggle behavior
	$('#sidebarCollapse').on('click', function () {
		toggleBtn();
		$('#sidebar, #content').toggleClass('active');
	});
});

