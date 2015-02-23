/**
 * Created by ELLAPC on 23/02/2015.
 */
$(document).ready(function(){
// About to set listeners to all buttons with an id editbt
    var buttons = document.getElementsByClassName('editbt_emp');
    var size = buttons.length;
    var current_button=null;
    while(size>0) {
        current_button = buttons[size-1];
        current_button.addEventListener('click', function () {
            location.href="../control/edit_employee.php?emp_id="+this.name;
        });
        size = size-1;
    }
});