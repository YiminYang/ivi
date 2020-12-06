function submitform(){
    event.preventDefault();
    var http = new XMLHttpRequest();
    var url = 'submitform';
    var name = document.getElementsByName("name")[0].value;
    var email = document.getElementsByName("email")[0].value;
    var phone = document.getElementsByName("phone")[0].value;
    var inquiry = document.getElementsByName("subject_of_inquiry")[0].value;
    var message = document.getElementsByName("message")[0].value;
    var params = "name=" + name + "&email=" + email + "&phone=" + phone + "&inquiry=" + inquiry + "&message=" + message;
    http.open('POST', url, true);
    http.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.onreadystatechange = function() {
        if(http.readyState == 4 && http.status == 200) {
            alert(JSON.parse(http.response).success);
        }
        if(http.readyState == 4 && http.status == 403) {
            alert(JSON.parse(http.response).success);
        }
    }
    http.send(params);
}