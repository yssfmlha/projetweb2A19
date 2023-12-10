function toggleContent(contentId) {
	var contentElements = document.querySelectorAll('.contented');
	contentElements.forEach(function (element) {
		element.classList.remove('activate');
	});
    var contentElements = document.querySelectorAll('.activate');
	contentElements.forEach(function (element) {
		element.classList.remove('activate');
	});
	var selectedContent = document.getElementById(contentId);
	if (selectedContent) {
		selectedContent.classList.add('activate');
	}
}