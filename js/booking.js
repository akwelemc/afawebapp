function selectFieldPortion(fID) {
    // Set the selected fID in a hidden input field or in a variable
    document.getElementById('selectedFID').value = fID;

    // Optionally, you can also highlight the selected portion visually
    var fieldPortions = document.querySelectorAll('.field-portion');
    fieldPortions.forEach(function(portion) {
        // Check if the portion's fID matches the selected fID
        if (portion.getAttribute('fID') == fID) {
            // Add a class to highlight the selected portion
            portion.classList.add('selected');
        } else {
            // Remove the highlight class from other portions
            portion.classList.remove('selected');
        }
    });
}
