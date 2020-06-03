let logingEtudiant = () => {
	student = document.getElementById("student");
	student.classList.remove('hide');
	document.getElementById('userType').value = "student";
};
let logingTeacher = () => {
	student = document.getElementById("student");
	student.classList.remove('hide');
	document.getElementById('userType').value = "teacher";
};