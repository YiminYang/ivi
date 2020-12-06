<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css" >
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Lato&family=Noto+Sans+JP&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="{{asset('js/yall.js')}}"></script>
        <title>IVI</title>
        <style>
            input:focus {
                box-shadow: 0 0 5px #1c88c6;
                border: 1px solid #1c88c6;
                outline: none;
            }
            select:focus {
                box-shadow: 0 0 5px #1c88c6;
                border: 1px solid #1c88c6;
                outline: none;
            }
            textarea:focus {
                box-shadow: 0 0 5px #1c88c6;
                border: 1px solid #1c88c6;
                outline: none;
            }
        </style>
    </head>
    <body>
        <div class="row">
            <h1 style="letter-spacing: 1px; color: #5199c3;">Contact Form Demo Project</h1>
        </div>
        <div class="row dark">
            <div class="flex-left">
                <div class="info-box-left">
                    <div class="row" style="padding:0;">
                        <div class="flex-left-3" style="padding:10px;">
                            <i class="fa fa-play-circle" style="font-size:48px;"></i>
                        </div>
                        <div class="flex-right-9" style="padding:10px;">
                            Text + Right Aligned image in Two Lines
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-right">
                <div class="info-box-right">
                    <div class="row" style="padding:0;">
                        <div class="flex-left-3" style="padding:10px;">
                            <i class="fa fa-play-circle" style="font-size:48px;"></i>
                        </div>
                        <div class="flex-right-9" style="padding:10px;">
                            Text + Right Aligned image
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="success" style="display: none; text-align: center; color: #5199c3;">
            <h3>Thank you! Your message has been successfully sent.</h3>
        </div>
        <form onsubmit="submitform()" id="form">
            <div class="row">
                <div class="flex-left">
                    <label for="name">Name <span style="color: red;">*</span></label>
                    <input type="text" name="name" id="name" placeholder="Enter your name"></input>
                    <div id="name_feedback" style="display: none; background:#be3600; color:white; padding: 1px 2%;">Required</div>
                </div>
                <div class="flex-right">
                    <label for="email">Email <span style="color: red;">*</span></label>
                    <input type="text" name="email" id="email" placeholder="Enter your email"></input>
                    <div id="email_required_feedback" style="display: none; background:#be3600; color:white; padding: 1px 2%;">Required</div>
                    <div id="email_format_feedback" style="display: none; background:#be3600; color:white; padding: 1px 2%;">Please provide a valid Email</div>
                </div>
            </div>
            <div class="row">
                <div class="flex-left">
                    <label for="phone">Phone <span style="color: red;">*</span></label>
                    <input type="phone" name="phone" id="phone" placeholder="Enter your phone number"></input>
                    <div id="phone_feedback" style="display: none; background:#be3600; color:white; padding: 1px 2%;">Required</div>
                </div>
                <div class="flex-right">
                    <label for="inquiry">Subject of Inquiry</label>
                    <select name="subject_of_inquiry" id="inquiry">
                      <option value="">- Please select one -</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                    </select>
                </div>
            </div>
            <div class="full-row">
                <label for="message">Your message</label>
                <textarea id="message" name="message" cols="2" rows="10"></textarea>
            </div>
            <div class="row">
                <div class="flex-left-3 o-2"><button style="background: #1c88c6; color: white; padding: 10px 30px; border: none; letter-spacing: 1px; border-radius:3px;" type="submit">SUBMIT</button></div>
                <div class="flex-right-9 o-1"><p><span style="color: red;">*Required.</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p></div>
            </div>
        </form>
        <div class="row dark">
            <div class="flex-left-9"><p style="line-height:2em;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><p style="line-height:2em;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></div>
            <div class="flex-right-3"><img class="lazy" data-src="{{asset('thankyou.png')}}" loading="lazy" alt="" width="200" height="200"></div>
        </div>
    </body>
    <script>
        document.addEventListener("DOMContentLoaded", yall);
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
                    if(JSON.parse(http.response).success == "true"){
                        var opacity = 1;
                        var intervalID = setInterval(function() { 
                            if (opacity > 0) { 
                                opacity = opacity - 0.1 
                                document.getElementById("form").style.opacity = opacity; 
                            } else {
                                document.getElementById("form").style.display = "none";
                                document.getElementById("success").style.display = "block";
                                clearInterval(intervalID); 
                            } 
                        }, 100);
                    }
                }
                if(http.readyState == 4 && http.status == 403) {
                    if(JSON.parse(http.response).success['email'] == "The email field is required."){
                        document.getElementById("email_required_feedback").style.display='block';
                    }
                    else{
                        document.getElementById("email_required_feedback").style.display='none';
                    }
                    if(JSON.parse(http.response).success['email'] == "The email must be a valid email address."){
                        document.getElementById("email_format_feedback").style.display='block';
                    }
                    else{
                        document.getElementById("email_format_feedback").style.display='none';
                    }
                    if(JSON.parse(http.response).success['name']){
                        document.getElementById("name_feedback").style.display='block';
                    }
                    else{
                        document.getElementById("name_feedback").style.display='none';
                    }
                    if(JSON.parse(http.response).success['phone']){
                        document.getElementById("phone_feedback").style.display='block';
                    }
                    else{
                        document.getElementById("phone_feedback").style.display='none';
                    }
                }
            }
            http.send(params);
        }
    </script>
</html>
