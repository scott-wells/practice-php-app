<?php
    require_once 'header.php';

echo <<<_END
    <script>
        
        function checkUser(user) {
            if(user.value == '') {
                $('#used').html('$nbsp;')
                return
            }

            $.post(
                'checkuser.php', 
                { user : user.value }, 
                function(data) { 
                    $('#used').html(data) 
                }
            )
        }
    
    </script>
_END;

    $error = $user = $pass = "";
    if(isset($_POST['user'])) destroySession();

    if(isset($_POST['user'])) {
        $user = sanitizeString($_POST['user']);
        $pass = sanitizeString($_POST['pass']);

        if($user == "" || $pass == "")
            $error = 'Not all fields were entered<br><br>';
        else {
            $result = queryMysql("SELECT * FROM members WHERE user='$user'");

            if($result->num_rows)
                $error = 'That username already exists<br><br>';
            else {
                queryMysql("INSERT INTO members VALUES('$user', '$pass')");
                die('<h4>Account create</h4>Please log in.</div></body></html>');
            }
        }
    }

echo <<<_END
            <form method='post' action='signup.php'>$error
            <div data-role='fieldcontain'>
                <label></label>
                Please enter your details to sign up
            </div>
            <div data-role='fieldcontain'>
                <label>Username</label>
                <input type='text' maxlength='16' name='user' value='$user' onBlur='checkUser(this)' />
                <label></label><div id='used'>&nbsp;</div>
            </div>
            <div data-role='fieldcontain'>
                <label></label>
                <input data-transition='slide' type='submit' value='Sign Up' />
            </div>
        </div>
    </body>
</html>
_END;
?>